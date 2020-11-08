<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('data/KeuanganDesa', 'ShowKeuanganDesa');
Route::resource('data/JenisKeuanganDesa', 'ShowJenisKeuangan');

Route::resource('data/Informasi', 'ShowInformasi');

Route::resource('data/PerizinanKTP', 'ShowPerizinan');

Route::resource('data/LayananSurat', 'ShowLayananSurat');
Route::resource('data/SuratUmum', 'ShowSuratUmum');
Route::resource('data/SuratMiskin', 'ShowSuratMiskin');
Route::resource('data/SuratTidakMampu', 'ShowSuratTidakMampu');

Route::resource('data/Kependudukan', 'ShowKependudukan');
Route::resource('data/SuratKematian', 'ShowSuratKematian');
Route::resource('data/SuratKelahiran', 'ShowSuratKelahiran');

Route::resource('data/KartuKeluarga', 'ShowKartuKeluarga');

Route::resource('data/Penduduk', 'ShowPenduduk');
