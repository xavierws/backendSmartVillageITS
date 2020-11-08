<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Miskin extends Model
{
    protected $fillable = ['keterangan', 'layanan_surat_id'];

    public function layananSurat()
    {
        return $this->belongsTo('App\LayananSurat');
    }
}
