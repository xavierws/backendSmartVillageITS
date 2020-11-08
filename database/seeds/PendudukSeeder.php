<?php

use Illuminate\Database\Seeder;
use App\Penduduk;
use App\KartuKeluarga;

class PendudukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        KartuKeluarga::create([
            'noKK' => 1234,
            'kepalaKeluarga' => 'Radit',
            'alamat' => 'mijen',
            'rt' => 4,
            'rw' => 8,
            'kodePos' => 57121,
            'desa' => 'sudiroprajan',
            'kecamatan' => 'jebres',
            'kota' => 'surakarta',
            'provinsi' => 'jawa tengah',
        ]);

        $id = KartuKeluarga::pluck('id')->first();
        Penduduk::create([
            'nik' => 5678,
            'nama' => 'Xavier Wahyuadi',
            'jenisKelamin' => 'l',
            'tempatLahir' => 'surakarta',
            'tanggalLahir' => '2000-05-25',
            'agama' => 'protestan',
            'pendidikan' => 'SMA',
            'jenisPekerjaan' => 'pelajar/mahasiswa',
            'golDarah' => 'O',
            'status_perkawinan' => 'belum kawin',
            'kewarganegaraan' => 'WNI',
            'kartu_keluarga_id' => $id,
        ]);

        Penduduk::create([
            'nik' => 4321,
            'nama' => 'Anto Kasundeng',
            'jenisKelamin' => 'l',
            'tempatLahir' => 'surakarta',
            'tanggalLahir' => '1987-09-12',
            'agama' => 'protestan',
            'pendidikan' => 'Strata I',
            'jenisPekerjaan' => 'karyawan',
            'golDarah' => 'AB',
            'status_perkawinan' => 'belum kawin',
            'kewarganegaraan' => 'WNI',
            'kartu_keluarga_id' => $id,
        ]);
        

    }
}
