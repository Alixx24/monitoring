<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check()) {
            return redirect()->route('home.index')->with('error', 'لطفاً ابتدا وارد شوید');
        }

        if (auth()->user()->user_status != 1) {
            return redirect()->route('home.index')->with('error', 'شما دسترسی ادمین ندارید');
        }
        return $next($request);
    }
}



