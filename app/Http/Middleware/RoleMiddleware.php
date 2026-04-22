<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle incoming request
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // 🔐 wajib login dulu
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();

        // 🔐 kalau tidak ada role yang cocok
        if (!in_array($user->role, $roles)) {
            abort(403, 'AKSES DITOLAK!');
        }

        return $next($request);
    }
}