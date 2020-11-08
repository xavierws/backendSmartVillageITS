<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisKeuangan extends Model
{
    protected $fillable = ['nama'];

    public function keuanganDesas()
    {
        return $this->hasMany('App\KeuanganDesa');
    }
}
