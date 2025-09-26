<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Customer\DashboardController;
use App\Http\Controllers\Customer\HomeController;
use App\Http\Controllers\Panel\DurationController;
use App\Http\Controllers\Panel\RequestController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;


//Home
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/document', [HomeController::class, 'document'])->name('home.document.index');


//User Dashboard
Route::prefix('/user/dashboard')->group(function () {
    Route::get('/{id}', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/user/dashboard/analysis/{linkId}/{id}', [DashboardController::class, 'analysis'])->name('dashboard.analysis.link.index');

    Route::post('/store', [DashboardController::class, 'store'])->name('dashboard.request.store');
Route::delete('/analysis/delete/{linkId}/{id}', [DashboardController::class, 'delete'])->name('dashboard.request.delete');

});




Route::get('/testss', [RequestController::class, 'storeTestJob'])->name('panel.request.index');
Route::get('/test-job', [RequestController::class, 'testJob'])->name('panel.request.index');




//user

Route::get('/register', [AuthController::class, 'showRegister'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::get('/verify-email/{token}', [AuthController::class, 'verifyEmail'])->name('verify.email');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout.post');




Route::get('login/github', function () {

    return Socialite::driver('github')->redirect();
});


//gmail

Route::get('/auth/google', function () {
    return Socialite::driver('google')->redirect();
});


Route::get('/auth/google/callback', [AuthController::class, 'gmailCallBack'])->name('login.callBack.gmail');


//github

Route::get('login/github/callback', [AuthController::class, 'githubCallBack'])->name('login.callBack.github');


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
