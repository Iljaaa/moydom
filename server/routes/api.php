<?php

use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Route;

Route::prefix('api')->group(function ()
{
    Route::post('/search', [ApiController::class, 'search'])
        ->name('api.search');
});