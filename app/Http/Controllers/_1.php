<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;

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
        'pasiens' => $pasiens
    ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'status'=>'string'
        ]);
        //$status = 'daftar';

        $array = $request->only(['kopas','namepas','ttlpas','jenkelpas','usiapas','alamatpas','telppas','kontdarpas','tipas','tangdappas'
        ]);
        
        $pasien = Pasien::create($array);

        return view('pasien.show',['pasien'=>$pasien])
        ->with('success_message', 'Berhasil menambah Pasien baru');
    }

    public function daftar(request $request, $id) {

        $pasien = Pasien::find($id);
        //$request = 'daftar';
        $pasien->status = $request->status;
        $pasien->save();
       return redirect()->route('pasiens.index')
            ->with ('success_message', 'Pasien Sudah didaftarkan');
    }
}
