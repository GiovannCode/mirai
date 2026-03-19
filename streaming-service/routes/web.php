<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StreamController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/stream/{movie}/{file}', [StreamController::class, 'stream']);