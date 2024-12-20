<?php

use Illuminate\Support\Facades\Route;
use Modules\Demo\DemoController;

Route::prefix('demo')->name('demo.')->group(function () {
    Route::get('/', [DemoController::class, 'index'])->name('index');
});
