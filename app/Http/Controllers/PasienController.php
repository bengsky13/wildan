<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Models\Pasien;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Alert;
use DB;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Menampilkan data pasien

        $pasiens = Pasien::all();
        return view('pasien.index', [
        'pasien' => $pasiens
    ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pasien.create');
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       //membuat data pasien baru
        $request->validate([
            'kopas'=>'required',
            'namepas'=>'required',
            'ttlpas'=>'required',
            'jenkelpas'=>'required',
            'usiapas'=>'required',
            'alamatpas'=>'required',
            'telppas'=>'required',
            'kontdarpas'=>'required',
            'tipas'=>'required',
            'tangdappas'=>'required',
            'tangkempas'=>'nullable',
            //'status'=>'required'
        ]);

         $array = $request->only(['kopas','namepas','ttlpas','jenkelpas','usiapas','alamatpas','telppas','kontdarpas','tipas','tangdappas'
        ]);
        
        $pasien = Pasien::create($array);
        return redirect()->route('pasiens.show', [
        'pasien' => $pasien
    ])
        ->with('success_message', 'Berhasil menambah pasien baru');
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
        $pasien = Pasien::find($id);
         return view('antri.create', [
        'pasien' => $pasien
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
       //Mengedit Data Pasien
        $pasien = Pasien::find($id);
        if (!$pasien) return redirect()->route('pasiens.index')
        ->with('error_message', 'Pasien dengan id'.$id.' tidak ditemukan');
        return view('pasien.edit', [
        'pasien' => $pasien
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
            'kopas'=>'sometimes',
            'namepas'=>'required',
            'ttlpas'=>'sometimes|date',
            'jenkelpas'=>'required',
            'usiapas'=>'required',
            'alamatpas'=>'sometimes|string',
            'telppas'=>'sometimes|string',
            'kontdarpas'=>'sometimes|string',
            'tipas'=>'sometimes|string',
            'tangdappas'=>'required',
            'tangkempas'=>'sometimes|date'

        ]);
            //'status'=>'required'

            $pasien = Pasien::find($id);
            //$pasien->kopas = $request->kopas;
            $pasien->namepas = $request->namepas;
            $pasien->ttlpas = $request->ttlpas;
            $pasien->jenkelpas = $request->jenkelpas;
            $pasien->usiapas = $request->usiapas;
            $pasien->alamatpas = $request->alamatpas;
            $pasien->telppas = $request->telppas;
            $pasien->kontdarpas = $request->kontdarpas;
            $pasien->tipas =$request->tipas;
            $pasien->tangdappas = $request->tangdappas;
            $pasien->tangkempas = $request->tangkempas;
            $pasien->save();
            return redirect()->route('pasiens.index')
                ->with('success_message', 'Berhasil mengubah pasien');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pasien = Pasien::find($id);
        if ($pasien) $pasien->delete();
    return redirect()->route('pasiens.index')
        ->with('success_message', 'Berhasil menghapus pasien');
    }
}
