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

Route::get('login/github', function () {
    
    return Socialite::driver('github')->redirect();
});


//gmail

Route::get('/auth/google', function () {
    return Socialite::driver('google')->redirect();
});

Route::get('/auth/google/callback', function () {
    $googleUser = Socialite::driver('google')->stateless()->user();

    // اول سعی کن با google_id پیداش کنیم
    $user = User::where('google_id', $googleUser->getId())->first();

    // اگر نبود، با ایمیل چک کن (ممکنه قبلا ایمیل ثبت شده باشه)
    if (!$user) {
        $user = User::where('email', $googleUser->getEmail())->first();

        if ($user) {
            // اگر کاربر با همون ایمیل وجود داشت، google_id رو اضافه کن
            $user->update([
                'google_id' => $googleUser->getId(),
            ]);
        } else {
            // کاربر جدید، ثبت‌نام کن
            $user = User::create([
                'name' => $googleUser->getName(),
                'email' => $googleUser->getEmail(),
                'google_id' => $googleUser->getId(),
                'password' => bcrypt(Str::random(16)), // رمز تصادفی
            ]);
        }
    }

    Auth::login($user);

    return redirect('/'); // به مسیر دلخواهت تغییرش بده
});



//github
Route::get('login/github/callback', function () {
    
   try {
        $githubUser = Socialite::driver('github')->user();
    } catch (\Laravel\Socialite\Two\InvalidStateException $e) {
        return redirect('/login/github')->with('error', 'مشکلی در ورود با گیت‌هاب پیش آمد. لطفاً دوباره تلاش کنید.');
    }
    // بررسی کاربر در دیتابیس
    $user = User::where('github_id', $githubUser->id)->first();

    if (!$user) {
        // اگر کاربر وجود ندارد، ایجاد کن
        $user = User::create([
            'name' => $githubUser->name ?? $githubUser->nickname,
            'email' => $githubUser->email,
            'github_id' => $githubUser->id,
            // اگر نیاز داری، فیلدهای دیگر رو پر کن
            'password' => bcrypt(Str::random(24)), // رمز تصادفی چون ورود با GitHub است
        ]);
    }

    // ورود کاربر
    Auth::login($user, true);

    return redirect('/'); // یا هر جایی که می‌خوای بعد ورود بری
});






//Home
Route::get('/', [HomeController::class, 'index'])->name('home.index');


//User Dashboard
Route::prefix('/user/dashboard')->group(function () {
Route::get('/{id}', [DashboardController::class, 'index'])->name('dashboard.index');

  Route::post('/store', [DashboardController::class, 'store'])->name('dashboard.request.store');
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
