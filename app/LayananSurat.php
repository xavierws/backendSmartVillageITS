<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LayananSurat extends Model
{
    protected $fillable = ['pemohon_id', 'noSurat', 'tanggal_masuk'];

    public function penduduk()
    {
        return $this->belongsTo('App\Penduduk', 'pemohon_id');
    }

    public function umum()
    {
        return $this->hasOne('App\Umum');
    }

    public function tidakMampu()
    {
        return $this->hasOne('App\TidakMampu');
    }

    public function miskin()
    {
        return $this->hasOne('App\Miskin');
    }
}
