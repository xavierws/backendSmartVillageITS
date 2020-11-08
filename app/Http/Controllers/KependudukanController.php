<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Penduduk;
use App\Kependudukan;
use App\SuratKematian;
use App\SuratKelahiran;
use App\Http\Resources\Penduduk as PendudukRes;

class KependudukanController extends Controller
{
    public function getKematian(Request $request)
    {
        $request->validate([
            'nikTerlapor' => 'required',
            'nikPelapor' => 'required'
        ]);

        $nikTerlapor = $request->input('nikTerlapor');
        $nikPelapor = $request->input('nikPelapor');

        
        $terlapor = Penduduk::where('nik', $nikTerlapor);
        $pelapor = Penduduk::Where('nik', $nikPelapor);
        if(!$terlapor->exists() || !$pelapor->exists()){
            return response()->json([
                'pesan' => 'nik yang anda masukkan salah'
            ]);
        }
        $idTerlapor = $terlapor->value('id');
        $idPelapor = $pelapor->value('id');
        
        $umurTerlapor = Carbon::parse($terlapor->value('tanggalLahir'))->age;
        $umurPelapor = Carbon::parse($pelapor->value('tanggalLahir'))->age;

        return response()->json([
            'nikTerlapor' => $nikTerlapor,
            'namaTerlapor' => $terlapor->value('nama'),
            'jenisKelamin' => $terlapor->value('jenisKelamin'),
            'umur' => $umurTerlapor,
            'pekerjaan' => $terlapor->value('jenisPekerjaan'),
            'alamat' => Penduduk::find($idTerlapor)->kartuKeluarga->alamat,
            'nikPelapor' => $nikPelapor,
            'namaPelapor' => $pelapor->value('nama'),
            'umurPelapor' => $umurPelapor,
            'pekerjaan' => $pelapor->value('jenisPekerjaan'),
            'alamat' => Penduduk::find($idPelapor)->kartuKeluarga->alamat,
        ]);
    }

    private static function generateNoSurat()
    {
        $num = mt_rand(100000000000, 999999999999);

        if(Kependudukan::where('noSurat', $num)->exists()){
            return generateNoSurat();
        }

        return $num;
    }

    public function storeKematian(Request $request)
    {
        $request->validate([
            'nikTerlapor' => 'required',
            'nikPelapor' => 'required',
            'tanggalKematian' => 'required',
            'tempatKematian' => 'required',
            'penyebab' => 'required',
            'hubungan' => 'required',
        ]);

        $nikTerlapor = $request->input('nikTerlapor');
        $nikPelapor = $request->input('nikPelapor');
        $tanggal = $request->input('tanggalKematian');
        $tempat = $request->input('tempatKematian');
        $penyebab = $request->input('penyebab');
        $hubungan = $request->input('hubungan');

        
        $terlapor = Penduduk::where('nik', $nikTerlapor);
        $pelapor = Penduduk::Where('nik', $nikPelapor);
        if(!$terlapor->exists() || !$pelapor->exists()){
            return response()->json([
                'pesan' => 'nik yang anda masukkan salah'
            ]);
        }

        $idTerlapor = $terlapor->value('id');
        $idPelapor = $pelapor->value('id');

        $noSurat = KependudukanController::generateNoSurat();
        Kependudukan::create([
            'noSurat' => $noSurat,
            'tanggal_masuk' => Carbon::now(),
            'hubungan' => $hubungan,
            'pelapor_id' => $idPelapor,
        ]);

        $idKependudukan = Kependudukan::orderBy('id', 'desc')->first()->value('id');
        SuratKematian::create([
            'tanggal' => $tanggal,
            'tempat' => $tempat,
            'penyebab' => $penyebab,
            'terlapor_id' => $idTerlapor,
            'kependudukan_id' => $idKependudukan,
        ]);

        return response()->json([
            'pesan' => 'data berhasil di simpan',
            'noSurat' => $noSurat
        ]);
    }

