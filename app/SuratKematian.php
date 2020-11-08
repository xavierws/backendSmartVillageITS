<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuratKematian extends Model
{
    protected $fillable = ['tanggal', 'tempat', 'penyebab', 'terlapor_id', 'kependudukan_id'];

    public function penduduk()
    {
        return $this->belongsTo('App\Penduduk', 'terlapor_id');
    }

    public function kependudukan()
    {
        return $this->belongsTo('App\Kependudukan');
    }
}
