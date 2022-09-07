<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Resep;
use App\Models\Apotek;
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
        $reseps = Resep::all();
 
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
        $pecah = explode("\n", $request->obat);
        $x = 0;
        $arrayObat = array();
        foreach($pecah as $list)
        {

            $second = explode("Jumlah: ", $list);
            $namaObat = explode(" ", $second[0]);
            for($i = 0; $i<4; $i++)
            {
                unset($namaObat[count($namaObat)-1]);
            }
            $arrayObat[$x]['nama'] = implode(" ", $namaObat);
            $arrayObat[$x]['jumlah'] = $second[1];
            $x++;
        }
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
         if($resep)
         {
            
            foreach($arrayObat as $list)
            {
                $obat = Apotek::where("namobat", $list['nama'])->first();
                $obat->decrement("stokobat", $list['jumlah']);
                $obat->touch();
            }
         }
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
         $reseps = Resep::find($id);
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
