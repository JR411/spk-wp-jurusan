<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Kriteria;
use App\Models\SubKriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kriterias = Kriteria::orderBy('kriteria_nama')->get();

        return view('dashboard.kriteria.kriteria-data')->with(compact(
            'kriterias',
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kriterias = Kriteria::orderBy('kriteria_nama')->get();

        return view('dashboard.kriteria.kriteria-tambah')->with(compact(
            'kriterias',
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $save = $request->validate([
            'kriteria_nama' => 'required|string',
            'kriteria_bobot' => 'required|numeric',
        ]);

        Kriteria::create($request->all());

        return back()->with('message', 'Kriteria ' . $save['kriteria_nama'] . ' Ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $kriteria = Kriteria::where('kriteria_nama', 'like', '%'.str_replace('-', ' ', $slug).'%')->first();
        $kriterias = Kriteria::orderBy('kriteria_nama')->get();
        $subKriterias = SubKriteria::where('kriteria_id', $kriteria->id)->with(['jurusans'])->get();
        $jurusans = Jurusan::orderBy('jurusan_nama')->get();

        return view('dashboard.kriteria.kriteria-show', compact(
            'kriteria',
            'kriterias',
            'subKriterias',
            'jurusans',
        ));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kriteria = Kriteria::find($id);
        $kriterias = Kriteria::orderBy('kriteria_nama')->get();

        return view('dashboard.kriteria.kriteria-edit')->with(compact(
            'kriteria',
            'kriterias',
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $save = $request->validate([
            'kriteria_nama' => 'required|string',
            'kriteria_bobot' => 'required|numeric',
        ]);

        $kriteria = Kriteria::find($id);
        $kriteria->update($request->all());

        return back()->with('message', 'Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $save = Kriteria::find($id);
        Kriteria::destroy($id);

        return back()->with('message', 'Kriteria ' . $save['kriteria_nama'] . ' Dihapus');
    }
}
