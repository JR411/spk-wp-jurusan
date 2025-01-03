<?php

namespace App\Http\Controllers;

use App\Models\CalonMahasiswa;
use App\Models\Jurusan;
use App\Models\Kriteria;
use App\Models\Peminatan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $kriterias = Kriteria::orderBy('kriteria_nama')->get();

        return view('dashboard.home')->with(compact(
            'kriterias',
        ));
    }
    public function hasil()
    {
        $peminatans = Peminatan::orderBy('peminatan_sekolah')->get();
        $kriterias = Kriteria::orderBy('kriteria_nama')->get();
        $jurusans = Jurusan::orderBy('jurusan_nama')->get();
        $calonMahasiswas = CalonMahasiswa::with(['jurusans', 'peminatans'], function($query){
            $query->orderBy('jurusan_nama');
        })->get();

        return view('dashboard.hasil-perhitungan')->with(compact(
            'peminatans',
            'kriterias',
            'jurusans',
            'calonMahasiswas',
        ));
    }
}
