<?php

use Illuminate\Support\Facades\Route;

// AUTH
Route::any('/auth/{any}', function ($any) {
    return app('gateway')->forward('auth', $any);
})->where('any', '.*');

// USERS
Route::any('/users/{any}', function ($any) {
    return app('gateway')->forward('users', $any);
})->where('any', '.*');

// CATALOG
Route::any('/catalog/{any}', function ($any) {
    return app('gateway')->forward('catalog', $any);
})->where('any', '.*');

// PLAYBACK tal vez no se desarrolle xd
Route::any('/playback/{any}', function ($any) {
    return app('gateway')->forward('playback', $any);
})->where('any', '.*');

// STREAMING
Route::any('/streaming/{any}', function ($any) {
    return app('gateway')->forward('streaming', $any);
})->where('any', '.*');