<?php

namespace App\Http\Controllers;

use App\KeuanganDesa;
use Illuminate\Http\Request;
use App\Http\Resources\Keuangan as KeuanganResource;

class KeuanganController extends Controller
{
    public function getBelanjaDesa(Request $request)
    {
        $tahun = $request->tahun;
        $belanja = KeuanganDesa::where([
            ['jenis_keuangan_id', 2],
            ['tahun', $tahun]
        ])->get();

        return KeuanganResource::collection($belanja);
    }
    public function getPembiayaan(Request $request)
    {
        $tahun = $request->tahun;
        $pembiayaan = KeuanganDesa::where([
            ['jenis_keuangan_id', 3],
            ['tahun', $tahun]
        ])->get();

        return KeuanganResource::collection($pembiayaan);
    }
    public function getPendapatanDesa(Request $request)
    {
        $tahun = $request->tahun;
        $pendapatan = KeuanganDesa::where([
            ['jenis_keuangan_id', 1],
            ['tahun', $tahun]
        ])->get();

        return KeuanganResource::collection($pendapatan);
    }

    public function getTotalPendapatan(Request $request)
    {
        $total = 0;
        
        $tahun = $request->tahun;
        $jumlah = KeuanganDesa::where([
            ['jenis_keuangan_id', 1],
            ['tahun', $tahun]
        ])->pluck('jumlah');

        foreach($jumlah as $row){
            $total = $total + $row;
        }
        return response()->json([
            'total' => $total,
        ]);
    }

    public function getTotalBelanja(Request $request)
    {
        $total = 0;
        
        $tahun = $request->tahun;
        $jumlah = KeuanganDesa::where([
            ['jenis_keuangan_id', 2],
            ['tahun', $tahun]
        ])->pluck('jumlah');
        
        foreach($jumlah as $row){
            $total = $total + $row;
        }
        return response()->json([
            'total' => $total,
        ]);
    }

    public function getTotalPembiayaan(Request $request)
    {
        $total = 0;
        
        $tahun = $request->tahun;
        $jumlah = KeuanganDesa::where([
            ['jenis_keuangan_id', 3],
            ['tahun', $tahun]
        ])->pluck('jumlah');
        
        foreach($jumlah as $row){
            $total = $total + $row;
        }
        return response()->json([
            'total' => $total,
        ]);
    }
}
