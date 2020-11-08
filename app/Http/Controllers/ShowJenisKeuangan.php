<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\jenisKeuangan;

class ShowJenisKeuangan extends Controller
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
        $dataTabel = jenisKeuangan::all()->toArray();
        $data = jenisKeuangan::all();
        //$dataTabel = KeuanganDesa::simplePaginate(4);       
        return view('JenisKeuanganDesa/create', compact('dataTabel', 'data'));
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
            'nama' => 'required',
            ]);
        JenisKeuangan::create($item);
        return redirect('data/JenisKeuanganDesa/create')->with('success', "Item \"" . implode(", ", $item) . '" has been added');
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
        $data = JenisKeuangan::find($id);
        return view('JenisKeuanganDesa/edit',compact('data','id'));
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
        $before = (string) JenisKeuangan::select('nama')->where('id', $id)->get();
        $before = str_replace(array('[',']'),'',$before);
        $after = $this->validate(request(), [
            'nama' => 'required'
            ]);
        $item = JenisKeuangan::find($id);
        $item->nama = $request->get('nama');
        $item->save();
        return redirect('data/JenisKeuanganDesa/create')->with('success', "Item has been modified to \n\"" . implode(", ", $after) . '"');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = JenisKeuangan::find($id);
        $data->delete();
        return redirect('data/JenisKeuanganDesa/create')->with('delete','Item has been deleted');
    }
}
