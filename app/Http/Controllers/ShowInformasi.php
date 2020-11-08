<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Informasi;

class ShowInformasi extends Controller
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
        $dataTabel = Informasi::all()->toArray();
        $data = Informasi::all();
        //$dataTabel = KeuanganDesa::simplePaginate(4);       
        return view('Informasi/create', compact('dataTabel', 'data'));
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
            'nama_kegiatan' => 'required',
            'hari' => 'required',
            'tanggal' => 'required|date',
            'waktu' => 'required|date_format:H:i'
            ]);
        Informasi::create($item);
        return redirect('data/Informasi/create')->with('success', "Item \"" . implode(", ", $item) . '" has been added');
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
        $data = Informasi::find($id);
        return view('Informasi/edit',compact('data','id'));
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
        $after = $this->validate(request(), [
            'nama_kegiatan' => 'required',
            'hari' => 'required',
            'tanggal' => 'required|date',
            'waktu' => 'required|date_format:H:i'
            ]);
        $before = (string) Informasi::select('nama_kegiatan')->where('id', $id)->get();
        $before = str_replace(array('[',']'),'',$before);
        $item = Informasi::find($id);
        $item->nama_kegiatan = $request->get('nama_kegiatan');
        $item->hari = $request->get('hari');
        $item->tanggal = $request->get('tanggal');
        $item->waktu = $request->get('waktu');
        $item->save();
        return redirect('data/Informasi/create')->with('success', "Item has been modified to \n\"" . implode(", ", $after) . '"');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Informasi::find($id);
        $data->delete();
        return redirect('data/Informasi/create')->with('delete','Item has been deleted');
    }
}
