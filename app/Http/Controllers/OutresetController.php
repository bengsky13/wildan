<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OutresetController extends Controller
{
    public function reslogout () {
        //logout user
        auth()->logout();
        // redirect to homepage
        return redirect('password/reset');
        }
    
        public function reslogin (){
         //logut user after reset pass
            auth()->logout();
           //redirect to login page
            return redirect('/login');
        }
}
