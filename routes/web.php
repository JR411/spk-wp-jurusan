<?php

use Illuminate\Support\Str;
use App\Http\Controllers\CalonMahasiswaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SubKriteriaController;
use App\Models\Kriteria;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if(Auth::user()) return redirect('/dashboard');
    else return redirect('/login');
});

Route::get('/login', [LoginController::class, 'login'])->name('login')->middleware('guest');
Route::post('/autentikasi', [LoginController::class, 'autentikasi']);
Route::post('/keluar', [LoginController::class, 'keluar']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/dashboard/hasil-perhitungan', [DashboardController::class, 'hasil'])->middleware('auth');

Route::resource('/dashboard/jurusan', JurusanController::class)->except(['show'])->middleware('auth');
Route::resource('/dashboard/kriteria', KriteriaController::class)->middleware('auth');
Route::resource('/dashboard/sub-kriteria', SubKriteriaController::class)->except(['index', 'show'])->middleware('auth');
Route::resource('/dashboard/calon-mahasiswa', CalonMahasiswaController::class)->except(['show'])->middleware('auth');

$kriteria = Kriteria::orderBy('kriteria_nama')->get();

foreach ($kriteria as $key => $value) {
    Route::get("/dashboard/kriteria/".$value->slug, [KriteriaController::class, 'show'])->middleware('auth');
}