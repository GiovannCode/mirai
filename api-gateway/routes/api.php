<?php

use Illuminate\Support\Facades\Route;

// ==================== AUTH ====================

// Rutas específicas (más claras)
Route::post('/auth/login', function () {
    return app('gateway')->forward('auth', 'login');
});

Route::post('/auth/register', function () {
    return app('gateway')->forward('auth', 'register');
});

// Catch-all para lo demás
Route::any('/auth/{any}', function ($any) {
    return app('gateway')->forward('auth', $any);
})->where('any', '.*');


// ==================== USERS ====================

Route::any('/users/{any}', function ($any) {
    return app('gateway')->forward('users', $any);
})->where('any', '.*');


// ==================== CATALOG ====================

Route::any('/catalog/{any}', function ($any) {
    return app('gateway')->forward('catalog', $any);
})->where('any', '.*');


// ==================== UPLOAD ====================

Route::any('/upload/{any}', function ($any) {
    return app('gateway')->forward('upload', $any);
})->where('any', '.*');


// ==================== PLAYBACK ====================

Route::any('/playback/{any}', function ($any) {
    return app('gateway')->forward('playback', $any);
})->where('any', '.*');


// ==================== STREAMING ====================

Route::any('/streaming/{any}', function ($any) {
    return app('gateway')->forward('streaming', $any);
})->where('any', '.*');