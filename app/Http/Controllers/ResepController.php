<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Medic2;
use App\Models\Resep;
use Carbon\Carbon;
use Alert;
use DB;

class ResepController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reseps = Medic2::all();
 
        return view('resep.index', [
        'reseps' => $reseps]);
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
        $request->validate([

        'noresep'=>'required',
        'noremed'=>'required',
        'namdok'=>'required',
        'obat'=>'required'
        ]);

        $array = $request->only([
        'noresep',
        'noremed',
        'namdok',
        'obat'
        ]);

         $resep = Resep::create($array);
        return redirect()->route('reseps.index')
        ->with('success_message', 'Berhasil ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $reseps = Medic2::find($id);
         return view('resep.create', [
        'resep' => $reseps
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
        //
    }
}
