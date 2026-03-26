<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('home');
});


Route::get('/login-test', function () {
    session(['token' => 'demo-token']);
    return "LOGIN OK";
});


Route::get('/test-protegido', function () {
    return "ENTRASTE 🔥 DIRECTO LARAVEL";
});

Route::get('/series', function () {
    return view('series');
})->name('series');;

Route::get('/peliculas', function () {
    return view('peliculas');
})->name('peliculas');;

// Route::get('/mi-lista', function () {
//     return view('mi-lista');
// });

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');


Route::get('/profile', function () {
    return view('profile');
})->name('profile');

Route::get('/upload', function () {
    return view('upload');
})->name('upload');

Route::post('/upload', [UploadController::class, 'upload'])->name('upload.video');


Route::get('/logout-test', function () {
    session()->forget('token');
    return "LOGOUT OK";
});
