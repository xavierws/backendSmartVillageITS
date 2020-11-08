<?php

namespace App\Http\Controllers;

use App\Informasi;
use App\Http\Resources\Informasi as InformasiResource;
use Illuminate\Http\Request;

class InformasiController extends Controller
{
    public function getInformasi()
    {
        $info = Informasi::all();
        return InformasiResource::collection($info);
    }
}
