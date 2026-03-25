<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UploadController;

Route::post('/upload', [UploadController::class, 'upload'])->name('upload.video');

Route::get('/', function () {
    return view('welcome');
});
