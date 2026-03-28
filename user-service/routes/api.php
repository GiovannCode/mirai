<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Route::prefix('profiles')->group(function () {
    Route::post('/', [ProfileController::class, 'store']);
    Route::get('/{auth_user_id}', [ProfileController::class, 'show']);
    Route::put('/{auth_user_id}', [ProfileController::class, 'update']);
    Route::delete('/{auth_user_id}', [ProfileController::class, 'destroy']);
});