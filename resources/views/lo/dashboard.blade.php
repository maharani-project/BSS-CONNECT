<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>BSS Connect - LO Dashboard</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
          rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>

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
            box-shadow:0 10px 30px rgba(0,0,0,0.06);
        }

        .mobile-card{
            border-radius:32px;
        }

        .dashboard-card{
            transition:.25s ease;
        }

        .dashboard-card:hover{
            transform:translateY(-4px);
            box-shadow:0 15px 35px rgba(0,0,0,0.08);
        }

        .activity-card{
            transition:.25s ease;
        }

        .activity-card:hover{
            transform:translateY(-3px);
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

                <a href="{{ route('lo.dashboard') }}"
                   class="flex items-center gap-4 px-4 py-3 rounded-2xl bg-white/10">

                    <i class="fa-solid fa-house"></i>

                    <span class="text-sm">
                        Dashboard
                    </span>

                </a>

                <a href="{{ route('lo.jadwal.index') }}"
                   class="flex items-center gap-4 px-4 py-3 rounded-2xl hover:bg-white/10 transition">

                    <i class="fa-solid fa-calendar-days"></i>

                    <span class="text-sm">
                        Kelola Jadwal
                    </span>

                </a>

                <a href="{{ route('lo.pengumuman.index') }}"
                   class="flex items-center gap-4 px-4 py-3 rounded-2xl hover:bg-white/10 transition">

                    <i class="fa-solid fa-bullhorn"></i>

                    <span class="text-sm">
                        Pengumuman
                    </span>

                </a>

                <a href="{{ route('lo.profile') }}"
                   class="flex items-center gap-4 px-4 py-3 rounded-2xl hover:bg-white/10 transition">

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

                <img src="https://api.dicebear.com/7.x/avataaars/svg?seed={{ Auth::user()->name }}"
                     class="w-12 h-12 rounded-xl bg-white p-1">

                <div class="ml-3">

                    <h3 class="font-bold text-sm">
                        {{ Auth::user()->name }}
                    </h3>

                    <p class="text-[11px] opacity-70">
                        LO MERKURIUS
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
        <div class="main-blue h-[320px] rounded-b-[40px] px-5 lg:px-10 pt-10 relative overflow-hidden">

            <!-- DECORATION -->
            <div class="absolute top-0 right-0 w-72 h-72 bg-white/5 rounded-full -mr-24 -mt-24"></div>
            <div class="absolute bottom-0 right-32 w-40 h-40 bg-white/5 rounded-full"></div>

            <div class="relative z-10 flex flex-col lg:flex-row lg:items-center lg:justify-between">

                <div class="text-white">

                    <p class="text-sm opacity-80 mb-2">
                        Pusat Informasi
                    </p>

                    <h1 class="text-4xl lg:text-5xl font-extrabold leading-tight">
                        Dashboard LO
                    </h1>

                    <p class="tracking-[3px] text-[11px] mt-3 opacity-70 uppercase">
                        Liaison Officer Panel
                    </p>

                    <div class="flex gap-3 mt-6 flex-wrap">

                        <span class="bg-white/15 backdrop-blur px-4 py-2 rounded-2xl text-xs">
                            <i class="fa-solid fa-calendar-check mr-2"></i>
                            Jadwal Aktif
                        </span>

                        <span class="bg-green-400/20 text-green-100 px-4 py-2 rounded-2xl text-xs">
                            <i class="fa-solid fa-circle-check mr-2"></i>
                            Sistem Online
                        </span>

                    </div>

                </div>

                <!-- PROFILE MINI -->
                <div class="mt-8 lg:mt-0 bg-white/10 backdrop-blur rounded-[30px] p-5 text-white w-full lg:w-[320px]">

                    <div class="flex items-center gap-4">

                        <img src="https://api.dicebear.com/7.x/avataaars/svg?seed={{ Auth::user()->name }}"
                             class="w-16 h-16 rounded-2xl bg-white p-2">

                        <div>

                            <h3 class="font-extrabold text-lg">
                                {{ Auth::user()->name }}
                            </h3>

                            <p class="text-sm opacity-80">
                                Liaison Officer
                            </p>

                        </div>

                    </div>

                    <div class="grid grid-cols-2 gap-3 mt-5">

                        <div class="bg-white/10 rounded-2xl p-3">
                            <p class="text-xs opacity-70">
                                Jadwal Hari Ini
                            </p>
                            <h4 class="text-2xl font-extrabold mt-1">
                                04
                            </h4>
                        </div>

                        <div class="bg-white/10 rounded-2xl p-3">
                            <p class="text-xs opacity-70">
                                Pengumuman
                            </p>
                            <h4 class="text-2xl font-extrabold mt-1">
                                12
                            </h4>
                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- CONTENT -->
        <div class="px-4 lg:px-10 -mt-20 relative z-10 pb-10">

            <div class="bg-white mobile-card card-shadow p-6 lg:p-8">

                <!-- TITLE -->
                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 mb-8">

                    <div>

                        <h2 class="text-2xl font-extrabold text-gray-800">
                            Ringkasan Dashboard
                        </h2>

                        <p class="text-gray-500 text-sm mt-1">
                            Kelola agenda dan aktivitas BSS Connect dengan lebih mudah
                        </p>

                    </div>

                    <div class="flex gap-3">

                        <a href="{{ route('lo.jadwal.index') }}"
                           class="bg-[#17337a] hover:bg-[#12285f] text-white px-5 py-3 rounded-2xl text-sm font-semibold transition">

                            <i class="fa-solid fa-calendar-plus mr-2"></i>
                            Lihat Jadwal

                        </a>

                    </div>

                </div>

                <!-- STATISTIC -->
                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-5">

                    <!-- USER -->
                    <div class="dashboard-card bg-gradient-to-br from-[#cbb6f6] to-[#e8ddff] rounded-3xl p-5">

                        <div class="flex items-center justify-between">

                            <div>

                                <p class="text-sm text-gray-700">
                                    Jumlah User
                                </p>

                                <h3 class="text-4xl font-extrabold mt-3 text-gray-800">
                                    230
                                </h3>

                            </div>

                            <div class="w-14 h-14 rounded-2xl bg-[#b995ef] flex items-center justify-center text-xl">
                                <i class="fa-solid fa-user-graduate"></i>
                            </div>

                        </div>

                    </div>

                    <!-- LO -->
                    <div class="dashboard-card bg-gradient-to-br from-[#dfe4ff] to-[#f0f3ff] rounded-3xl p-5">

                        <div class="flex items-center justify-between">

                            <div>

                                <p class="text-sm text-gray-700">
                                    Jumlah LO
                                </p>

                                <h3 class="text-4xl font-extrabold mt-3 text-gray-800">
                                    10
                                </h3>

                            </div>

                            <div class="w-14 h-14 rounded-2xl bg-[#bfc2d8] flex items-center justify-center text-xl">
                                <i class="fa-solid fa-users"></i>
                            </div>

                        </div>

                    </div>

                    <!-- JADWAL -->
                    <a href="{{ route('lo.jadwal.index') }}"
                       class="dashboard-card bg-gradient-to-br from-[#e4e4e4] to-[#f5f5f5] rounded-3xl p-5 block">

                        <div class="flex items-center justify-between">

                            <div>

                                <p class="text-sm text-gray-700">
                                    Kelola Jadwal
                                </p>

                                <h3 class="text-xl font-extrabold mt-3 text-gray-800">
                                    Lihat Agenda
                                </h3>

                            </div>

                            <div class="w-14 h-14 rounded-2xl bg-[#c8c8c8] flex items-center justify-center text-xl">
                                <i class="fa-solid fa-calendar-days"></i>
                            </div>

                        </div>

                    </a>

                    <!-- PENGUMUMAN -->
                    <a href="{{ route('lo.pengumuman.index') }}"
                       class="dashboard-card bg-gradient-to-br from-[#f7e4d8] to-[#fff4ee] rounded-3xl p-5 block">

                        <div class="flex items-center justify-between">

                            <div>

                                <p class="text-sm text-gray-700">
                                    Pengumuman
                                </p>

                                <h3 class="text-xl font-extrabold mt-3 text-gray-800">
                                    Kelola Info
                                </h3>

                            </div>

                            <div class="w-14 h-14 rounded-2xl bg-[#e6c8b6] flex items-center justify-center text-xl">
                                <i class="fa-solid fa-bullhorn"></i>
                            </div>

                        </div>

                    </a>

                </div>

                <!-- RINGKASAN AKTIVITAS -->
                <div class="mt-10">

                    <div class="flex items-center justify-between mb-6">

                        <div>

                            <h2 class="text-2xl font-extrabold text-gray-800">
                                Ringkasan Aktivitas
                            </h2>

                            <p class="text-gray-500 text-sm mt-1">
                                Aktivitas terbaru pada sistem BSS Connect
                            </p>

                        </div>

                    </div>

                    <div class="grid grid-cols-1 xl:grid-cols-2 gap-5">

                        <!-- JADWAL -->
                        <div class="activity-card bg-[#f8fafc] border border-gray-100 rounded-3xl p-6">

                            <div class="flex items-start gap-4">

                                <div class="w-14 h-14 rounded-2xl bg-blue-100 flex items-center justify-center text-blue-600 text-xl">
                                    <i class="fa-solid fa-calendar-check"></i>
                                </div>

                                <div class="flex-1">

                                    <div class="flex items-center justify-between">

                                        <h3 class="font-extrabold text-gray-800 text-lg">
                                            Jadwal Meeting
                                        </h3>

                                        <span class="text-xs bg-blue-100 text-blue-700 px-3 py-1 rounded-full">
                                            Hari Ini
                                        </span>

                                    </div>

                                    <p class="text-sm text-gray-500 mt-2">
                                        Meeting koordinasi LO bersama tim pusat pukul 13:00 WIB.
                                    </p>

                                    <div class="mt-4 flex items-center text-xs text-gray-400 gap-2">
                                        <i class="fa-solid fa-clock"></i>
                                        2 jam yang lalu
                                    </div>

                                </div>

                            </div>

                        </div>

                        <!-- PENGUMUMAN -->
                        <div class="activity-card bg-[#fff8f3] border border-orange-100 rounded-3xl p-6">

                            <div class="flex items-start gap-4">

                                <div class="w-14 h-14 rounded-2xl bg-orange-100 flex items-center justify-center text-orange-500 text-xl">
                                    <i class="fa-solid fa-bullhorn"></i>
                                </div>

                                <div class="flex-1">

                                    <div class="flex items-center justify-between">

                                        <h3 class="font-extrabold text-gray-800 text-lg">
                                            Pengumuman Baru
                                        </h3>

                                        <span class="text-xs bg-orange-100 text-orange-600 px-3 py-1 rounded-full">
                                            Penting
                                        </span>

                                    </div>

                                    <p class="text-sm text-gray-500 mt-2">
                                        Seluruh LO diwajibkan melakukan update laporan mingguan.
                                    </p>

                                    <div class="mt-4 flex items-center text-xs text-gray-400 gap-2">
                                        <i class="fa-solid fa-clock"></i>
                                        5 jam yang lalu
                                    </div>

                                </div>

                            </div>

                        </div>

                        <!-- SISTEM -->
                        <div class="activity-card bg-[#f5f7ff] border border-indigo-100 rounded-3xl p-6">

                            <div class="flex items-start gap-4">

                                <div class="w-14 h-14 rounded-2xl bg-indigo-100 flex items-center justify-center text-indigo-600 text-xl">
                                    <i class="fa-solid fa-shield-halved"></i>
                                </div>

                                <div class="flex-1">

                                    <div class="flex items-center justify-between">

                                        <h3 class="font-extrabold text-gray-800 text-lg">
                                            Sistem Keamanan
                                        </h3>

                                        <span class="text-xs bg-green-100 text-green-700 px-3 py-1 rounded-full">
                                            Aman
                                        </span>

                                    </div>

                                    <p class="text-sm text-gray-500 mt-2">
                                        Tidak ada aktivitas mencurigakan pada akun LO Anda.
                                    </p>

                                    <div class="mt-4 flex items-center text-xs text-gray-400 gap-2">
                                        <i class="fa-solid fa-clock"></i>
                                        Baru saja
                                    </div>

                                </div>

                            </div>

                        </div>

                        <!-- USER -->
                        <div class="activity-card bg-[#fdf7ff] border border-purple-100 rounded-3xl p-6">

                            <div class="flex items-start gap-4">

                                <div class="w-14 h-14 rounded-2xl bg-purple-100 flex items-center justify-center text-purple-600 text-xl">
                                    <i class="fa-solid fa-users"></i>
                                </div>

                                <div class="flex-1">

                                    <div class="flex items-center justify-between">

                                        <h3 class="font-extrabold text-gray-800 text-lg">
                                            Aktivitas User
                                        </h3>

                                        <span class="text-xs bg-purple-100 text-purple-700 px-3 py-1 rounded-full">
                                            Update
                                        </span>

                                    </div>

                                    <p class="text-sm text-gray-500 mt-2">
                                        Terdapat 12 user baru yang telah bergabung minggu ini.
                                    </p>

                                    <div class="mt-4 flex items-center text-xs text-gray-400 gap-2">
                                        <i class="fa-solid fa-clock"></i>
                                        Kemarin
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </main>

</div>

</body>
</html>