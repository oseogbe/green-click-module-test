<?php

use Illuminate\Support\Facades\Route;
use Modules\User\UserController;

Route::prefix('users')->name('users.')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('all');
    Route::post('/disable/{userId}', [UserController::class, 'disable'])->name('disable');
    Route::post('/enable/{userId}', [UserController::class, 'enable'])->name('enable');
});
