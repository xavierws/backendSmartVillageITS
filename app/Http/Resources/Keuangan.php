<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\JenisKeuangan as JenisKeuanganResource;
use App\JenisKeuangan;

class Keuangan extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'tahun' => $this->tahun,
            'nama' => $this->nama,
            'jumlah' => $this->jumlah,
            'jenis' => new JenisKeuanganResource($this->jenisKeuangan),
        ];
    }
}
