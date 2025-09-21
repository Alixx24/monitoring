<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function showRegister() {}


    public function register(RegisterRequest $reqValid)
    {
        $user = $this->createUser($reqValid);
        // Mail::to($user->email)->send(new VerificationMail($user));
        return redirect()->back()->with('success', 'ثبت نام موفق بود لطفا ایمیل خود را تایید کنید');
    }



    public function createUser(RegisterRequest $reqValid)
    {
        $validated = $reqValid->validated();

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'email_verified_at' => null,
            'remember_token' => Str::random(60),
            'verification_token' => Str::random(60),
        ]);

        return $user;
    }







    public function showLogin() {}

    public function login(Request $request)
    {

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'کاربری با این ایمیل پیدا نشد']);
        }

        // if (!$user->email_verified_at) {
        //     return back()->withErrors(['email' => 'ایمیل شما تایید نشده است']);
        // }

        if (Auth::attempt($credentials, $request->boolean('remember', false))) {
            $request->session()->regenerate();
            // return redirect()->intended('dashboard');
        }

        return back()->withErrors(['email' => 'اطلاعات ورود اشتباه است.']);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function verifyEmail($token)
    {
        // $user = User::where('verification_token', $token)->first();

        // if (!$user) {
        //     return redirect('/login')->withErrors('توکن تایید ایمیل معتبر نیست.');
        // }

        // $user->email_verified_at = now();
        // $user->verification_token = null;
        // $user->save();

        // return redirect('/login')->with('success', 'ایمیل شما با موفقیت تایید شد.');
    }






    public function gmailCallBack()
    {
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
    }

    public function githubCallBack()
    {
            
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
    }
}
