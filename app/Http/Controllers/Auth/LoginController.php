<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
        public function redirectTo() {
        $role = Auth::user()->position; 
        switch ($role) {
        case 'superuser':
            return '/user_dashboard';
            break;
        case 'admin':
            return '/pasien_dashboard';
            break; 
        case 'apotek':
            return '/apotek_dashboard';
            break;
        case 'medic1':
            return '/medica_dashboard';
            break;
        case 'medic2':
            return '/medicb_dashboard';
            break;
        default:
            return '/home'; 
        break;
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
