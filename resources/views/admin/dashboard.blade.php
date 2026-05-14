<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>BSS Connect - Admin Dashboard</title>

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

                <a href="{{ route('admin.dashboard') }}"
                   class="flex items-center gap-4 px-4 py-3 rounded-2xl bg-white/10">
                    <i class="fa-solid fa-house"></i>
                    <span class="text-sm">Dashboard</span>
                </a>

                <a href="{{ route('admin.jadwal') }}"
                   class="flex items-center gap-4 px-4 py-3 rounded-2xl hover:bg-white/10 transition">
                    <i class="fa-solid fa-calendar-days"></i>
                    <span class="text-sm">Jadwal</span>
                </a>

                <a href="{{ route('admin.pengumuman') }}"
                   class="flex items-center gap-4 px-4 py-3 rounded-2xl hover:bg-white/10 transition">
                    <i class="fa-solid fa-bullhorn"></i>
                    <span class="text-sm">Pengumuman</span>
                </a>

                <a href="{{ route('admin.mahasiswa') }}"
                   class="flex items-center gap-4 px-4 py-3 rounded-2xl hover:bg-white/10 transition">
                    <i class="fa-solid fa-users"></i>
                    <span class="text-sm">Mahasiswa</span>
                </a>

                <a href="{{ route('admin.lo') }}"
                   class="flex items-center gap-4 px-4 py-3 rounded-2xl hover:bg-white/10 transition">
                    <i class="fa-solid fa-user-tie"></i>
                    <span class="text-sm">LO</span>
                </a>

                <a href="{{ route('admin.profile') }}"
                   class="flex items-center gap-4 px-4 py-3 rounded-2xl hover:bg-white/10 transition">
                    <i class="fa-solid fa-user"></i>
                    <span class="text-sm">Profile</span>
                </a>

            </div>

        </div>

        <!-- PROFILE -->
        <div>

            <div class="bg-white/10 rounded-3xl p-3 flex items-center mb-4">

                <img src="https://api.dicebear.com/7.x/avataaars/svg?seed={{ auth()->user()->name }}"
                     class="w-12 h-12 rounded-xl bg-white p-1">

                <div class="ml-3">
                    <h3 class="font-bold text-sm">{{ auth()->user()->name }}</h3>
                    <p class="text-[11px] opacity-70">SUPER ADMIN</p>
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

            <div class="absolute top-0 right-0 w-72 h-72 bg-white/5 rounded-full -mr-24 -mt-24"></div>
            <div class="absolute bottom-0 right-32 w-40 h-40 bg-white/5 rounded-full"></div>

            <div class="relative z-10 flex flex-col lg:flex-row lg:items-center lg:justify-between">

                <div class="text-white">

                    <p class="text-sm opacity-80 mb-2">
                        Pusat Kendali Sistem
                    </p>

                    <h1 class="text-4xl lg:text-5xl font-extrabold leading-tight">
                        Dashboard Admin
                    </h1>

                    <p class="tracking-[3px] text-[11px] mt-3 opacity-70 uppercase">
                        Admin Panel BSS Connect
                    </p>

                </div>

                <div class="mt-8 lg:mt-0 bg-white/10 backdrop-blur rounded-[30px] p-5 text-white w-full lg:w-[320px]">

                    <div class="flex items-center gap-4">

                        <img src="https://api.dicebear.com/7.x/avataaars/svg?seed={{ auth()->user()->name }}"
                             class="w-16 h-16 rounded-2xl bg-white p-2">

                        <div>
                            <h3 class="font-extrabold text-lg">
                                {{ auth()->user()->name }}
                            </h3>
                            <p class="text-sm opacity-80">
                                Super Admin
                            </p>
                        </div>

                    </div>

                </div>

            </div>
        </div>

        <!-- CONTENT -->
        <div class="px-4 lg:px-10 -mt-20 relative z-10 pb-10">

            <div class="bg-white mobile-card card-shadow p-6 lg:p-8">

                <!-- TITLE -->
                <div class="mb-8">

                    <h2 class="text-2xl font-extrabold text-gray-800">
                        Ringkasan Dashboard
                    </h2>

                    <p class="text-gray-500 text-sm mt-1">
                        Monitoring sistem admin BSS Connect
                    </p>

                </div>

                <!-- STAT -->
                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-5 gap-5">

                    <div class="dashboard-card bg-gradient-to-br from-[#cbb6f6] to-[#e8ddff] rounded-3xl p-5">
                        <p class="text-sm text-gray-700">User</p>
                        <h3 class="text-3xl font-extrabold mt-3">{{ $totalUser }}</h3>
                    </div>

                    <div class="dashboard-card bg-gradient-to-br from-[#dfe4ff] to-[#f0f3ff] rounded-3xl p-5">
                        <p class="text-sm text-gray-700">LO</p>
                        <h3 class="text-3xl font-extrabold mt-3">{{ $totalLO }}</h3>
                    </div>

                    <div class="dashboard-card bg-gradient-to-br from-[#e9ffe9] to-[#f4fff4] rounded-3xl p-5">
                        <p class="text-sm text-gray-700">Mahasiswa</p>
                        <h3 class="text-3xl font-extrabold mt-3">{{ $totalMahasiswa }}</h3>
                    </div>

                    <div class="dashboard-card bg-gradient-to-br from-[#f5f5f5] to-[#ffffff] rounded-3xl p-5">
                        <p class="text-sm text-gray-700">Jadwal</p>
                        <h3 class="text-3xl font-extrabold mt-3">{{ $totalJadwal }}</h3>
                    </div>

                    <div class="dashboard-card bg-gradient-to-br from-[#fff1d6] to-[#fff8e6] rounded-3xl p-5">
                        <p class="text-sm text-gray-700">Pengumuman</p>
                        <h3 class="text-3xl font-extrabold mt-3">{{ $totalPengumuman }}</h3>
                    </div>

                </div>

                <!-- AKTIVITAS -->
                <div class="mt-10">

                    <h2 class="text-2xl font-extrabold text-gray-800 mb-6">
                        Aktivitas Sistem
                    </h2>

                    <div class="grid grid-cols-1 xl:grid-cols-2 gap-5">

                        <div class="activity-card bg-[#f8fafc] border rounded-3xl p-6">
                            <h3 class="font-bold">Manajemen Admin Aktif</h3>
                            <p class="text-sm text-gray-500">Sistem admin berjalan normal</p>
                        </div>

                        <div class="activity-card bg-[#fff8f3] border rounded-3xl p-6">
                            <h3 class="font-bold">Monitoring Data</h3>
                            <p class="text-sm text-gray-500">Seluruh data tersinkronisasi</p>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </main>

</div>

</body>
</html>