<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\AuthApiController;
use Illuminate\Support\Facades\Route;

Route::prefix('api')->group(function ()
{
    Route::post('/auth', [AuthApiController::class, 'login'])
        ->name('api.auth');

    Route::post('/search', [ApiController::class, 'search'])
        ->middleware('auth:api')
        ->name('api.search');
});