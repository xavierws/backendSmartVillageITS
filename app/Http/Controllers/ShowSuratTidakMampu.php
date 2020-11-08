<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TidakMampu;

class ShowSuratTidakMampu extends Controller
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
        $dataTabel = TidakMampu::all()->toArray();
        $data = TidakMampu::all();
        //$dataTabel = TidakMampu::simplePaginate(4);       
        return view('SuratTidakMampu/create', compact('dataTabel', 'data'));
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
            'siswa_id' => 'required|numeric',
            'sekolah' => 'required',
            'layanan_surat_id' => 'required|numeric'
            ]);
        TidakMampu::create($item);
        return redirect('data/SuratTidakMampu/create')->with('success', "Item \"" . implode(", ", $item) . '" has been added');
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
        $data = TidakMampu::find($id);
        return view('SuratTidakMampu/edit',compact('data','id'));
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
        //$before = (string) TidakMampu::select('nama')->where('id', $id)->get();
        //$before = str_replace(array('[',']'),'',$before);
        $after = $this->validate(request(), [
            'siswa_id' => 'required|numeric',
            'sekolah' => 'required',
            'layanan_surat_id' => 'required|numeric'
            ]);
        $item = TidakMampu::find($id);
        $item->siswa_id = $request->get('siswa_id');
        $item->sekolah = $request->get('sekolah');
        $item->layanan_surat_id = $request->get('layanan_surat_id');
        $item->save();
        return redirect('data/SuratTidakMampu/create')->with('success', "Item has been modified to \n\"" . implode(", ", $after) . '"');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = TidakMampu::find($id);
        $data->delete();
        return redirect('data/SuratTidakMampu/create')->with('delete','Item has been deleted');
    }
}
