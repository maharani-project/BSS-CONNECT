{{-- resources/views/admin/profile/index.blade.php --}}

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>BSS Connect - Profil Admin</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
          rel="stylesheet">

    <style>

        *{
            font-family:'Plus Jakarta Sans', sans-serif;
        }

        body{
            background:#f4f7fb;
        }

        .main-blue{
            background:linear-gradient(135deg,#17337a,#1f3f99);
        }

        .card-shadow{
            box-shadow:0 10px 25px rgba(0,0,0,0.06);
        }

        .mobile-card{
            border-radius:28px;
        }

        .profile-card{
            transition:.25s ease;
        }

        .profile-card:hover{
            transform:translateY(-4px);
            box-shadow:0 15px 35px rgba(0,0,0,0.10);
        }

        .menu-card{
            transition:.25s ease;
        }

        .menu-card:hover{
            transform:translateY(-4px);
        }

    </style>
</head>

<body>

<div class="flex min-h-screen">

    <!-- SIDEBAR -->
    <aside class="hidden lg:flex w-64 bg-[#10235d] text-white flex-col justify-between p-5">

        <div>

            <!-- LOGO -->
            <div class="flex items-center mb-10">

                <div class="w-11 h-11 rounded-2xl bg-blue-500 flex items-center justify-center mr-3">
                    <i class="fa-solid fa-bolt text-white"></i>
                </div>

                <h1 class="text-2xl font-extrabold">
                    BSS<span class="text-blue-400">CONNECT</span>
                </h1>

            </div>

            <!-- MENU -->
            <div class="space-y-2">

                <a href="{{ route('admin.dashboard') }}"
                   class="flex gap-4 px-4 py-3 rounded-2xl hover:bg-white/10 transition">

                    <i class="fa-solid fa-house"></i>

                    <span class="text-sm">
                        Dashboard
                    </span>

                </a>

                <a href="{{ route('admin.jadwal') }}"
                   class="flex gap-4 px-4 py-3 rounded-2xl hover:bg-white/10 transition">

                    <i class="fa-solid fa-calendar-days"></i>

                    <span class="text-sm">
                        Jadwal
                    </span>

                </a>

                <a href="{{ route('admin.pengumuman') }}"
                   class="flex gap-4 px-4 py-3 rounded-2xl hover:bg-white/10 transition">

                    <i class="fa-solid fa-bullhorn"></i>

                    <span class="text-sm">
                        Pengumuman
                    </span>

                </a>

                <a href="{{ route('admin.mahasiswa') }}"
                   class="flex gap-4 px-4 py-3 rounded-2xl hover:bg-white/10 transition">

                    <i class="fa-solid fa-users"></i>

                    <span class="text-sm">
                        Mahasiswa
                    </span>

                </a>

                <a href="{{ route('admin.lo') }}"
                   class="flex gap-4 px-4 py-3 rounded-2xl hover:bg-white/10 transition">

                    <i class="fa-solid fa-user-tie"></i>

                    <span class="text-sm">
                        LO
                    </span>

                </a>

                <a href="{{ route('admin.profile') }}"
                   class="flex gap-4 px-4 py-3 rounded-2xl bg-white/10">

                    <i class="fa-solid fa-user"></i>

                    <span class="text-sm">
                        Profil
                    </span>

                </a>

            </div>

        </div>

        <!-- PROFILE -->
        <div>

            <div class="bg-white/10 rounded-3xl p-3 flex items-center mb-4">

                <img src="https://api.dicebear.com/7.x/avataaars/svg?seed={{ $user->name }}"
                     class="w-12 h-12 rounded-xl bg-white p-1">

                <div class="ml-3">

                    <h3 class="font-bold text-sm">
                        {{ $user->name }}
                    </h3>

                    <p class="text-[11px] opacity-70">
                        SUPER ADMIN
                    </p>

                </div>

            </div>

            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
            </form>

            <button
                onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                class="w-full bg-red-500 rounded-2xl py-3 text-sm font-bold hover:bg-red-600 transition">

                Keluar Sistem

            </button>

        </div>

    </aside>

    <!-- MAIN -->
    <main class="flex-1 overflow-hidden">

        <!-- HEADER -->
        <div class="main-blue h-[260px] rounded-b-[35px] px-5 lg:px-10 pt-10 text-white">

            <p class="text-sm opacity-80 mb-2">
                Informasi Akun
            </p>

            <h1 class="text-3xl lg:text-4xl font-extrabold">
                Profil Admin
            </h1>

            <p class="tracking-[3px] text-[11px] mt-2 opacity-70 uppercase">
                Administrator Profile
            </p>

        </div>

        <!-- CONTENT -->
        <div class="px-4 lg:px-10 -mt-20 relative z-10">

            <div class="bg-white mobile-card card-shadow p-6 lg:p-8 max-w-6xl mx-auto">

                <!-- TOP PROFILE -->
                <div class="profile-card bg-gradient-to-r from-[#17337a] to-[#1f3f99] rounded-[30px] p-8 text-white mb-8">

                    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">

                        <div class="flex items-center gap-5">

                            <div class="w-28 h-28 rounded-full bg-white/20 p-2 backdrop-blur">

                                <img src="https://api.dicebear.com/7.x/avataaars/svg?seed={{ $user->name }}"
                                     class="w-full h-full rounded-full bg-white object-cover">

                            </div>

                            <div>

                                <h2 class="text-3xl font-extrabold">
                                    {{ $user->name }}
                                </h2>

                                <p class="mt-2 text-sm opacity-80">
                                    Super Administrator BSS Connect
                                </p>

                                <div class="flex items-center gap-2 mt-4">

                                    <span class="bg-white/20 px-4 py-2 rounded-2xl text-xs">
                                        <i class="fa-solid fa-user-shield mr-1"></i>
                                        Administrator
                                    </span>

                                    <span class="bg-green-400/20 text-green-100 px-4 py-2 rounded-2xl text-xs">
                                        <i class="fa-solid fa-circle-check mr-1"></i>
                                        Aktif
                                    </span>

                                </div>

                            </div>

                        </div>

                        <div class="flex gap-3">

                            <a href="{{ route('admin.profile.edit') }}"
                               class="bg-white text-[#17337a] px-5 py-3 rounded-2xl text-sm font-bold hover:scale-105 transition">

                                <i class="fa-solid fa-pen mr-2"></i>
                                Edit Profil

                            </a>

                        </div>

                    </div>

                </div>

                <!-- PROFILE DETAIL -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">

                    <!-- NAMA -->
                    <div class="profile-card bg-[#f8fafc] border border-gray-100 rounded-3xl p-5">

                        <div class="flex items-center gap-4">

                            <div class="w-14 h-14 rounded-2xl bg-blue-100 flex items-center justify-center">

                                <i class="fa-solid fa-user text-blue-600 text-xl"></i>

                            </div>

                            <div>

                                <p class="text-sm text-gray-500">
                                    Nama Lengkap
                                </p>

                                <h3 class="font-extrabold text-gray-800 text-lg mt-1">
                                    {{ $user->name }}
                                </h3>

                            </div>

                        </div>

                    </div>

                    <!-- EMAIL -->
                    <div class="profile-card bg-[#f8fafc] border border-gray-100 rounded-3xl p-5">

                        <div class="flex items-center gap-4">

                            <div class="w-14 h-14 rounded-2xl bg-purple-100 flex items-center justify-center">

                                <i class="fa-solid fa-envelope text-purple-600 text-xl"></i>

                            </div>

                            <div class="overflow-hidden">

                                <p class="text-sm text-gray-500">
                                    Email
                                </p>

                                <h3 class="font-extrabold text-gray-800 text-lg mt-1 break-all">
                                    {{ $user->email }}
                                </h3>

                            </div>

                        </div>

                    </div>

                    <!-- PASSWORD -->
                    <div class="profile-card bg-[#f8fafc] border border-gray-100 rounded-3xl p-5">

                        <div class="flex items-center gap-4">

                            <div class="w-14 h-14 rounded-2xl bg-red-100 flex items-center justify-center">

                                <i class="fa-solid fa-lock text-red-500 text-xl"></i>

                            </div>

                            <div>

                                <p class="text-sm text-gray-500">
                                    Password
                                </p>

                                <h3 class="font-extrabold text-gray-800 text-lg mt-1 tracking-[5px]">
                                    ••••••••••
                                </h3>

                            </div>

                        </div>

                    </div>

                    <!-- ROLE -->
                    <div class="profile-card bg-[#f8fafc] border border-gray-100 rounded-3xl p-5">

                        <div class="flex items-center gap-4">

                            <div class="w-14 h-14 rounded-2xl bg-green-100 flex items-center justify-center">

                                <i class="fa-solid fa-id-badge text-green-600 text-xl"></i>

                            </div>

                            <div>

                                <p class="text-sm text-gray-500">
                                    Role
                                </p>

                                <h3 class="font-extrabold text-gray-800 text-lg mt-1">
                                    Administrator
                                </h3>

                            </div>

                        </div>

                    </div>

                </div>

                <!-- KELOLA AKUN -->
                <div class="mt-10">

                    <div class="flex items-center justify-between mb-5">

                        <div>

                            <h2 class="text-2xl font-extrabold text-gray-800">
                                Kelola Akun
                            </h2>

                            <p class="text-sm text-gray-500 mt-1">
                                Pengaturan akun dan keamanan administrator
                            </p>

                        </div>

                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5">

                        <!-- EDIT AKUN -->
                        <a href="{{ route('admin.profile.edit') }}"
                           class="menu-card bg-[#f8fafc] border border-gray-100 rounded-3xl p-5 block">

                            <div class="w-14 h-14 rounded-2xl bg-blue-100 flex items-center justify-center mb-4">

                                <i class="fa-solid fa-user-pen text-blue-600 text-xl"></i>

                            </div>

                            <h3 class="font-extrabold text-gray-800 text-lg">
                                Edit Akun
                            </h3>

                            <p class="text-sm text-gray-500 mt-2">
                                Ubah informasi profil administrator
                            </p>

                        </a>

                        <!-- KEAMANAN -->
                        <a href="{{ route('admin.security') }}"
                           class="menu-card bg-[#f8fafc] border border-gray-100 rounded-3xl p-5 block">

                            <div class="w-14 h-14 rounded-2xl bg-red-100 flex items-center justify-center mb-4">

                                <i class="fa-solid fa-shield-halved text-red-500 text-xl"></i>

                            </div>

                            <h3 class="font-extrabold text-gray-800 text-lg">
                                Keamanan
                            </h3>

                            <p class="text-sm text-gray-500 mt-2">
                                Ganti password dan keamanan akun
                            </p>

                        </a>

                        <!-- PENGATURAN -->
                        <a href="{{ route('admin.settings') }}"
                           class="menu-card bg-[#f8fafc] border border-gray-100 rounded-3xl p-5 block">

                            <div class="w-14 h-14 rounded-2xl bg-green-100 flex items-center justify-center mb-4">

                                <i class="fa-solid fa-gear text-green-600 text-xl"></i>

                            </div>

                            <h3 class="font-extrabold text-gray-800 text-lg">
                                Pengaturan
                            </h3>

                            <p class="text-sm text-gray-500 mt-2">
                                Atur preferensi sistem dan tampilan
                            </p>

                        </a>

                        <!-- RIWAYAT -->
                        <a href="{{ route('admin.activity') }}"
                           class="menu-card bg-[#f8fafc] border border-gray-100 rounded-3xl p-5 block">

                            <div class="w-14 h-14 rounded-2xl bg-yellow-100 flex items-center justify-center mb-4">

                                <i class="fa-solid fa-clock-rotate-left text-yellow-600 text-xl"></i>

                            </div>

                            <h3 class="font-extrabold text-gray-800 text-lg">
                                Aktivitas
                            </h3>

                            <p class="text-sm text-gray-500 mt-2">
                                Lihat riwayat aktivitas administrator
                            </p>

                        </a>

                    </div>

                </div>

                <!-- ACTION -->
                <div class="mt-10 flex flex-col lg:flex-row gap-4 justify-center">

                    <a href="{{ route('admin.dashboard') }}"
                       class="bg-[#17337a] hover:bg-[#12285f] text-white px-6 py-3 rounded-2xl font-semibold text-sm text-center transition">

                        <i class="fa-solid fa-house mr-2"></i>
                        Kembali ke Dashboard

                    </a>

                    <button
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                        class="bg-red-500 hover:bg-red-600 text-white px-6 py-3 rounded-2xl font-semibold text-sm transition">

                        <i class="fa-solid fa-right-from-bracket mr-2"></i>
                        Logout

                    </button>

                </div>

            </div>

        </div>

    </main>

</div>

</body>
</html>