<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ShortUrlController;

Route::get('/{code}', [ShortUrlController::class, 'redirectToorigin']);
