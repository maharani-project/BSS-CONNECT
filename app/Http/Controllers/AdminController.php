<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Jadwal;
use App\Models\Pengumuman;
use App\Models\ActivityLog;

class AdminController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | DASHBOARD
    |--------------------------------------------------------------------------
    */
    public function dashboard()
    {
        return view('admin.dashboard', [
            'totalUser'        => User::count(),
            'totalLO'          => User::where('role', 'lo')->count(),
            'totalMahasiswa'   => User::where('role', 'mahasiswa')->count(),
            'totalJadwal'      => Jadwal::count(),
            'totalPengumuman'  => Pengumuman::count(),
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

        return view('admin.jadwal.index', [
            'jadwals' => $jadwals,
            'user'    => auth()->user()
        ]);
    }

    public function createJadwal()
    {
        return view('admin.jadwal.create', [
            'user' => auth()->user()
        ]);
    }

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

        ActivityLog::create([
            'user_id'     => auth()->id(),
            'title'       => 'Menambahkan Jadwal',
            'description' => 'Admin menambahkan jadwal baru',
            'type'        => 'jadwal'
        ]);

        return redirect()->route('admin.jadwal')
            ->with('success', 'Jadwal berhasil ditambahkan');
    }

    public function editJadwal($id)
    {
        $jadwal = Jadwal::findOrFail($id);

        return view('admin.jadwal.edit', [
            'jadwal' => $jadwal,
            'user'   => auth()->user()
        ]);
    }

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

        ActivityLog::create([
            'user_id'     => auth()->id(),
            'title'       => 'Mengedit Jadwal',
            'description' => 'Admin mengubah jadwal',
            'type'        => 'jadwal'
        ]);

        return redirect()->route('admin.jadwal')
            ->with('success', 'Jadwal berhasil diupdate');
    }

    public function deleteJadwal($id)
    {
        Jadwal::findOrFail($id)->delete();

        ActivityLog::create([
            'user_id'     => auth()->id(),
            'title'       => 'Menghapus Jadwal',
            'description' => 'Admin menghapus jadwal',
            'type'        => 'jadwal'
        ]);

        return back()->with('success', 'Jadwal berhasil dihapus');
    }

    /*
    |--------------------------------------------------------------------------
    | PENGUMUMAN
    |--------------------------------------------------------------------------
    */
    public function pengumuman()
    {
        $pengumumans = Pengumuman::latest()->get();

        return view('admin.pengumuman.index', [
            'pengumumans' => $pengumumans,
            'user'        => auth()->user()
        ]);
    }

    public function createPengumuman()
    {
        return view('admin.pengumuman.create', [
            'user' => auth()->user()
        ]);
    }

    public function storePengumuman(Request $request)
    {
        $request->validate([
            'judul'      => 'required',
            'deadline'   => 'required',
            'link_tugas' => 'required|url',
        ]);

        Pengumuman::create($request->all());

        ActivityLog::create([
            'user_id'     => auth()->id(),
            'title'       => 'Menambahkan Pengumuman',
            'description' => 'Admin membuat pengumuman baru',
            'type'        => 'pengumuman'
        ]);

        return redirect()->route('admin.pengumuman')
            ->with('success', 'Pengumuman berhasil ditambahkan');
    }

    public function editPengumuman($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);

        return view('admin.pengumuman.edit', [
            'pengumuman' => $pengumuman,
            'user'       => auth()->user()
        ]);
    }

    public function updatePengumuman(Request $request, $id)
    {
        $pengumuman = Pengumuman::findOrFail($id);

        $request->validate([
            'judul'      => 'required',
            'deadline'   => 'required',
            'link_tugas' => 'required|url',
        ]);

        $pengumuman->update($request->all());

        ActivityLog::create([
            'user_id'     => auth()->id(),
            'title'       => 'Mengedit Pengumuman',
            'description' => 'Admin mengubah pengumuman',
            'type'        => 'pengumuman'
        ]);

        return redirect()->route('admin.pengumuman')
            ->with('success', 'Pengumuman berhasil diupdate');
    }

    public function deletePengumuman($id)
    {
        Pengumuman::findOrFail($id)->delete();

        ActivityLog::create([
            'user_id'     => auth()->id(),
            'title'       => 'Menghapus Pengumuman',
            'description' => 'Admin menghapus pengumuman',
            'type'        => 'pengumuman'
        ]);

        return back()->with('success', 'Pengumuman berhasil dihapus');
    }

    /*
    |--------------------------------------------------------------------------
    | LO (MONITORING)
    |--------------------------------------------------------------------------
    */
    public function lo()
    {
        $los = User::where('role', 'lo')
            ->latest()
            ->paginate(10);

        return view('admin.lo.index', [
            'los'  => $los,
            'user' => auth()->user()
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | MAHASISWA
    |--------------------------------------------------------------------------
    */
    public function mahasiswa()
    {
        $mahasiswas = User::where('role', 'mahasiswa')
            ->latest()
            ->paginate(10);

        return view('admin.mahasiswa.index', [
            'mahasiswas' => $mahasiswas,
            'user'       => auth()->user()
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | PROFILE
    |--------------------------------------------------------------------------
    */
    public function profile()
    {
        return view('admin.profile.index', [
            'user' => auth()->user()
        ]);
    }

    public function editProfile()
    {
        return view('admin.profile.edit', [
            'user' => auth()->user()
        ]);
    }

    public function updateProfile(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'name'  => 'required',
            'email' => 'required|email'
        ]);

        $user->update($request->only('name', 'email'));

        ActivityLog::create([
            'user_id'     => auth()->id(),
            'title'       => 'Mengedit Profile',
            'description' => 'Admin mengubah profile',
            'type'        => 'profile'
        ]);

        return redirect()->route('admin.profile')
            ->with('success', 'Profile berhasil diupdate');
    }

    public function security()
    {
        return view('admin.profile.security', [
            'user' => auth()->user()
        ]);
    }

    public function activity()
    {
        $user = auth()->user();

        $activities = ActivityLog::where('user_id', $user->id)
            ->latest()
            ->get();

        return view('admin.profile.activity', compact('user', 'activities'));
    }

    public function settings()
    {
        return view('admin.profile.settings', [
            'user' => auth()->user()
        ]);
    }
}