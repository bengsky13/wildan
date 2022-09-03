<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apotek;

class ApotekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Menampilkan data Obat
        $apoteks = Apotek::all();

        return view('apotek.index',[
            'apoteks' => $apoteks
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Menampilkan Form Tambah data
        return view('apotek.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Menyimpan Data Obat
        $request->validate ([
            'kobat'=>'required',
            'namobat'=>'required|string|unique:apoteks,namobat',
            'jenobat'=>'required',
            'kemobat'=>'required',
            'satobat'=>'required',
            'stokobat'=>'required',
        ]);

        $array = $request->only([
            'kobat','namobat','jenobat','kemobat','satobat','stokobat']);
        $apotek = Apotek::create($array);
        return redirect()->route('apoteks.index')
            ->with('success_message','Berhasil Membuat Data Obat Baru');
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
        //tampil form Mengedit pasien
        $apotek = Apotek::find($id);
        if (!$apotek) return redirect()->route('apoteks.index')
            ->with('error_message', 'obat id'.$id.' tidak ditemukan');
        return view('apotek.edit', [
            'apotek' => $apotek
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
        //update data obat
        $request->validate([
            // 'kobat'=>'sometimes',
            // 'namobat'=>'required',
            // 'jenobat'=>'required',
            // 'kemobat'=>'required',
            // 'satobat'=>'required',
            'stokobat'=>'required'
        ]);

        $apotek = Apotek::find($id);
        //$pasien->kopas = $request->kopas;
        //$apotek->namobat = $request->namobat;
        //$apotek->jenobat = $request->jenobat;
        //$apotek->kemobat = $request->kemobat;
        //$apotek->satobat = $request->satobat;
        $apotek->stokobat = $request->stokobat;
       
        $apotek->save();
        return redirect()->route('apoteks.index')
            ->with ('success_message', 'Berhasil menambah data obat');

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
