<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TidakMampu extends Model
{
    protected $fillable = ['siswa_id', 'sekolah', 'layanan_surat_id'];

    public function penduduk()
    {
        return $this->belongsTo('App\Penduduk', 'siswa_id');
    }

    public function layananSurat()
    {
        return $this->belongsTo('App\LayananSurat');
    }
}
