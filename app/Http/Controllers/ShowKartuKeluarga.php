<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KartuKeluarga;

class ShowKartuKeluarga extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataTabel = KartuKeluarga::all()->toArray();
        $data = KartuKeluarga::all();
        //$dataTabel = KartuKeluarga::simplePaginate(4);       
        return view('KartuKeluarga/create', compact('dataTabel', 'data'));
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
            'noKK' => 'required|numeric',
            'kepalaKeluarga' => 'required',
            'alamat' => 'required',
            'rt' => 'required|numeric',
            'rw' => 'required|numeric',
            'kodePos' => 'required|numeric',
            'desa' => 'required',
            'kecamatan' => 'required',
            'kota' => 'required',
            'provinsi' => 'required'
            ]);
        KartuKeluarga::create($item);
        return redirect('data/KartuKeluarga/create')->with('success', "Item \"" . implode(", ", $item) . '" has been added');
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
        $data = KartuKeluarga::find($id);
        return view('KartuKeluarga/edit',compact('data','id'));
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
            'noKK' => 'required|numeric',
            'kepalaKeluarga' => 'required',
            'alamat' => 'required',
            'rt' => 'required|numeric',
            'rw' => 'required|numeric',
            'kodePos' => 'required|numeric',
            'desa' => 'required',
            'kecamatan' => 'required',
            'kota' => 'required',
            'provinsi' => 'required',
            ]);
        $item = KartuKeluarga::find($id);
        $item->noKK = $request->get('noKK');
        $item->kepalaKeluarga = $request->get('kepalaKeluarga');
        $item->alamat = $request->get('alamat');
        $item->rt = $request->get('rt');
        $item->rw = $request->get('rw');
        $item->kodePos = $request->get('kodePos');
        $item->desa = $request->get('desa');
        $item->kecamatan = $request->get('kecamatan');
        $item->kota = $request->get('kota');
        $item->provinsi = $request->get('provinsi');
        $item->save();
        return redirect('data/KartuKeluarga/create')->with('success', "Item has been modified to \n\"" . implode(", ", $after) . '"');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = KartuKeluarga::find($id);
        $data->delete();
        return redirect('data/KartuKeluarga/create')->with('delete','Item has been deleted');
    }
}
