<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Penduduk extends JsonResource
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
            'nama' => $this->nama, 
            'noKK' => $this->kartuKeluarga->noKK, 
            'NIK' => $this->nik, 
            'jenisKelamin' => $this->jenisKelamin, 
            'golDarah' => $this->golDarah, 
            'tempatLahir' => $this->tempatLahir, 
            'tanggalLahir' => $this->tanggalLahir, 
            'alamat' => $this->kartuKeluarga->alamat, 
            'rt' => $this->kartuKeluarga->rt, 
            'rw' => $this->kartuKeluarga->rw, 
            'kewarganegaraan' => $this->kewarganegaraan, 
            'agama' => $this->agama, 
            'pekerjaan' => $this->jenisPekerjaan,
            'statusKawin' => $this->status_perkawinan
        ];
    }
}
