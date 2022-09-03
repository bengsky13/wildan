<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Alert;
use DB;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //menampilkan data user

        $users = User::all();
        return view('user.index', [
        'user' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //menambah user baru
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Menyimpan user baru
        $request->validate([
            'nip'   =>'required|string|unique:users,nip',
            'name'  => 'required',
            'jenkel'=>'required',
            'ttl'   => 'date',
            'alamat'=>'required',
            'telepon'=>'required|string|max:255',
            'kontak_darurat'=>'required|string|max:255',
            'jabatan'=>'required',
            'bagian'=>'required',
            'position'=>'required|nullable',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed'
        ]);

        $array = $request->only([
        'nip','name','jenkel','ttl','alamat','telepon','kontak_darurat','jabatan','bagian','position','email','password'
        ]);

    $array['password'] = bcrypt($array['password']);
    $user = User::create($array);
    return redirect()->route('users.index')
        ->with('success_message', 'Berhasil menambah user baru');
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
       $user = User::find($id);
        if (!$user) return redirect()->route('users.show')
        ->with('error_message', 'User dengan id'.$id.' tidak ditemukan');
        return view('user.show', [
        'user' => $user
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
        //Mengedit Data Pegawai
        $user = User::find($id);
        if (!$user) return redirect()->route('users.index')
        ->with('error_message', 'User dengan id'.$id.' tidak ditemukan');
        return view('user.edit', [
        'user' => $user
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
        //
        $request->validate([
            'nip'   =>'sometimes|string|unique:users,nip',
            'name' => 'required',
            'jenkel'=>'required|string',
            'ttl'   => 'date',
            'alamat'=>'required',
            'telepon'=>'required|string|max:255',
            'kontak_darurat'=>'required|string|max:255',
            'jabatan'=>'required',
            'bagian'=>'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'sometimes|nullable|confirmed'
    ]);
    $user = User::find($id);
    $user->name = $request->name;
    $user->jenkel = $request->jenkel;
    $user->ttl = $request->ttl;
    $user->alamat = $request->alamat;
    $user->telepon = $request->telepon;
    $user->kontak_darurat = $request->kontak_darurat;
    $user->jabatan  = $request->jabatan;
    $user->bagian = $request->bagian;
    $user->email = $request->email;
    if ($request->password) $user->password = bcrypt($request->password);
    $user->save();
    return redirect()->route('users.index')
        ->with('success_message', 'Berhasil mengubah user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //Menghapus user
     $user = User::find($id);
    if ($id == $request->user()->id) return redirect()->route('users.index')
        ->with('error_message', 'Anda tidak dapat menghapus diri sendiri.');
    if ($user) $user->delete();
    return redirect()->route('users.index')
        ->with('success_message', 'Berhasil menghapus user');
    }
}
