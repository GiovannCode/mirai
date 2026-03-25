<?php

use App\Http\Controllers\Api\MovieController;
use Illuminate\Support\Facades\Route;

Route::prefix('catalog')->group(function (): void {
    Route::get('movies', [MovieController::class, 'index']);
    Route::get('movies/{id}', [MovieController::class, 'show'])->whereNumber('id');
});
