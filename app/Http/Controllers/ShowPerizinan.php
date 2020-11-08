<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PerizinanKtp;

class ShowPerizinan extends Controller
{
    public function create()
    {
        $dataTabel = PerizinanKtp::all()->toArray();
        $data = PerizinanKtp::all();
        //$dataTabel = PerizinanKtp::simplePaginate(4);       
        return view('PerizinanKtp/create', compact('dataTabel', 'data'));
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
            'status_perkawinan' => 'required'
            ]);
        PerizinanKtp::create($item);
        return redirect('data/PerizinanKTP/create')->with('success', "Item \"" . implode(", ", $item) . '" has been added');
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
        $data = PerizinanKtp::find($id);
        return view('PerizinanKTP/edit',compact('data','id'));
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
        //$before = (string) PerizinanKtp::select('nama')->where('id', $id)->get();
        //$before = str_replace(array('[',']'),'',$before);
        $after = $this->validate(request(), [
            'pemohon_id' => 'required|numeric',
            'status_perkawinan' => 'required'
            ]);
        $item = PerizinanKtp::find($id);
        $item->pemohon_id = $request->get('pemohon_id');
        $item->status_perkawinan = $request->get('status_perkawinan');
        $item->save();
        return redirect('data/PerizinanKTP/create')->with('success', "Item has been modified to \n\"" . implode(", ", $after) . '"');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = PerizinanKtp::find($id);
        $data->delete();
        return redirect('data/PerizinanKTP/create')->with('delete','Item has been deleted');
    }
}
