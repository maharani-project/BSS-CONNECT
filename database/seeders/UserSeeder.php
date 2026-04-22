<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;  // Pastikan import model User

class UserSeeder extends Seeder
{
    public function run()
    {
        // Menambahkan pengguna admin
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@bssconnect.com',
            'password' => bcrypt('password123'),
            'role' => 'admin'
        ]);

        // Menambahkan pengguna panitia
        User::create([
            'name' => 'Panitia User',
            'email' => 'panitia@bssconnect.com',
            'password' => bcrypt('password123'),
            'role' => 'panitia'
        ]);

        // Menambahkan pengguna mahasiswa
        User::create([
            'name' => 'Mahasiswa User',
            'email' => 'mahasiswa@bssconnect.com',
            'password' => bcrypt('password123'),
            'role' => 'mahasiswa'
        ]);
    }
}