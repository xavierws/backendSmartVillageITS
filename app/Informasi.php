<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Informasi extends Model
{
    protected $fillable = ['nama_kegiatan', 'hari', 'tanggal', 'waktu'];
}
