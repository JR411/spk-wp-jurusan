<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Kriteria;
use App\Models\Peminatan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jurusans = Jurusan::with('peminatans')->orderBy('jurusan_nama')->get();
        $kriterias = Kriteria::orderBy('kriteria_nama')->get();

        return view('dashboard.jurusan.jurusan-data')->with(compact(
            'jurusans',
            'kriterias',
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $peminatans = Peminatan::orderBy('peminatan_sekolah')->get();
        $kriterias = Kriteria::orderBy('kriteria_nama')->get();

        return view('dashboard.jurusan.jurusan-tambah')->with(compact(
            'peminatans',
            'kriterias',
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $save = $request->validate([
            'jurusan_nama' => 'required|string',
            'peminatan_id' => 'required|numeric',
        ]);

        Jurusan::create($request->all());

        return back()->with('message', 'Jurusan ' . $save['jurusan_nama'] . ' Ditambah');
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
        $jurusan = Jurusan::find($id);
        $peminatans = Peminatan::orderBy('peminatan_sekolah')->get();
        $kriterias = Kriteria::orderBy('kriteria_nama')->get();

        return view('dashboard.jurusan.jurusan-edit')->with(compact(
            'jurusan',
            'peminatans',
            'kriterias',
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $save = $request->validate([
            'jurusan_nama' => 'required|string',
            'peminatan_id' => 'required|numeric',
        ]);

        $jurusan = Jurusan::find($id);
        $jurusan->update($request->all());

        return back()->with('message', 'Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $save = Jurusan::find($id);
        Jurusan::destroy($id);

        return back()->with('message', 'Jurusan ' . $save['jurusan_nama'] . ' Dihapus');
    }
}
