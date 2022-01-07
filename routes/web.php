<?php

use App\Http\Controllers\DadataController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\RolesController;
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

Route::get('/deleted', [LoanController::class, 'deleted'])->name('deleted')->middleware('auth');
Route::post('/deleted', [LoanController::class, 'restore'])->name('restore')->middleware('auth');
Route::delete('/deleted', [LoanController::class, 'forceDelete'])->name('force')->middleware('auth');

Route::resource('loans', LoanController::class)->middleware('auth');


Route::post('/register', [RegisteredUserController::class, 'store'])->name('register.store');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');



Route::get('/loans/tags/{tag}', [TagsController::class, 'index'])->name('loans.tag')->middleware('auth');
Route::view('/email/verify', 'auth.verify-email')->name('verify')->middleware('auth');

Route::get('/searchINN', [DadataController::class, 'index'])->name('searchINN')->middleware('auth');
Route::post('/searchINN', [DadataController::class, 'index'])->name('searchINN.index')->middleware('auth');
Route::get('/searchINN/found', [DadataController::class, 'show'])->name('searchINN.show')->middleware('auth');

Route::get('/roles', [RolesController::class, 'index'])->name('roles.index')->middleware('auth');
Route::post('/roles', [RolesController::class, 'store'])->name('roles.store')->middleware('auth');


//Route::view('/login', 'login')->name('login');
//Route::view('/register', 'register')->name('register');

//Demo:
//https://demo.pixelcave.com/dashmix/be_layout_content_main_full_width.html