    public function getKelahiran(Request $request)
    {
        $request->validate([
            'nikAyah' => 'required',
            'nikIbu' => 'required',
            'nikPelapor' => 'required'
        ]);

        $nikAyah = $request->input('nikAyah');
        $nikIbu = $request->input('nikIbu');
        $nikPelapor = $request->input('nikPelapor');

        
        $ayah = Penduduk::where('nik', $nikAyah);
        $ibu = Penduduk::where('nik', $nikIbu);
        $pelapor = Penduduk::where('nik', $nikPelapor);
        if(!$ayah->exists() || !$ibu->exists() || !$pelapor->exists()){
            return response()->json([
                'pesan' => 'nik yang anda masukkan salah'
            ]);
        }

        $idAyah = $ayah->value('id');
        $idIbu = $ibu->value('id');
        $idPelapor = $pelapor->value('id');

        $umurIbu = Carbon::parse($ibu->value('tanggalLahir'))->age;
        $umurAyah = Carbon::parse($ayah->value('tanggalLahir'))->age;
        $umurPelapor = Carbon::parse($pelapor->value('tanggalLahir'))->age;

        return response()->json([
            'namaIbu' => $ibu->value('nama'),
            'nikIbu' => $nikIbu,
            'umurIbu' => $umurIbu,
            'pekerjaanIbu' => $ibu->value('jenisPekerjaan'),
            'alamatIbu' => Penduduk::find($idIbu)->kartuKeluarga->alamat,

            'namaAyah' => $ayah->value('nama'),
            'nikAyah' => $nikAyah,
            'umurAyah' => $umurAyah,
            'pekerjaanAyah' => $ayah->value('jenisPekerjaan'),
            'alamatAyah' => Penduduk::find($idAyah)->kartuKeluarga->alamat,

            'namaPelapor' => $pelapor->value('nama'),
            'nikPelapor' => $nikPelapor,
            'umurPelapor' => $umurPelapor,
            'pekerjaanPelapor' => $pelapor->value('jenisPekerjaan'),
            'alamatPelapor' => Penduduk::find($idPelapor)->kartuKeluarga->alamat,
        ]);
    }

    public function storeKelahiran(Request $request)
    {
        $request->validate([
            'nikAyah' => 'required',
            'nikIbu' => 'required',
            'nikPelapor' => 'required',
            'tanggalKelahiran' => 'required',
            'waktu' => 'required',
            'jenisKelamin' => 'required',
            'tempatKelahiran' => 'required',
            'hubungan' => 'required'
        ]);

        $nikAyah = $request->input('nikAyah');
        $nikIbu = $request->input('nikIbu');
        $nikPelapor = $request->input('nikPelapor');
        $tanggal = $request->input('tanggalKelahiran');
        $waktu = $request->input('waktu');
        $jenisKelamin = $request->input('jenisKelamin');
        $tempat = $request->input('tempatKelahiran');
        $hubungan = $request->input('hubungan');
        
        $ayah = Penduduk::where('nik', $nikAyah);
        $ibu = Penduduk::where('nik', $nikIbu);
        $pelapor = Penduduk::where('nik', $nikPelapor);
        if(!$ayah->exists() || !$ibu->exists() || !$pelapor->exists()){
            return response()->json([
                'pesan' => 'nik yang anda masukkan salah'
            ]);
        }

        $idAyah = $ayah->value('id');
        $idIbu = $ibu->value('id');
        $idPelapor = $pelapor->value('id');

        $noSurat = KependudukanController::generateNoSurat();
        Kependudukan::create([
            'noSurat' => $noSurat,
            'tanggal_masuk' => Carbon::now(),
            'hubungan' => $hubungan,
            'pelapor_id' => $idPelapor
        ]);

        $idKependudukan = Kependudukan::orderBy('id', 'desc')->first()->value('id');
        SuratKelahiran::create([
            'tanggal' => $tanggal,
            'waktu' => $waktu,
            'jenisKelamin' => $jenisKelamin,
            'tempat' => $tempat,
            'ayah_id' => $idAyah,
            'ibu_id' => $idIbu,
            'kependudukan_id' => $idKependudukan
        ]);

        return response()->json([
            'pesan' => 'data berhasil disimpan',
            'noSurat' => $noSurat
        ]);
    }
}
