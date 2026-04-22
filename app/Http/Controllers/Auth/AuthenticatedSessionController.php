<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt([
            'email' => strtolower($credentials['email']),
            'password' => $credentials['password'],
        ])) {

            $request->session()->regenerate();

            $user = Auth::user();

            // 🔥 REDIRECT BERDASARKAN ROLE
            return match ($user->role) {
    'admin' => redirect()->route('admin.dashboard'),
    'panitia' => redirect()->route('lo.dashboard'),
    'mahasiswa' => redirect()->route('mahasiswa.dashboard'),
};
        }

        return back()->withErrors([
            'email' => 'Email atau password salah',
        ]);
    }

    public function destroy(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}