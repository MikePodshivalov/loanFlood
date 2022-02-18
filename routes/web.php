<?php

use App\Http\Controllers\DadataController;
use App\Http\Controllers\DifficultyController;
use App\Http\Controllers\ExecutorController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\OperationController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\TagsController;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;

Route::match(['get', 'post'], '/', function(){
    return view('home');
})->middleware('auth')->name('home');

Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/deleted', [LoanController::class, 'deleted'])->name('deleted');
    Route::post('/deleted', [LoanController::class, 'restore'])->name('restore');
    Route::delete('/deleted', [LoanController::class, 'forceDelete'])->name('force');
    Route::get('/roles', [RolesController::class, 'index'])->name('roles.index');
    Route::post('/roles', [RolesController::class, 'store'])->name('roles.store');
    Route::post('/roles/delete', [RolesController::class, 'destroy'])->name('roles.destroy');
});

Route::group(['middleware' => ['verified']], function () {
    Route::resource('loans', LoanController::class);
    Route::get('/loans/tags/{tag}', [TagsController::class, 'index'])->name('loans.tag');
    Route::get('/searchINN', [DadataController::class, 'index'])->name('searchINN');
    Route::post('/searchINN', [DadataController::class, 'index'])->name('searchINN.index');
    Route::get('/searchINN/found', [DadataController::class, 'show'])->name('searchINN.show');
});

Route::group(['middleware' => ['auth']], function () {
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
    Route::view('/email/verify', 'auth.verify-email')->name('verify');
});

Route::group(['middleware' => ['verified']], function () {
    Route::post('/executor', [ExecutorController::class, 'update'])->name('executor.update');
});

Route::group(['middleware' => ['role:km_main|admin']], function () {
    Route::post('/executor/sendLoanToDepartments', [ExecutorController::class, 'sendLoanToDepartments'])->name('executor.sendLoanToDepartments');
});

Route::group(['middleware' => ['role:ukk|km|iab|pd|zs']], function () {
    Route::get('/home', [LoanController::class, 'homeIndex'])->name('loans.homeIndex');
    Route::post('/home', [LoanController::class, 'homeIndex'])->name('loans.homeIndex');
    Route::post('/operation', [OperationController::class, 'storeDefaultOperationsUKK'])->name('operations.storeDefaultOperationsUKK');
    Route::post('/operation/store', [OperationController::class, 'store'])->name('operations.store');
    Route::post('/operation/done', [OperationController::class, 'done'])->name('operations.done');
});

Route::post('/register', [RegisteredUserController::class, 'store'])->name('register.store');

Route::group(['middleware' => ['role:ukk_main|admin']], function () {
    Route::post('/difficulty', [DifficultyController::class, 'update'])->name('difficulty.update');
});

//https://demo.pixelcave.com/dashmix/be_layout_content_main_full_width.html
