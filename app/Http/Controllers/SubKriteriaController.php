<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Kriteria;
use App\Models\SubKriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubKriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kriterias = Kriteria::orderBy('kriteria_nama')->get();
        $jurusans = Jurusan::orderBy('jurusan_nama')->get();
        $subKriterias = SubKriteria::orderBy('sub_kriteria_nama')->get();

        return view('dashboard.sub-kriteria.sub-kriteria-tambah')->with(compact(
            'kriterias',
            'jurusans',
            'subKriterias',
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $save = $request->validate([
            'jurusan_id' => 'required|numeric',
            'kriteria_id' => 'required|numeric',
            'sub_kriteria_id' => 'required|string',
            'bobot' => 'required|numeric',
        ]);

        $jurusan = Jurusan::find($save['jurusan_id'])->jurusan_nama;
        $subKriteria = SubKriteria::where('sub_kriteria_nama', $request->sub_kriteria_id)->first();
        if ($subKriteria) {
            $subKriteria->jurusans()->attach($request->jurusan_id, ['bobot' => $request->bobot]);

            return back()->with('message', 'Sub Kriteria ' . $save['sub_kriteria_id'] . ' Di ' . $jurusan . ' Ditambah');
        }

        $newSubKriteria = SubKriteria::create([
            'sub_kriteria_nama' => $request->sub_kriteria_id,
            'kriteria_id' => $request->kriteria_id,
        ]);

        $newSubKriteria->jurusans()->attach($request->jurusan_id, ['bobot' => $request->bobot]);

        return back()->with('message', 'Sub Kriteria ' . $save['sub_kriteria_id'] . ' Di ' . $jurusan . ' Ditambah');
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
        $jurusan = Jurusan::find(request()->query('jurusan_id'));
        $subKriteria = SubKriteria::find($id);
        $kriteria = Kriteria::find($subKriteria->kriteria_id);
        $pivotData = DB::table('jurusan_sub_kriteria')
            ->where('sub_kriteria_id', $subKriteria->id)
            ->where('jurusan_id', $jurusan->id)
            ->first();
        if ($pivotData) {
            $bobot = $pivotData->bobot;
        }

        return view('dashboard.sub-kriteria.sub-kriteria-edit')->with(compact(
            'kriterias',
            'jurusan',
            'subKriteria',
            'kriteria',
            'pivotData',
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $save = $request->validate([
            'jurusan_id' => 'required|numeric',
            'sub_kriteria_id' => 'required|string',
            'bobot' => 'required|numeric',
        ]);

        $subKriteriaId = $request->input('sub_kriteria_id');
        $jurusanId = $request->input('jurusan_id');
        $bobot = $request->input('bobot');
        $subKriteria = SubKriteria::findOrFail($subKriteriaId);

        $subKriteria->jurusans()->updateExistingPivot($jurusanId, [
            'bobot' => $bobot,
        ]);

        return back()->with('message', 'Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $jurusan = Jurusan::find($request->jurusan_id);
        $subKriteria = SubKriteria::find($id);

        if ($subKriteria) {
            $subKriteria->jurusans()->detach($request->jurusan_id);
            if ($subKriteria->jurusans()->count() == 0) {
                $subKriteria->delete();
                return back()->with('message', 'Sub Kriteria ' . $subKriteria->sub_kriteria_nama . ' dihapus beserta relasinya dengan ' . $jurusan->jurusan_nama);
            }
            return back()->with('message', 'Relasi antara Sub Kriteria ' . $subKriteria->sub_kriteria_nama . ' dan ' . $jurusan->jurusan_nama . ' telah dihapus');
        }
    }
}
