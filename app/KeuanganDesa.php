<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KeuanganDesa extends Model
{
    protected $fillable = ['tahun', 'nama', 'jumlah', 'jenis_keuangan_id'];

    public function jenisKeuangan()
    {
        return $this->belongsTo('App\JenisKeuangan');
    }
}
