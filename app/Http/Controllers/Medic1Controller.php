<?php

namespace App\Http\Controllers;

use App\Models\Medic1;
use App\Http\Controllers\AntrianController;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Alert;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
class Medic1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect()->route('antrians.index');
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
            'noremed'=>'required',
            'kopasant'=>'required',
            'namapasant'=>'required',
            'tipasant'=>'required',
            'tangantpas'=>'required',
            'berat'=>'required',
            'tinggi'=>'required',
            'lingper'=>'required',
            'suhu'=>'required',
            'tekdar'=>'required',
            'alergi'=>'required',
            'kolest'=>'required',
            'asur'=>'required',
            'glukos'=>'required',
            'hemog'=>'required',
            'keluhanManual'=>Rule::requiredIf(!$request->keluhan)
        ]);

        $array = $request->only([
            'noremed',
            'kopasant',
            'namapasant',
            'tipasant',
            'tangantpas',
            'berat',
            'tinggi',
            'lingper',
            'suhu',
            'tekdar',
            'alergi',
            'kolest',
            'asur',
            'glukos',
            'hemog',
            'keluhan',
        ]);
        
        if(isset($array['keluhan']))
        {
            $manual = "";
            if(strlen($request->keluhanManual) !== 0)
            {
                $manual .= ",".urlencode($request->keluhanManual);
            }
            $array['keluhan'] = implode(",", $array['keluhan']).$manual;
        }
        else
        {
            $array['keluhan'] = urlencode($request->keluhanManual);
        }
        
        $medic1 = Medic1::create($array);
        return redirect()->route('medic1s.show',[
            'medic1'=>$medic1]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $medic1 = Medic1::find($id);
         return view('antri.edit', [
        'medic1' => $medic1
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
