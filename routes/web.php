<?php

use App\Http\Controllers\LoanController;
use App\Http\Controllers\TagsController;
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

Route::resource('loans', LoanController::class)->middleware('auth');


Route::post('/register', [RegisteredUserController::class, 'store'])->name('register.store');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::get('/deleted', [LoanController::class, 'deleted'])->name('deleted')->middleware('auth');

Route::get('/loans/tags/{tag}', [TagsController::class, 'index'])->name('loans.tag')->middleware('auth');
//Route::view('/login', 'login')->name('login');
//Route::view('/register', 'register')->name('register');

//Demo:
//https://demo.pixelcave.com/dashmix/be_layout_content_main_full_width.html
