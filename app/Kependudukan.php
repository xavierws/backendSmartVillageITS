<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kependudukan extends Model
{
    protected $fillable = ['noSurat', 'tanggal_masuk', 'hubungan', 'pelapor_id'];

    public function suratKematian()
    {
        return $this->hasOne('App\SuratKematian');
    }

    public function suratKelahiran()
    {
        return $this->hasOne('App\SuratKelahiran');
    }

    public function penduduk()
    {
        return $this->belongsTo('App\Penduduk', 'pelapor_id');
    }
}
