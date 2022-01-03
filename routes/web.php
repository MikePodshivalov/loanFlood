<?php

use App\Http\Controllers\LoanController;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;

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



Route::match(['get', 'post'], '/', function(){
    return view('home');
})->middleware('auth')->name('home');

Route::resource('loans', LoanController::class)
    ->missing(function (Request $request) {
        return Redirect::route('loans.index');
    });
//    ->middleware('auth');


Route::post('/register', [RegisteredUserController::class, 'store'])->name('register.store');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

//Route::view('/login', 'login')->name('login');
//Route::view('/register', 'register')->name('register');

//Demo:
//https://demo.pixelcave.com/dashmix/be_layout_content_main_full_width.html
