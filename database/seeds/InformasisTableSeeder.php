<?php

use Illuminate\Database\Seeder;
use App\Informasi;

class InformasisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Informasi::create([
            'nama_kegiatan' => 'kerja bakti',
            'hari' => 'rabu',
            'tanggal' => '2020-09-02',
            'waktu' => '07:00:00'
        ]);

        Informasi::create([
            'nama_kegiatan' => 'sarasehan',
            'hari' => 'sabtu',
            'tanggal' => '2020-09-26',
            'waktu' => '19:00:00'
        ]);

        Informasi::create([
            'nama_kegiatan' => 'karang taruna',
            'hari' => 'jumat',
            'tanggal' => '2020-09-25',
            'waktu' => '13:00:00'
        ]);
    }
}
