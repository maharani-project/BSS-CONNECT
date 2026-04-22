<?php

// app/Http/Controllers/DashboardController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Method untuk Admin
    public function admin()
    {
        return view('admin.dashboard'); // Halaman Dashboard Admin
    }

    // Method untuk Panitia / LO
    public function panitia()
    {
        return view('panitia.dashboard'); // Halaman Dashboard Panitia
    }

    // Method untuk Mahasiswa
    public function mahasiswa()
    {
        return view('user.dashboard'); // Halaman Dashboard Mahasiswa
    }
}
