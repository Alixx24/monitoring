<?php

use App\Http\Controllers\Panel\RequestController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/panel/requests')->group(function () {
    Route::get('/', [RequestController::class, 'index'])->name('panel.request.index');
        Route::get('/create', [RequestController::class, 'create'])->name('panel.request.create');
        Route::post('/store', [RequestController::class, 'store'])->name('panel.request.store');

});
