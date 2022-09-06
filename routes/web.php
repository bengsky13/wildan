<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasienController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('./auth/login');
});

//Auth::routes();



Auth::routes();

Route::get('/user_dashboard', [App\Http\Controllers\Superuser\DashboardController::class,'index'])->name('dashboard');

Route::get('/pasien_dashboard', [App\Http\Controllers\Pasien\DashboardController::class,'index'])->name('dashboard_pasien');

Route::get('/medica_dashboard', [App\Http\Controllers\Medica\DashboardController::class,'index'])->name('dashboard_medic1');

Route::get('/medicb_dashboard', [App\Http\Controllers\Medicb\DashboardController::class,'index'])->name('dashboard_medic2');

Route::get('/apotek_dashboard', [App\Http\Controllers\Apotek\DashboardController::class,'index'])->name('dashboard_apotek');

Route::get('/reslogout', [App\Http\Controllers\OutresetController::class, 'reslogout'])
    ->middleware('auth');

Route::get('/reslogin', [App\Http\Controllers\OutresetController::class, 'reslogin'])
->middleware('auth');

Route::get('/home', function() {
    return view('./auth/login');
    })->name('home')->middleware('auth');

Route::resource('users', \App\Http\Controllers\UserController::class)
    ->middleware('auth');	

//Route::resource('pasiens', \App\Http\Controllers\PasienController::class)
    //->middleware('auth');

Route::resource('pasiens', \App\Http\Controllers\PasienController::class)
    ->middleware('auth');	

Route::resource('antrians', \App\Http\Controllers\AntrianController::class)
    ->middleware('auth');

Route::resource('antrian2s', \App\Http\Controllers\Antrian2Controller::class)
    ->middleware('auth');

Route::resource('medic1s', \App\Http\Controllers\Medic1Controller::class)
    ->middleware('auth');

Route::resource('medic2s', \App\Http\Controllers\Medic2Controller::class)
    ->middleware('auth');

Route::resource('apoteks', \App\Http\Controllers\ApotekController::class)
	->middleware('auth');

Route::resource('reseps', \App\Http\Controllers\ResepController::class)
    ->middleware('auth');

Route::get('/detail.user', function(){
	return view('user/userdetail');
 })->name('detail.user')->middleware('auth');

Route::post('/changepass', [App\Http\Controllers\UserController::class,'changepass'])->middleware('auth');

 
Route::get('/detail.admin', function(){
	return view('pasien/useradmin');
 })->name('detail.admin')->middleware('auth');

Route::get('/detail.apoteker', function(){
	return view('apotek/userapotek');
 })->name('detail.apoteker')->middleware('auth');


