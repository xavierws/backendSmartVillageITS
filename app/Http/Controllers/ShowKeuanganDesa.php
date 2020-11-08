<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BelanjaDesa;
use App\Informasi;
use App\KeuanganDesa;
use App\PendapatanDesa;
use App\User;

class ShowKeuanganDesa extends Controller
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
        $dataTabel = KeuanganDesa::all()->toArray();
        $data = KeuanganDesa::all();
        //$dataTabel = KeuanganDesa::simplePaginate(4);       
        return view('KeuanganDesa/create', compact('dataTabel', 'data'));
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
            'tahun' => 'required|numeric',
            'nama' => 'required',
            'jumlah' => 'numeric|numeric',
            'jenis_keuangan_id' => 'numeric'
            ]);
        KeuanganDesa::create($item);
        return redirect('data/KeuanganDesa/create')->with('success', "Item \"" . implode(", ", $item) . '" has been added');
        
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
        $data = KeuanganDesa::find($id);
        return view('KeuanganDesa/edit',compact('data','id'));
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
        $before = (string) KeuanganDesa::select('tahun', 'nama', 'jumlah', 'jenis_keuangan_id')->where('id', $id)->get();
        $before = str_replace(array('[',']'),'',$before);
        $after = $this->validate(request(), [
            'tahun' => 'required|numeric',
            'nama' => 'required',
            'jumlah' => 'required|numeric',
            'jenis_keuangan_id' => 'required|numeric'
            ]);
        $item = KeuanganDesa::find($id);
        $item->tahun = $request->get('tahun');
        $item->nama = $request->get('nama');
        $item->jumlah = $request->get('jumlah');
        $item->jenis_keuangan_id = $request->get('jenis_keuangan_id');
        $item->save();
        return redirect('data/KeuanganDesa/create')->with('success', "Item has been modified to \n\"" . implode(", ", $after) . '"');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = KeuanganDesa::find($id);
        $data->delete();
        return redirect('data/KeuanganDesa/create')->with('delete','Item has been deleted');
    }
}
