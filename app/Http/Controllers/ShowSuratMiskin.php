<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\miskin;

class ShowSuratMiskin extends Controller
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
        $dataTabel = miskin::all()->toArray();
        $data = miskin::all();
        //$dataTabel = miskin::simplePaginate(4);       
        return view('SuratMiskin/create', compact('dataTabel', 'data'));
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
            'layanan_surat_id' => 'required|numeric'
            ]);
        miskin::create($item);
        return redirect('data/SuratMiskin/create')->with('success', "Item \"" . implode(", ", $item) . '" has been added');
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
        $data = miskin::find($id);
        return view('SuratMiskin/edit',compact('data','id'));
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
        //$before = (string) miskin::select('nama')->where('id', $id)->get();
        //$before = str_replace(array('[',']'),'',$before);
        $after = $this->validate(request(), [
            'keterangan' => 'required',
            'layanan_surat_id' => 'required|numeric'
            ]);
        $item = miskin::find($id);
        $item->keterangan = $request->get('keterangan');
        $item->layanan_surat_id = $request->get('layanan_surat_id');
        $item->save();
        return redirect('data/SuratMiskin/create')->with('success', "Item has been modified to \n\"" . implode(", ", $after) . '"');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = miskin::find($id);
        $data->delete();
        return redirect('data/SuratMiskin/create')->with('delete','Item has been deleted');
    }
}
