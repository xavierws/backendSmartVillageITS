<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    protected $fillable = [
        'nik', 
        'nama', 
        'jenisKelamin', 
        'tempatLahir', 
        'tanggalLahir', 
        'agama', 
        'pendidikan', 
        'jenisPekerjaan', 
        'golDarah',
        'status_perkawinan',
        'kewarganegaraan', 
        'kartu_keluarga_id'
    ];

    public function kartuKeluarga()
    {
        return $this->belongsTo('App\KartuKeluarga');
    }

    public function kependudukans()
    {
        return $this->hasMany('App\Kependudukan', 'pelapor_id');
    }

    public function layananSurats()
    {
        return $this->hasMany('App\LayananSurat', 'pemohon_id');
    }

    public function suratKematian()
    {
        return $this->hasOne('App\SuratKematian', 'terlapor_id');
    }

    public function perizinanKtp()
    {
        return $this->hasOne('App\PerizinanKtp', 'pemohon_id');
    }

    public function tidakMampus()
    {
        return $this->hasMany('App\TidakMampu', 'siswa_id');
    }
}
