<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\umum;

class ShowSuratUmum extends Controller
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
        $dataTabel = umum::all()->toArray();
        $data = umum::all();
        //$dataTabel = umum::simplePaginate(4);       
        return view('SuratUmum/create', compact('dataTabel', 'data'));
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
            'keterangan' => 'required',
            'keperluan' => 'required',
            'layanan_surat_id' => 'required|numeric'
            ]);
        umum::create($item);
        return redirect('data/SuratUmum/create')->with('success', "Item \"" . implode(", ", $item) . '" has been added');
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
        $data = umum::find($id);
        return view('SuratUmum/edit',compact('data','id'));
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
        //$before = (string) umum::select('nama')->where('id', $id)->get();
        //$before = str_replace(array('[',']'),'',$before);
        $after = $this->validate(request(), [
            'keterangan' => 'required',
            'keperluan' => 'required',
            'layanan_surat_id' => 'required|numeric'
            ]);
        $item = umum::find($id);
        $item->keterangan = $request->get('keterangan');
        $item->keperluan = $request->get('keperluan');
        $item->layanan_surat_id = $request->get('layanan_surat_id');
        $item->save();
        return redirect('data/SuratUmum/create')->with('success', "Item has been modified to \n\"" . implode(", ", $after) . '"');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = umum::find($id);
        $data->delete();
        return redirect('data/SuratUmum/create')->with('delete','Item has been deleted');
    }
}
