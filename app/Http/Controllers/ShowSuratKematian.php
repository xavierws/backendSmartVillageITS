<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SuratKematian;

class ShowSuratKematian extends Controller
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
        $dataTabel = SuratKematian::all()->toArray();
        $data = SuratKematian::all();
        //$dataTabel = SuratKematian::simplePaginate(4);       
        return view('SuratKematian/create', compact('dataTabel', 'data'));
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
            'tempat' => 'required',
            'penyebab' => 'required',
            'terlapor_id' => 'required|numeric',
            'kependudukan_id' => 'required|numeric'
            ]);
        SuratKematian::create($item);
        return redirect('data/SuratKematian/create')->with('success', "Item \"" . implode(", ", $item) . '" has been added');
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
        $data = SuratKematian::find($id);
        return view('SuratKematian/edit',compact('data','id'));
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
        //$before = (string) SuratKematian::select('nama')->where('id', $id)->get();
        //$before = str_replace(array('[',']'),'',$before);
        $after = $this->validate(request(), [
            'tanggal' => 'required|date',
            'tempat' => 'required',
            'penyebab' => 'required',
            'terlapor_id' => 'required|numeric',
            'kependudukan_id' => 'required|numeric'
            ]);
        $item = SuratKematian::find($id);
        $item->tanggal = $request->get('tanggal');
        $item->tempat = $request->get('tempat');
        $item->penyebab = $request->get('penyebab');
        $item->terlapor_id = $request->get('terlapor_id');
        $item->kependudukan_id = $request->get('kependudukan_id');
        $item->save();
        return redirect('data/SuratKematian/create')->with('success', "Item has been modified to \n\"" . implode(", ", $after) . '"');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = SuratKematian::find($id);
        $data->delete();
        return redirect('data/SuratKematian/create')->with('delete','Item has been deleted');
    }
}
