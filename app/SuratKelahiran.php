<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuratKelahiran extends Model
{
    protected $fillable = ['tanggal', 'waktu', 'jenisKelamin', 'tempat', 'ayah_id', 'ibu_id', 'kependudukan_id'];

    public function ayah()
    {
        return $this->belongsTo('App\Penduduk', 'ayah_id');
    }

    public function ibu()
    {
        return $this->belongsTo('App\Penduduk', 'ibu_id');
    }

    public function kependudukan()
    {
        return $this->belongsTo('App\Kependudukan');
    }
}
