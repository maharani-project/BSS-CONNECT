<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\Pengumuman;
use App\Models\ActivityLog;

class LOController extends Controller
{
    /**
     * Dashboard LO
     */
    public function dashboard()
    {
        return view('lo.dashboard');
    }

    /**
     * Profil LO
     */
    public function profile()
    {
        $user = auth()->user();

        return view('lo.profile.index', compact('user'));
    }

    /*
    |--------------------------------------------------------------------------
    | JADWAL
    |--------------------------------------------------------------------------
    */

    // INDEX
    public function jadwal()
    {
        $jadwals = Jadwal::latest()->get();

        return view('lo.jadwal.index', compact('jadwals'));
    }

    // CREATE
    public function createJadwal()
    {
        return view('lo.jadwal.create');
    }

    // STORE
    public function storeJadwal(Request $request)
    {
        $request->validate([
            'nama_acara' => 'required',
            'tanggal'    => 'required',
            'waktu'      => 'required',
            'lokasi'     => 'required',
            'deskripsi'  => 'required',
        ]);

        Jadwal::create($request->all());

        /**
         * AUTO LOG AKTIVITAS
         */
        ActivityLog::create([
            'user_id'     => auth()->id(),
            'title'       => 'Menambahkan Jadwal',
            'description' => 'LO menambahkan jadwal baru ke sistem',
            'type'        => 'jadwal'
        ]);

        return redirect()->route('lo.jadwal.index')
            ->with('success', 'Jadwal berhasil ditambahkan');
    }

    // EDIT
    public function editJadwal($id)
    {
        $jadwal = Jadwal::findOrFail($id);

        return view('lo.jadwal.edit', compact('jadwal'));
    }

    // UPDATE
    public function updateJadwal(Request $request, $id)
    {
        $jadwal = Jadwal::findOrFail($id);

        $request->validate([
            'nama_acara' => 'required',
            'tanggal'    => 'required',
            'waktu'      => 'required',
            'lokasi'     => 'required',
            'deskripsi'  => 'required',
        ]);

        $jadwal->update($request->all());

        /**
         * AUTO LOG AKTIVITAS
         */
        ActivityLog::create([
            'user_id'     => auth()->id(),
            'title'       => 'Mengedit Jadwal',
            'description' => 'LO mengubah data jadwal',
            'type'        => 'jadwal'
        ]);

        return redirect()->route('lo.jadwal.index')
            ->with('success', 'Jadwal berhasil diupdate');
    }

    // DELETE
    public function destroyJadwal($id)
    {
        $jadwal = Jadwal::findOrFail($id);

        $jadwal->delete();

        /**
         * AUTO LOG AKTIVITAS
         */
        ActivityLog::create([
            'user_id'     => auth()->id(),
            'title'       => 'Menghapus Jadwal',
            'description' => 'LO menghapus jadwal dari sistem',
            'type'        => 'jadwal'
        ]);

        return redirect()->route('lo.jadwal.index')
            ->with('success', 'Jadwal berhasil dihapus');
    }

    /*
    |--------------------------------------------------------------------------
    | PENGUMUMAN
    |--------------------------------------------------------------------------
    */

    // INDEX
    public function pengumuman()
    {
        $pengumumans = Pengumuman::latest()->get();

        return view('lo.pengumuman.index', compact('pengumumans'));
    }

    // CREATE
    public function createPengumuman()
    {
        return view('lo.pengumuman.create');
    }

    // STORE
    public function storePengumuman(Request $request)
    {
        $request->validate([
            'judul'       => 'required',
            'deadline'    => 'required',
            'link_tugas'  => 'required|url',
        ]);

        Pengumuman::create([
            'judul'      => $request->judul,
            'deadline'   => $request->deadline,
            'link_tugas' => $request->link_tugas,
        ]);

        /**
         * AUTO LOG AKTIVITAS
         */
        ActivityLog::create([
            'user_id'     => auth()->id(),
            'title'       => 'Menambahkan Pengumuman',
            'description' => 'LO membuat pengumuman baru',
            'type'        => 'pengumuman'
        ]);

        return redirect()->route('lo.pengumuman.index')
            ->with('success', 'Pengumuman berhasil ditambahkan');
    }

    // EDIT
    public function editPengumuman($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);

        return view('lo.pengumuman.edit', compact('pengumuman'));
    }

    // UPDATE
    public function updatePengumuman(Request $request, $id)
    {
        $pengumuman = Pengumuman::findOrFail($id);

        $request->validate([
            'judul'       => 'required',
            'deadline'    => 'required',
            'link_tugas'  => 'required|url',
        ]);

        $pengumuman->update([
            'judul'      => $request->judul,
            'deadline'   => $request->deadline,
            'link_tugas' => $request->link_tugas,
        ]);

        /**
         * AUTO LOG AKTIVITAS
         */
        ActivityLog::create([
            'user_id'     => auth()->id(),
            'title'       => 'Mengedit Pengumuman',
            'description' => 'LO mengubah isi pengumuman',
            'type'        => 'pengumuman'
        ]);

        return redirect()->route('lo.pengumuman.index')
            ->with('success', 'Pengumuman berhasil diupdate');
    }

    // DELETE
    public function destroyPengumuman($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);

        $pengumuman->delete();

        /**
         * AUTO LOG AKTIVITAS
         */
        ActivityLog::create([
            'user_id'     => auth()->id(),
            'title'       => 'Menghapus Pengumuman',
            'description' => 'LO menghapus pengumuman',
            'type'        => 'pengumuman'
        ]);

        return redirect()->route('lo.pengumuman.index')
            ->with('success', 'Pengumuman berhasil dihapus');
    }

    /**
     * Edit Akun
     */
    public function editAccount()
    {
        $user = auth()->user();

        return view('lo.profile.edit', compact('user'));
    }

    /**
     * Update Profil
     */
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

        /**
         * AUTO LOG AKTIVITAS
         */
        ActivityLog::create([
            'user_id'     => auth()->id(),
            'title'       => 'Mengedit Profil',
            'description' => 'LO memperbarui informasi akun',
            'type'        => 'profile'
        ]);

        return redirect()->route('lo.profile')
            ->with('success', 'Profil berhasil diperbarui');
    }

    /**
     * Keamanan
     */
    public function security()
    {
        $user = auth()->user();

        return view('lo.profile.security', compact('user'));
    }

    /**
     * Update Password
     */
    public function updatePassword(Request $request)
    {
        $request->validate([
            'password_lama' => 'required',
            'password_baru' => 'required|min:8|confirmed',
        ]);

        $user = auth()->user();

        // UPDATE PASSWORD
        $user->update([
            'password' => bcrypt($request->password_baru)
        ]);

        /**
         * AUTO LOG AKTIVITAS
         */
        ActivityLog::create([
            'user_id'     => auth()->id(),
            'title'       => 'Mengubah Password',
            'description' => 'LO mengganti password akun',
            'type'        => 'security'
        ]);

        return redirect()->route('lo.profile.security')
            ->with('success', 'Password berhasil diubah');
    }

    /**
     * Pengaturan
     */
    public function settings()
    {
        $user = auth()->user();

        return view('lo.profile.settings', compact('user'));
    }

    /**
     * Aktivitas
     */
    public function activity()
    {
        $user = auth()->user();

        $activities = ActivityLog::where('user_id', $user->id)
                        ->latest()
                        ->get();

        return view('lo.profile.activity', compact(
            'user',
            'activities'
        ));
    }
}