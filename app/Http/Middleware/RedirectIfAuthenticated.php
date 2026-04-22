<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next, ...$guards)
{
    foreach ($guards as $guard) {
        if (Auth::guard($guard)->check()) {

            $user = Auth::user();

            if ($user->role === 'admin') {
                return redirect('/admin/dashboard');
            }

            if ($user->role === 'panitia') {
                return redirect('/lo/dashboard');
            }

            if ($user->role === 'mahasiswa') {
                return redirect('/mahasiswa/dashboard');
            }

            return redirect('/');
        }
    }

    return $next($request);
}
}