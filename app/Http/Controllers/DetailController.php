<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DetailController extends Controller
{
    //
    public function detailuser($id)
    {
        //
       $user = User::find($id);
        if (!$user) return redirect()->route('users.show')
        ->with('error_message', 'User dengan id'.$id.' tidak ditemukan');
        return view('user.show', [
        'user' => $user
    ]);
}
