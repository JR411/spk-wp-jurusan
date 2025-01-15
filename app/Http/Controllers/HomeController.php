<?php

namespace App\Http\Controllers;

use App\Models\CalonMahasiswa;
use App\Models\Jurusan;
use App\Models\Kriteria;
use App\Models\Peminatan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $kriterias = Kriteria::orderBy('kriteria_nama')->get();
        $peminatans = Peminatan::orderBy('peminatan_sekolah')->get();

        return view('main')->with(compact(
            'kriterias',
            'peminatans',
        ));
    }
    public function submit(Request $request)
    {
        $save = $request->validate([
            'calon_nama' => 'required|string',
            'calon_asal_sekolah' => 'required|string',
            'peminatan_id' => 'required|numeric',
        ]);

        $kriterias = Kriteria::all();
        $validationRules = [];

        foreach ($kriterias as $kriteria) {
            if ($kriteria->slug == 'nilai-rapor') {
                $validationRules[$kriteria->slug] = 'required|numeric';
            } else {
                $validationRules[$kriteria->slug . '.*'] = 'nullable|integer';
                $validationRules[$kriteria->slug] = 'nullable|array';
            }
        }

        $validated = $request->validate($validationRules);
        $request['calon_nilai'] = $request['nilai-rapor'];

        $calon = CalonMahasiswa::create($request->all());

        foreach ($kriterias as $kriteria) {
            if ($kriteria->slug == 'nilai-rapor') {
                $nilaiRapor = $validated[$kriteria->slug] ?? null;
                if ($nilaiRapor >= 0 && $nilaiRapor <= 59) $calon->subKriterias()->attach(1);
                elseif ($nilaiRapor >= 60 && $nilaiRapor <= 69) $calon->subKriterias()->attach(2);
                elseif ($nilaiRapor >= 70 && $nilaiRapor <= 79) $calon->subKriterias()->attach(3);
                elseif ($nilaiRapor >= 80 && $nilaiRapor <= 89) $calon->subKriterias()->attach(4);
                elseif ($nilaiRapor >= 90 && $nilaiRapor <= 100) $calon->subKriterias()->attach(5);
            } else {
                $subKriteriaData = $validated[$kriteria->slug] ?? [];
                foreach ($subKriteriaData as $subKriteriaId) {
                    if ($subKriteriaId > 0) {
                        $calon->subKriterias()->attach($subKriteriaId);
                    }
                }
            }
        }

        $jurusans = Jurusan::with('subKriterias.kriterias')->where('peminatan_id', $request->peminatan_id)->get();
        $jurusanResults = [];

        foreach ($jurusans as $jurusan) {
            $wpResult = 1;
            $bestSubKriterias = [];

            foreach ($jurusan->subKriterias as $subKriteria) {
                $kriteria = $subKriteria->kriterias;
                $subKriteriaIds = (array) ($validated[$kriteria->slug] ?? []);

                if (in_array($subKriteria->id, $subKriteriaIds)) {
                    if (!isset($bestSubKriterias[$kriteria->id]) || $subKriteria->pivot->bobot > $bestSubKriterias[$kriteria->id]->pivot->bobot) {
                        $bestSubKriterias[$kriteria->id] = $subKriteria;
                    }
                }
            }

            foreach ($bestSubKriterias as $subKriteria) {
                $bobotSubKriteria = $subKriteria->pivot->bobot;
                $bobotKriteria = $subKriteria->kriterias->kriteria_bobot;

                $wpResult *= number_format($bobotSubKriteria ** $bobotKriteria, 3);
            }

            $jurusanResults[] = [
                'jurusan' => $jurusan,
                'hasil' => number_format($wpResult, 3),
            ];

            $calon->jurusans()->attach($jurusan->id, [
                'hasil' => number_format($wpResult, 3),
            ]);
        }

        usort($jurusanResults, function ($a, $b) {
            return $b['hasil'] <=> $a['hasil'];
        });

        $topJurusan = array_slice($jurusanResults, 0, 3);

        $usedKriteria = $kriterias->map(function ($kriteria) use ($validated, $calon) {
            if ($kriteria->slug == 'nilai-rapor') {
                return [
                    'kriteria_nama' => $kriteria->kriteria_nama,
                    'slug' => $kriteria->slug,
                    'nilai' => $calon->calon_nilai,
                ];
            } else {
                $subKriteriaData = $validated[$kriteria->slug] ?? [];
                $subKriteriaNames = [];

                foreach ($subKriteriaData as $subKriteriaId) {
                    $subKriteria = $kriteria->subKriterias->find($subKriteriaId);
                    if ($subKriteria) {
                        $subKriteriaNames[] = $subKriteria->sub_kriteria_nama;
                    }
                }

                return [
                    'kriteria_nama' => $kriteria->kriteria_nama,
                    'slug' => $kriteria->slug,
                    'nilai' => $subKriteriaNames,
                ];
            }
        });

        return response()->json([
            'calon' => [
                'nama' => $calon->calon_nama,
                'asal_sekolah' => $calon->calon_asal_sekolah,
                'peminatan' => $calon->peminatans->peminatan_sekolah,
            ],
            'jurusans' => $topJurusan,
            'kriteria' => $usedKriteria,
        ]);
    }
}
