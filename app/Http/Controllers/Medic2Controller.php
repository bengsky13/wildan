<?php

namespace App\Http\Controllers;

use App\Models\Medic2;
use App\Models\Resep;
use App\Models\Apotek;
use App\Http\Controllers\AntrianController;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Alert;
use Illuminate\Support\Facades\DB;


class Medic2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $antrian = DB::table('antrians')->where('status','medic1');
        // return view('medic_2.index',[
            // 'antrians'=>$antrian]);
        return redirect()->route('antrian2s.index');
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
        $dose = $request->dosis;
        $lastIndex = count($dose)-1;
        if($lastIndex !== 0)
        {
            $empty = 0;
            foreach($dose[$lastIndex] as $list)
            {
                if(strlen($list) == 0)
                {
                    $empty = 1;
                }
            }
            if($empty ==1 )
            {
                unset($dose[$lastIndex]);
            }
        }
        else
        {
            $dose = $request->dosis;
            $empty = 0;
            foreach($dose[0] as $list)
            {
                if(strlen($list) == 0)
                {
                    $empty = 1;
                }
            }
            if($empty ==1 )
            {
                unset($dose[$lastIndex]);
            }
        }
        if(count($dose) !== 0)
        {
            $stringDosis = "";
            foreach($dose as $list)
            {
                $findObat = Apotek::where("id", $list['nama_obat'])->first();
                $stringDosis .= $findObat->namobat." ".$list['dosis1']." X ".$list['dosis2']." Jumlah: ".$list['jumlah_obat']."\n";
            }
            $request->merge(["obat" => $stringDosis]);
        }
        $request->validate([
            'noremed'=>'required',
            'kopasant'=>'required',
            'tangantpas'=>'required',
            'keluhan'=>'required',
            'namdok'=>'required',
            'periksa'=>'required',
            'diagnosa'=>'required',
            'noresep'=>'required',
            'obat'=>'required',
        ]);
        $array = $request->only([
            'noremed',
            'kopasant',
            'tangantpas',
            'keluhan',
            'namdok',
            'periksa',
            'diagnosa',
            'noresep',
            'obat'
        ]);
        if($medic2 = Medic2::create($array))
        {
            $array2 = $request->only([
                'noresep',
                'obat',
                'noremed',
                'namdok'
            ]);
            $resep = Resep::create($array2);
            return redirect()->route('antrian2s.index')
                ->with('success_message','Pemeriksaan pasien selesai');
        }
        else
        {
            return redirect()->route('antrian2s.index')
                ->with('error_message','Error');
        }
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
