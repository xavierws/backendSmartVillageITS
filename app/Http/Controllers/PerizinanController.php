<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PerizinanKtp;
use App\Penduduk;
use App\Http\Resources\Penduduk as PendudukRes;
class PerizinanController extends Controller
{
    public function get(Request $request)
    {
        $request->validate([
            'noKK' => 'required',
            'nik' => 'required',
            'statusPerkawinan' => 'required',
        ]);

        $noKK = $request->input('noKK');
        $nik = $request->input('nik');
        $status = $request->input('statusPerkawinan');

        $id = Penduduk::where('nik', $nik)->value('id');

        if($id == null){
            return response()->json([
                'pesan' => 'NIK yang anda masukkan salah'
            ]);
        }

        if($noKK != Penduduk::find($id)->kartuKeluarga->noKK){
            return response()->json([
                'pesan' => 'no KK atau NIK yang anda masukkan tidak sesuai'
            ]);
        }

        return new PendudukRes(Penduduk::find($id));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'noKK' => 'required',
            'nik' => 'required',
            'statusPerkawinan' => 'required',
        ]);

        $noKK = $request->input('noKK');
        $nik = $request->input('nik');
        $status = $request->input('statusPerkawinan');

        $id = Penduduk::where('nik', $nik)->value('id');

        if($id == null){
            return response()->json([
                'pesan' => 'NIK yang anda masukkan tidak sesuai'
            ]);
        }

        if($noKK != Penduduk::find($id)->kartuKeluarga->noKK){
            return response()->json([
                'pesan' => 'no KK atau NIK yang anda masukkan tidak sesuai'
            ]);
        }

        PerizinanKtp::create([
            'pemohon_id' => $id,
            'status_perkawinan' => $status
        ]);
        
        return response()->json([
            'pesan' => 'permohonan KTP berhasil diajukan'
        ]);
    }

    public function show()
    {
        
    }
}
