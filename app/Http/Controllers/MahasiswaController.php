<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Jadwal;
use App\Models\Pengumuman;
use App\Models\ActivityLog;

class MahasiswaController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | DASHBOARD
    |--------------------------------------------------------------------------
    */
    public function dashboard()
    {
        return view('mahasiswa.dashboard', [
            'user'              => auth()->user(),
            'totalJadwal'       => Jadwal::count(),
            'totalPengumuman'   => Pengumuman::count(),
            'jadwals'           => Jadwal::latest()->take(5)->get(),
            'pengumumans'       => Pengumuman::latest()->take(5)->get(),
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | JADWAL
    |--------------------------------------------------------------------------
    */
    public function jadwal()
    {
        $jadwals = Jadwal::latest()->get();

        return view('mahasiswa.jadwal.index', [
            'jadwals' => $jadwals,
            'user'    => auth()->user(),
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | PENGUMUMAN
    |--------------------------------------------------------------------------
    */
    public function pengumuman()
    {
        $pengumumans = Pengumuman::latest()->get();

        return view('mahasiswa.pengumuman.index', [
            'pengumumans' => $pengumumans,
            'user'        => auth()->user(),
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | REWARD
    |--------------------------------------------------------------------------
    */
    public function reward()
    {
        return view('mahasiswa.reward.index', [
            'user' => auth()->user(),
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | PROFILE
    |--------------------------------------------------------------------------
    */
    public function profile()
    {
        return view('mahasiswa.profile.index', [
            'user' => auth()->user(),
        ]);
    }

    public function editProfile()
    {
        return view('mahasiswa.profile.edit', [
            'user' => auth()->user(),
        ]);
    }

    public function updateProfile(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'name'  => 'required',
            'email' => 'required|email',
        ]);

        $user->update([
            'name'  => $request->name,
            'email' => $request->email,
        ]);

        ActivityLog::create([
            'user_id'     => auth()->id(),
            'title'       => 'Mengedit Profil',
            'description' => 'Mahasiswa mengubah profil',
            'type'        => 'profile',
        ]);

        return redirect()
            ->route('mahasiswa.profile')
            ->with('success', 'Profil berhasil diupdate');
    }

    /*
    |--------------------------------------------------------------------------
    | SECURITY
    |--------------------------------------------------------------------------
    */
    public function security()
    {
        return view('mahasiswa.profile.security', [
            'user' => auth()->user(),
        ]);
    }

    public function updateSecurity(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password'         => 'required|min:8|confirmed',
        ]);

        $user = auth()->user();

        if (!Hash::check($request->current_password, $user->password)) {

            return back()->withErrors([
                'current_password' => 'Password lama tidak sesuai'
            ]);
        }

        $user->update([
            'password' => Hash::make($request->password)
        ]);

        ActivityLog::create([
            'user_id'     => auth()->id(),
            'title'       => 'Mengubah Password',
            'description' => 'Mahasiswa mengubah password akun',
            'type'        => 'security',
        ]);

        return redirect()
            ->route('mahasiswa.security')
            ->with('success', 'Password berhasil diupdate');
    }

    /*
    |--------------------------------------------------------------------------
    | ACTIVITY
    |--------------------------------------------------------------------------
    */
    public function activity()
    {
        $user = auth()->user();

        $activities = ActivityLog::where('user_id', $user->id)
            ->latest()
            ->get();

        return view('mahasiswa.profile.activity', [
            'user'       => $user,
            'activities' => $activities,
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | SETTINGS
    |--------------------------------------------------------------------------
    */
    public function settings()
    {
        return view('mahasiswa.profile.settings', [
            'user' => auth()->user(),
        ]);
    }
}