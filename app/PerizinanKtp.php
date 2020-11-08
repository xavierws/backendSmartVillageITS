<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PerizinanKtp extends Model
{
    protected $fillable = ['pemohon_id', 'status_perkawinan'];

    public function penduduk()
    {
        return $this->belongsTo('App\Penduduk', 'pemohon_id');
    }
}
