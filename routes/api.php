<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

//Keuangan
Route::get('keuangan/total-belanja/{tahun}', 'KeuanganController@getTotalBelanja');
Route::get('keuangan/total-pendapatan/{tahun}', 'KeuanganController@getTotalPendapatan');
Route::get('keuangan/total-pembiayaan/{tahun}', 'KeuanganController@getTotalPembiayaan');

Route::get('keuangan/belanja-desa/{tahun}', 'KeuanganController@getBelanjaDesa');
Route::get('keuangan/pembiayaan/{tahun}', 'KeuanganController@getPembiayaan');
Route::get('keuangan/pendapatan-desa/{tahun}', 'KeuanganController@getPendapatanDesa');

//informasi
Route::get('informasi', 'InformasiController@getInformasi');

//Perizinan
Route::get('perizinan/ktp', 'PerizinanController@get');
Route::post('perizinan/ktp', 'PerizinanController@store');

//Kependudukan
Route::get('kependudukan/surat-kematian', 'KependudukanController@getKematian');
Route::post('kependudukan/surat-kematian', 'KependudukanController@storeKematian');

Route::get('kependudukan/surat-kelahiran', 'KependudukanController@getKelahiran');
Route::post('kependudukan/surat-kelahiran', 'KependudukanController@storeKelahiran');

//Layanan Surat
Route::get('layanan/surat-umum', 'LayananController@getUmum');
Route::post('layanan/surat-umum', 'LayananController@storeUmum');

Route::get('layanan/surat-tidak-mampu', 'LayananController@getTidakMampu');
Route::post('layanan/surat-tidak-mampu', 'LayananController@storeTidakMampu');

Route::get('layanan/surat-miskin', 'LayananController@getMiskin');
Route::post('layanan/surat-miskin', 'LayananController@storeMiskin');
