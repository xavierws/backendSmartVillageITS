<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penduduk;

class ShowPenduduk extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataTabel = Penduduk::all()->toArray();
        $data = Penduduk::all();
        //$dataTabel = Penduduk::simplePaginate(4);       
        return view('Penduduk/create', compact('dataTabel', 'data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = $this->validate(request(), [
            'nik' => 'required|numeric',
            'nama' => 'required',
            'jenisKelamin' => 'required',
            'tempatLahir' => 'required',
            'tanggalLahir' => 'required|date',
            'agama' => 'required',
            'pendidikan' => 'required',
            'jenisPekerjaan' => 'required',
            'golDarah' => 'required',
            'status_perkawinan' => 'required',
            'kewarganegaraan' => 'required',
            'kartu_keluarga_id' => 'required|numeric',
        ]);
        Penduduk::create($item);
        return redirect('data/Penduduk/create')->with('success', "Item \"" . implode(", ", $item) . '" has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Penduduk::find($id);
        return view('Penduduk/edit', compact('data', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //$before = (string) LayananSurat::select('nama')->where('id', $id)->get();
        //$before = str_replace(array('[',']'),'',$before);
        $after = $this->validate(request(), [
            'nik' => 'required|numeric',
            'nama' => 'required',
            'jenisKelamin' => 'required',
            'tempatLahir' => 'required',
            'tanggalLahir' => 'required|date',
            'agama' => 'required',
            'pendidikan' => 'required',
            'jenisPekerjaan' => 'required',
            'golDarah' => 'required',
            'status_perkawinan' => 'required',
            'kewarganegaraan' => 'required',
            'kartu_keluarga_id' => 'required|numeric',
        ]);
        $item = Penduduk::find($id);
        $item->nik = $request->get('nik');
        $item->nama = $request->get('nama');
        $item->jenisKelamin = $request->get('jenisKelamin');
        $item->tempatLahir = $request->get('tempatLahir');
        $item->tanggalLahir = $request->get('tanggalLahir');
        $item->agama = $request->get('agama');
        $item->pendidikan = $request->get('pendidikan');
        $item->jenisPekerjaan = $request->get('jenisPekerjaan');
        $item->golDarah = $request->get('golDarah');
        $item->status_perkawinan = $request->get('status_perkawinan');
        $item->kewarganegaraan = $request->get('kewarganegaraan');
        $item->kartu_keluarga_id = $request->get('kartu_keluarga_id');
        $item->save();
        return redirect('data/Penduduk/create')->with('success', "Item has been modified to \n\"" . implode(", ", $after) . '"');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Penduduk::find($id);
        $data->delete();
        return redirect('data/Penduduk/create')->with('delete', 'Item has been deleted');
    }
}
