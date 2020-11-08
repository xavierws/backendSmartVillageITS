<?php

use Illuminate\Database\Seeder;
use App\KeuanganDesa;

class KeuanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        KeuanganDesa::create([
            'tahun' => 2020,
            'nama' => 'tranfer',
            'jumlah' => 5123123123,
            'jenis_keuangan_id' => 1
        ]);

        KeuanganDesa::create([
            'tahun' => 2020,
            'nama' => 'PAD',
            'jumlah' => 4567567567,
            'jenis_keuangan_id' => 1
        ]);

        KeuanganDesa::create([
            'tahun' => 2020,
            'nama' => 'Pemerintahan Desa',
            'jumlah' => 7321321321,
            'jenis_keuangan_id' => 2
        ]);

        KeuanganDesa::create([
            'tahun' => 2020,
            'nama' => 'Pembangunan Desa',
            'jumlah' => 8901901901,
            'jenis_keuangan_id' => 2
        ]);

        KeuanganDesa::create([
            'tahun' => 2020,
            'nama' => 'Pemberdayaan',
            'jumlah' => 6345345345,
            'jenis_keuangan_id' => 2
        ]);

        KeuanganDesa::create([
            'tahun' => 2020,
            'nama' => 'pembiayaan',
            'jumlah' => 4789789789,
            'jenis_keuangan_id' => 3
        ]);
    }
}
