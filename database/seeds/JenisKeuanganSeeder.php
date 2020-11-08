<?php

use Illuminate\Database\Seeder;
use App\JenisKeuangan;

class JenisKeuanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JenisKeuangan::create([
            'nama' => 'pendapatan',
        ]);

        JenisKeuangan::create([
            'nama' => 'belanja',
        ]);

        JenisKeuangan::create([
            'nama' => 'pembiayaan',
        ]);
    }
}
