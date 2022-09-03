<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Alert;
use Illuminate\Support\Facades\DB;
use App\Models\Antrian;
//use App\Http\Controllers\PasienController;

class AntrianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $antrian = Antrian::all()->where('status','daftar');
        return view('medic_1.index',[
            'antrians'=>$antrian]);
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
            'noant'=>'required',
            'kopasant'=>'required',
            'namapasant'=>'required',
            'status'=>'required',
            'tipasant'=>'required',
            'tangantpas'=>'required',
        ]);

         $array = $request->only(['noant','kopasant','namapasant','status','tipasant','tangantpas'
        ]);

         $antri = Antrian::create($array);
          return redirect()->route('pasiens.index')
        ->with('success_message', 'Pasien sudah dalam Antrian');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $antrian = Antrian::find($id);
         return view('medic_1.create', [
        'antrian' => $antrian
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
         $medic1 = Antrian::find($id);
         return view('antri.edit', [
        'medic1' => $medic1
    ]);
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
            $request->validate([
            'kopasant'=>'sometimes',
            'status'=>'required'
        ]);

        $antrian = DB::table('antrians')->where('kopasant',$request->kopasant)
        ->update(['status' => $request->status]);
            return redirect()->route('antrians.index')
                ->with('success_message', 'Pemeriksaan Awal Pasien Selesai');
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
