<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LogisticController;
use App\Http\Controllers\PaymentController;
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
    return redirect()->route('login');
});

Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');

Route::group(['prefix' => 'logistics'], function(){
    Route::get('/', [LogisticController::class, 'index'])->name('logistics');
    Route::post('/store', [LogisticController::class, 'store'])->name('logistics.store');
    Route::put('/display/{id}', [LogisticController::class, 'update'])->name('logistics.update');
    Route::delete('/delete/{id}', [LogisticController::class, 'delete'])->name('logistics.delete');
});

Route::group(['prefix' => 'payment'], function(){
    Route::get('/', [PaymentController::class, 'index'])->name('payment');
    Route::post('/store', [PaymentController::class, 'store'])->name('payment.store');
    Route::delete('/delete/{id}', [PaymentController::class, 'delete'])->name('payment.delete');
});

Route::get('/test', function () {
    return view('test');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
