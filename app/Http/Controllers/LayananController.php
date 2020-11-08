<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penduduk;
use App\LayananSurat;
use App\Umum;
use App\TidakMampu;
use App\Miskin;
use App\Http\Resources\Penduduk as PendudukRes;
use Carbon\Carbon;

class LayananController extends Controller
{
    private static function generateNoSurat()
    {
        $num = mt_rand(100000000000, 999999999999);

        if(LayananSurat::where('noSurat', $num)->exists()){
            return generateNoSurat();
        }

        return $num;
    }

    public function getUmum(Request $request)
    {
        $request->validate([
            'nik' => 'required'
        ]);

        $nik = $request->input('nik');

        if(!Penduduk::where('nik', $nik)->exists()){
            return response()->json([
                'pesan' => 'nik yang anda masukkan salah'
            ]);
        }

        $id = Penduduk::where('nik', $nik)->value('id');

        return new PendudukRes(Penduduk::find($id));
    }

    public function storeUmum(Request $request)
    {
        $request->validate([
            'nik' => 'required',
            'keterangan' => 'required',
            'keperluan' => 'required'
        ]);

        $nik = $request->input('nik');
        $keterangan = $request->input('keterangan');
        $keperluan = $request->input('keperluan');

        if(!Penduduk::where('nik', $nik)->exists()){
            return response()->json([
                'pesan' => 'nik yang anda masukkan salah'
            ]);
        }

        $id = Penduduk::where('nik', $nik)->value('id');
        $noSurat = LayananController::generateNoSurat();

        LayananSurat::create([
            'pemohon_id' => $id,
            'noSurat' => $noSurat,
            'tanggal_masuk' => Carbon::now()
        ]);

        $idLayanan = LayananSurat::orderBy('id', 'desc')->first()->value('id');
        Umum::create([
            'keterangan' => $keterangan,
            'keperluan' => $keperluan,
            'layanan_surat_id' => $idLayanan
        ]);

        return  response()->json([
            'pesan' => 'data berhasil di simpan',
            'noSurat' => $noSurat
        ]);
    }

    public function getTidakMampu(Request $request)
    {
        $request->validate([
            'nik' => 'required',
            'nikSiswa' => 'required'
        ]);

        $nik = $request->input('nik');
        $nikSiswa = $request->input('nikSiswa');

        if(!Penduduk::where('nik', $nik)->exists() || !Penduduk::where('nik', $nikSiswa)->exists()){
            return response()->json([
                'pesan' => 'nik yang anda masukkan salah'
            ]);
        }

        $pemohon = Penduduk::where('nik', $nik);
        $siswa = Penduduk::where('nik', $nikSiswa);

        return response()->json([
            'nama' => $pemohon->value('nama'),
            'nik' => $pemohon->value('nik'),
            'tempatLahir' => $pemohon->value('tempatLahir'),
            'tanggalLahir' => $pemohon->value('tanggalLahir'),
            'rt' => Penduduk::find($pemohon->value('id'))->kartuKeluarga->rt,
            'rw' => Penduduk::find($pemohon->value('id'))->kartuKeluarga->rw,
            'alamat' => Penduduk::find($pemohon->value('id'))->kartuKeluarga->alamat,
            'jenisKelamin' => $pemohon->value('jenisKelamin'),
            'statusKawin' => $pemohon->value('status_perkawinan'),
            'pekerjaan' => $pemohon->value('jenisPekerjaan'),
            'namaSiswa' => $siswa->value('nama'),
            'nikSiswa' => $siswa->value('nik'),
            'tempatLahirSiswa' => $siswa->value('tempatLahir'),
            'tanggalLahirSiswa' => $siswa->value('tanggalLahir'),
            'jenisKelaminSiswa' => $siswa->value('jenisKelamin'),
        ]);
    }

    public function storeTidakMampu(Request $request)
    {
        $request->validate([
            'nik' => 'required',
            'nikSiswa' => 'required',
            'sekolah' => 'required'
        ]);

        $nik = $request->input('nik');
        $nikSiswa = $request->input('nik');
        $sekolah = $request->input('sekolah');

        if(!Penduduk::where('nik', $nik)->exists() || !Penduduk::where('nik', $nikSiswa)->exists()){
            return response()->json([
                'pesan' => 'nik yang anda masukkan salah'
            ]);
        }

        $pemohon = Penduduk::where('nik', $nik);
        $siswa = Penduduk::where('nik', $nikSiswa);

        $noSurat = LayananController::generateNoSurat();
        LayananSurat::create([
            'pemohon_id' => $pemohon->value('id'),
            'noSurat' => $noSurat,
            'tanggal_masuk' => Carbon::now()
        ]);

        $idLayanan = LayananSurat::orderBy('id','desc')->first()->value('id');
        TidakMampu::create([
            'siswa_id' => $siswa->value('id'),
            'sekolah' => $sekolah,
            'layanan_surat_id' => $idLayanan
        ]);

        return response()->json([
            'pesan' => 'data berhasil disimpan',
            'noSurat' => $noSurat
        ]);
    }

    public function getMiskin(Request $request)
    {
        $request->validate([
            'nik' => 'required'
        ]);

        $nik = $request->input('nik');

        if(!Penduduk::where('nik', $nik)->exists()){
            return response()->json([
                'pesan' => 'nik yang anda masukkan salah'
            ]);
        }

        $id = Penduduk::where('nik', $nik)->value('id');

        return new PendudukRes(Penduduk::find($id));
    }

    public function storeMiskin(Request $request)
    {
        $request->validate([
            'nik' => 'required',
        ]);

        $nik = $request->input('nik');
        
        if(!Penduduk::where('nik', $nik)->exists()){
            return response()->json([
                'pesan' => 'nik yang anda masukkan salah'
            ]);
        }

        $id = Penduduk::where('nik', $nik)->value('id');
        $noSurat = LayananController::generateNoSurat();

        LayananSurat::create([
            'pemohon_id' => $id,
            'noSurat' => $noSurat,
            'tanggal_masuk' => Carbon::now()
        ]);

        $idLayanan = LayananSurat::orderBy('id', 'desc')->first()->value('id');
        Miskin::create([
            'keterangan' => 'surat miskin',
            'layanan_surat_id' => $idLayanan
        ]);

        return  response()->json([
            'pesan' => 'data berhasil di simpan',
            'noSurat' => $noSurat
        ]);
    }
}
