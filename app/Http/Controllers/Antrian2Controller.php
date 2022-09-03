<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use App\Http\Controllers\Antrian2Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Alert;
use Illuminate\Support\Facades\DB;

class Antrian2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $antrian2 = Antrian::all()->where('status','medic1');
        return view('medic_2.index',[
            'antrian2s'=>$antrian2]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $antrian2 = Antrian::find($id);
         return view('medic_2.create', [
        'antrian2s' => $antrian2
    ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $antrian2s = Antrian::find($id);
        if ($antrian2s) $antrian2s->delete();
    return redirect()->route('antrian2s.index')
        ->with('success_message', 'Pasien silahkan menuju Apotek');
    }
}
