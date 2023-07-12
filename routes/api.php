<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\ShortUrlController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [RegisterController::class, 'login']);
     
Route::middleware('auth:sanctum')->group( function () {

    Route::prefix('url')->group(function(){
        Route::get('/',  [ShortUrlController::class, 'getUrl']);
        Route::post('/', [ShortUrlController::class, 'shortUrl']);
        Route::delete('/{id}', [ShortUrlController::class, 'remove']);
    });
});
