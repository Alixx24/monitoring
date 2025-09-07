<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Customer\HomeController;
use App\Http\Controllers\Panel\DurationController;
use App\Http\Controllers\Panel\RequestController;
use Illuminate\Support\Facades\Route;


//Home
Route::get('/', [HomeController::class, 'index'])->name('home.index');








Route::get('/testss', [RequestController::class, 'storeTestJob'])->name('panel.request.index');
Route::get('/test-job', [RequestController::class, 'testJob'])->name('panel.request.index');




//user

Route::get('/register', [AuthController::class, 'showRegister'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::get('/verify-email/{token}', [AuthController::class, 'verifyEmail'])->name('verify.email');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');


//panel

Route::prefix('/panel/requests')->group(function () {
    Route::get('/', [RequestController::class, 'index'])->name('panel.request.index');
    Route::get('/create', [RequestController::class, 'create'])->name('panel.request.create');
    Route::get('/edit/{id}', [RequestController::class, 'edit'])->name('panel.request.edit');
    Route::put('/update/{id}', [RequestController::class, 'update'])->name('panel.request.update');

    Route::post('/store', [RequestController::class, 'store'])->name('panel.request.store');
    Route::post('/delete/{id}', [RequestController::class, 'delete'])->name('panel.request.delete');
});

Route::prefix('/panel/duration')->group(function () {
    Route::get('/', [DurationController::class, 'index'])->name('panel.duration.index');
    Route::get('/create', [DurationController::class, 'create'])->name('panel.duration.create');
    Route::get('/edit/{id}', [RequestController::class, 'edit'])->name('panel.request.edit');
    Route::put('/update/{id}', [RequestController::class, 'update'])->name('panel.request.update');

    Route::post('/store', [DurationController::class, 'store'])->name('panel.duration.store');
    Route::post('/delete/{id}', [DurationController::class, 'delete'])->name('panel.duration.delete');
});
