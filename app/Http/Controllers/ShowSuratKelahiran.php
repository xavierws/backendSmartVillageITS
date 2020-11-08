<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SuratKelahiran;

class ShowSuratKelahiran extends Controller
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
        $dataTabel = SuratKelahiran::all()->toArray();
        $data = SuratKelahiran::all();
        //$dataTabel = SuratKelahiran::simplePaginate(4);       
        return view('SuratKelahiran/create', compact('dataTabel', 'data'));
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
            'tanggal' => 'required|date',
            'waktu' => 'required|date_format:H:i',
            'jenisKelamin' => 'required',
            'tempat' => 'required',
            'ayah_id' => 'required|numeric',
            'ibu_id' => 'required|numeric',
            'kependudukan_id' => 'required|numeric'
            ]);
        SuratKelahiran::create($item);
        return redirect('data/SuratKelahiran/create')->with('success', "Item \"" . implode(", ", $item) . '" has been added');
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
        $data = SuratKelahiran::find($id);
        return view('SuratKelahiran/edit',compact('data','id'));
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
        //$before = (string) SuratKelahiran::select('nama')->where('id', $id)->get();
        //$before = str_replace(array('[',']'),'',$before);
        $after = $this->validate(request(), [
            'tanggal' => 'required|date',
            'waktu' => 'required|date_format:H:i',
            'jenisKelamin' => 'required',
            'tempat' => 'required',
            'ayah_id' => 'required|numeric',
            'ibu_id' => 'required|numeric',
            'kependudukan_id' => 'required|numeric'
            ]);
        $item = SuratKelahiran::find($id);
        $item->tanggal = $request->get('tanggal');
        $item->waktu = $request->get('waktu');
        $item->jenisKelamin = $request->get('jenisKelamin');
        $item->tempat = $request->get('tempat');
        $item->ayah_id = $request->get('ayah_id');
        $item->ibu_id = $request->get('ibu_id');
        $item->kependudukan_id = $request->get('kependudukan_id');
        $item->save();
        return redirect('data/SuratKelahiran/create')->with('success', "Item has been modified to \n\"" . implode(", ", $after) . '"');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = SuratKelahiran::find($id);
        $data->delete();
        return redirect('data/SuratKelahiran/create')->with('delete','Item has been deleted');
    }
}
