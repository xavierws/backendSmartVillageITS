<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Umum extends Model
{
    protected $fillable = ['keterangan', 'keperluan', 'layanan_surat_id'];

    public function layananSurat()
    {
        return $this->belongsTo('App\LayananSurat');
    }
}
