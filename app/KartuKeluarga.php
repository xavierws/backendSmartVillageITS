<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KartuKeluarga extends Model
{
    protected $fillable = [
        'noKK', 
        'kepalaKeluarga', 
        'alamat',
        'rt', 
        'rw', 
        'kodePos', 
        'desa', 
        'kecamatan', 
        'kota', 
        'provinsi'
    ];
    
    public function penduduks()
    {
        return $this->hasMany('App\Penduduk');
    }
}
