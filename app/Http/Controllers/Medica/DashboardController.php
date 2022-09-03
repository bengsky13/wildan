<?php

namespace App\Http\Controllers\Medica;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
      }

      public function index() {
        return view('medic_1.dashboard');
        }
    
}
