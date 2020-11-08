<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\layananSurat;

class ShowLayananSurat extends Controller
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
        $dataTabel = layananSurat::all()->toArray();
        $data = layananSurat::all();
        //$dataTabel = layananSurat::simplePaginate(4);       
        return view('LayananSurat/create', compact('dataTabel', 'data'));
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
            'pemohon_id' => 'required|numeric',
            'noSurat' => 'required|numeric',
            'tanggal_masuk' => 'required|date'
            ]);
        layananSurat::create($item);
        return redirect('data/LayananSurat/create')->with('success', "Item \"" . implode(", ", $item) . '" has been added');
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
        $data = layananSurat::find($id);
        return view('LayananSurat/edit',compact('data','id'));
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
            'pemohon_id' => 'required|numeric',
            'noSurat' => 'required|numeric',
            'tanggal_masuk' => 'required|date'
            ]);
        $item = layananSurat::find($id);
        $item->pemohon_id = $request->get('pemohon_id');
        $item->noSurat = $request->get('noSurat');
        $item->tanggal_masuk = $request->get('tanggal_masuk');
        $item->save();
        return redirect('data/LayananSurat/create')->with('success', "Item has been modified to \n\"" . implode(", ", $after) . '"');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = layananSurat::find($id);
        $data->delete();
        return redirect('data/LayananSurat/create')->with('delete','Item has been deleted');
    }
}
