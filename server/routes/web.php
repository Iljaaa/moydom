<?php

use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('welcome'));
Route::get('/registry', fn () => view('welcome'));


// api
require base_path('routes/api.php');