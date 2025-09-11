<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
}
