<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Informasi extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public static $wrap = 'informasi';
    
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'namaKegiatan' => $this->nama_kegiatan,
            'hari' => $this->hari,
            'tanggal' => $this->tanggal,
            'waktu' => $this->waktu,
        ];
    }

    
}
