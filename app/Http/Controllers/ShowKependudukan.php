<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kependudukan;

class ShowKependudukan extends Controller
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
        $dataTabel = Kependudukan::all()->toArray();
        $data = Kependudukan::all();
        //$dataTabel = Kependudukan::simplePaginate(4);       
        return view('Kependudukan/create', compact('dataTabel', 'data'));
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
            'noSurat' => 'required|numeric',
            'tanggal_masuk' => 'required|date',
            'hubungan' => 'required',
            'pelapor_id' => 'required|numeric'
            ]);
        Kependudukan::create($item);
        return redirect('data/Kependudukan/create')->with('success', "Item \"" . implode(", ", $item) . '" has been added');
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
        $data = Kependudukan::find($id);
        return view('Kependudukan/edit',compact('data','id'));
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
        //$before = (string) Kependudukan::select('nama')->where('id', $id)->get();
        //$before = str_replace(array('[',']'),'',$before);
        $after = $this->validate(request(), [
            'noSurat' => 'required|numeric',
            'tanggal_masuk' => 'required|date',
            'hubungan' => 'required',
            'pelapor_id' => 'required|numeric'
            ]);
        $item = Kependudukan::find($id);
        $item->noSurat = $request->get('noSurat');
        $item->tanggal_masuk = $request->get('tanggal_masuk');
        $item->hubungan = $request->get('hubungan');
        $item->pelapor_id = $request->get('pelapor_id');
        $item->save();
        return redirect('data/Kependudukan/create')->with('success', "Item has been modified to \n\"" . implode(", ", $after) . '"');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Kependudukan::find($id);
        $data->delete();
        return redirect('data/Kependudukan/create')->with('delete','Item has been deleted');
    }
}
