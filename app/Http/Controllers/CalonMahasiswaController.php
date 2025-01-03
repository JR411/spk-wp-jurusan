<?php

namespace App\Http\Controllers;

use App\Models\CalonMahasiswa;
use App\Models\Jurusan;
use App\Models\Kriteria;
use App\Models\Peminatan;
use Illuminate\Http\Request;

class CalonMahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kriterias = Kriteria::orderBy('kriteria_nama')->get();
        $calonMahasiswas = CalonMahasiswa::with(['subKriterias' => function ($query) {
            $query->orderBy('sub_kriteria_nama')->with(['kriterias' => function ($q) {
                $q->orderBy('kriteria_nama');
            }]);
        }])->orderBy('calon_nama')->get();

        return view('dashboard.calon-mahasiswa.calon-mahasiswa-data')->with(compact(
            'kriterias',
            'calonMahasiswas',
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kriterias = Kriteria::orderBy('kriteria_nama')->get();
        $peminatans = Peminatan::orderBy('peminatan_sekolah')->get();

        return view('dashboard.calon-mahasiswa.calon-mahasiswa-tambah')->with(compact(
            'kriterias',
            'peminatans',
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
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
                $validationRules[$kriteria->slug] = 'required';
            } else {
                $validationRules[$kriteria->slug . '.*'] = 'nullable|integer';
                $validationRules[$kriteria->slug] = 'nullable|array';
            }
        }
        $validated = $request->validate($validationRules);

        $calon = CalonMahasiswa::create($request->all());

        foreach ($kriterias as $kriteria) {
            if ($kriteria->slug == 'nilai-rapor') {
                $nilaiRapor = $validated[$kriteria->slug] ?? null;
                if ($nilaiRapor) {
                    $calon->subKriterias()->attach($nilaiRapor);
                }
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

            $calon->jurusans()->attach($jurusan->id, [
                'hasil' => number_format($wpResult, 3),
            ]);
        }

        return back()->with('message', 'Calon Mahasiswa ' . $save['calon_nama'] . ' Ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kriterias = Kriteria::orderBy('kriteria_nama')->get();
        $peminatans = Peminatan::orderBy('peminatan_sekolah')->get();
        $calonMahasiswa = CalonMahasiswa::find($id);

        return view('dashboard.calon-mahasiswa.calon-mahasiswa-edit')->with(compact(
            'kriterias',
            'peminatans',
            'calonMahasiswa',
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
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
                $validationRules[$kriteria->slug] = 'required';
            } else {
                $validationRules[$kriteria->slug . '.*'] = 'nullable|integer';
                $validationRules[$kriteria->slug] = 'nullable|array';
            }
        }
        $validated = $request->validate($validationRules);

        $calon = CalonMahasiswa::find($id);
        $calon->update($request->all());
        $calon->subKriterias()->detach();
        $calon->jurusans()->detach();

        foreach ($kriterias as $kriteria) {
            if ($kriteria->slug == 'nilai-rapor') {
                $nilaiRapor = $validated[$kriteria->slug] ?? null;
                if ($nilaiRapor) {
                    $calon->subKriterias()->attach($nilaiRapor);
                }
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

            $calon->jurusans()->attach($jurusan->id, [
                'hasil' => number_format($wpResult, 3),
            ]);
        }

        return back()->with('message', 'Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $save = CalonMahasiswa::find($id);
        CalonMahasiswa::destroy($id);

        return back()->with('message', 'Calon Mahasiswa ' . $save['calon_nama'] . ' Dihapus');
    }
}
