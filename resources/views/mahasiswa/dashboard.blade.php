<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>BSS Connect - Dashboard Mahasiswa</title>

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
            box-shadow:0 10px 25px rgba(0,0,0,0.06);
        }

    </style>
</head>

<body>

<div class="flex min-h-screen">

    <!-- SIDEBAR -->
    <aside class="hidden lg:flex w-64 bg-[#10235d] text-white flex-col justify-between p-5">

        <div>

            <div class="flex items-center mb-10">

                <div class="w-11 h-11 rounded-2xl bg-blue-500 flex items-center justify-center mr-3">
                    <i class="fa-solid fa-graduation-cap text-white"></i>
                </div>

                <h1 class="text-2xl font-extrabold">
                    BSS<span class="text-blue-400">CONNECT</span>
                </h1>

            </div>

            <div class="space-y-2">

                <a href="{{ route('mahasiswa.dashboard') }}"
                   class="flex items-center gap-4 px-4 py-3 rounded-2xl bg-white/10">

                    <i class="fa-solid fa-house"></i>
                    <span class="text-sm">Dashboard</span>

                </a>

                <a href="{{ route('mahasiswa.jadwal') }}"
                   class="flex items-center gap-4 px-4 py-3 rounded-2xl hover:bg-white/10 transition">

                    <i class="fa-solid fa-calendar-days"></i>
                    <span class="text-sm">Jadwal</span>

                </a>

                <a href="{{ route('mahasiswa.pengumuman') }}"
                   class="flex items-center gap-4 px-4 py-3 rounded-2xl hover:bg-white/10 transition">

                    <i class="fa-solid fa-bullhorn"></i>
                    <span class="text-sm">Pengumuman</span>

                </a>

                <a href="{{ route('mahasiswa.reward') }}"
                   class="flex items-center gap-4 px-4 py-3 rounded-2xl hover:bg-white/10 transition">

                    <i class="fa-solid fa-trophy"></i>
                    <span class="text-sm">Reward</span>

                </a>

                <a href="{{ route('mahasiswa.profile') }}"
                   class="flex items-center gap-4 px-4 py-3 rounded-2xl hover:bg-white/10 transition">

                    <i class="fa-solid fa-user"></i>
                    <span class="text-sm">Profile</span>

                </a>

            </div>

        </div>

        <div>

            <div class="bg-white/10 rounded-3xl p-3 flex items-center mb-4">

                <img src="https://api.dicebear.com/7.x/avataaars/svg?seed={{ Auth::user()->name }}"
                     class="w-12 h-12 rounded-xl bg-white p-1">

                <div class="ml-3">

                    <h3 class="font-bold text-sm">
                        {{ Auth::user()->name }}
                    </h3>

                    <p class="text-[11px] opacity-70">
                        MAHASISWA
                    </p>

                </div>

            </div>

            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
            </form>

            <button
                onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                class="w-full bg-red-500 rounded-2xl py-3 text-sm font-bold hover:bg-red-600 transition">

                Logout

            </button>

        </div>

    </aside>

    <!-- MAIN -->
    <main class="flex-1 overflow-hidden">

        <!-- HEADER -->
        <div class="main-blue h-[320px] rounded-b-[40px] px-5 lg:px-10 pt-10 relative overflow-hidden">

            <div class="absolute top-0 right-0 w-72 h-72 bg-white/5 rounded-full -mr-24 -mt-24"></div>

            <div class="absolute bottom-0 left-0 w-52 h-52 bg-white/5 rounded-full -ml-16 -mb-16"></div>

            <div class="relative z-10 flex flex-col lg:flex-row lg:items-center lg:justify-between">

                <div class="text-white">

                    <p class="text-sm opacity-80 mb-2">
                        Selamat Datang
                    </p>

                    <h1 class="text-5xl font-extrabold leading-tight">
                        Dashboard Mahasiswa
                    </h1>

                    <p class="tracking-[3px] text-[11px] mt-3 opacity-70 uppercase">
                        BSS CONNECT STUDENT PANEL
                    </p>

                    <div class="flex flex-wrap gap-3 mt-6">

                        <div class="bg-white/10 backdrop-blur px-5 py-3 rounded-2xl">
                            <p class="text-xs opacity-70">Jadwal Hari Ini</p>
                            <h3 class="text-xl font-extrabold">3 Kegiatan</h3>
                        </div>

                        <div class="bg-white/10 backdrop-blur px-5 py-3 rounded-2xl">
                            <p class="text-xs opacity-70">Pengumuman Baru</p>
                            <h3 class="text-xl font-extrabold">5 Info</h3>
                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- CONTENT -->
        <div class="px-4 lg:px-10 -mt-20 relative z-10 pb-10">

            <div class="bg-white mobile-card card-shadow p-6 lg:p-8">

                <!-- MENU -->
                <div class="flex items-center justify-between mb-8">

                    <div>

                        <h2 class="text-2xl font-extrabold text-gray-800">
                            Menu Mahasiswa
                        </h2>

                        <p class="text-sm text-gray-500 mt-1">
                            Akses cepat fitur mahasiswa BSS Connect
                        </p>

                    </div>

                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-5 mb-10">

                    <a href="{{ route('mahasiswa.jadwal') }}"
                       class="dashboard-card bg-gradient-to-br from-blue-100 to-blue-50 rounded-3xl p-5 block">

                        <div class="flex items-center justify-between">

                            <div>

                                <p class="text-sm text-gray-700">
                                    Jadwal
                                </p>

                                <h3 class="text-2xl font-extrabold mt-2 text-gray-800">
                                    Lihat Jadwal
                                </h3>

                            </div>

                            <div class="w-14 h-14 rounded-2xl bg-blue-200 flex items-center justify-center text-xl">
                                <i class="fa-solid fa-calendar-days"></i>
                            </div>

                        </div>

                    </a>

                    <a href="{{ route('mahasiswa.pengumuman') }}"
                       class="dashboard-card bg-gradient-to-br from-orange-100 to-orange-50 rounded-3xl p-5 block">

                        <div class="flex items-center justify-between">

                            <div>

                                <p class="text-sm text-gray-700">
                                    Pengumuman
                                </p>

                                <h3 class="text-2xl font-extrabold mt-2 text-gray-800">
                                    Info Terbaru
                                </h3>

                            </div>

                            <div class="w-14 h-14 rounded-2xl bg-orange-200 flex items-center justify-center text-xl">
                                <i class="fa-solid fa-bullhorn"></i>
                            </div>

                        </div>

                    </a>

                    <a href="{{ route('mahasiswa.reward') }}"
                       class="dashboard-card bg-gradient-to-br from-yellow-100 to-yellow-50 rounded-3xl p-5 block">

                        <div class="flex items-center justify-between">

                            <div>

                                <p class="text-sm text-gray-700">
                                    Reward
                                </p>

                                <h3 class="text-2xl font-extrabold mt-2 text-gray-800">
                                    Poin Reward
                                </h3>

                            </div>

                            <div class="w-14 h-14 rounded-2xl bg-yellow-200 flex items-center justify-center text-xl">
                                <i class="fa-solid fa-trophy"></i>
                            </div>

                        </div>

                    </a>

                    <a href="{{ route('mahasiswa.profile') }}"
                       class="dashboard-card bg-gradient-to-br from-purple-100 to-purple-50 rounded-3xl p-5 block">

                        <div class="flex items-center justify-between">

                            <div>

                                <p class="text-sm text-gray-700">
                                    Profile
                                </p>

                                <h3 class="text-2xl font-extrabold mt-2 text-gray-800">
                                    Akun Saya
                                </h3>

                            </div>

                            <div class="w-14 h-14 rounded-2xl bg-purple-200 flex items-center justify-center text-xl">
                                <i class="fa-solid fa-user"></i>
                            </div>

                        </div>

                    </a>

                </div>

                <!-- RINGKASAN -->
                <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

                    <!-- AKTIVITAS -->
                    <div class="xl:col-span-2">

                        <div class="flex items-center justify-between mb-5">

                            <div>

                                <h2 class="text-2xl font-extrabold text-gray-800">
                                    Aktivitas Terbaru
                                </h2>

                                <p class="text-sm text-gray-500 mt-1">
                                    Ringkasan aktivitas mahasiswa terbaru
                                </p>

                            </div>

                        </div>

                        <div class="space-y-4">

                            <!-- ITEM -->
                            <div class="activity-card bg-[#f8fafc] border border-gray-100 rounded-3xl p-5">

                                <div class="flex items-start gap-4">

                                    <div class="w-14 h-14 rounded-2xl bg-blue-100 flex items-center justify-center">

                                        <i class="fa-solid fa-calendar-check text-blue-600 text-xl"></i>

                                    </div>

                                    <div class="flex-1">

                                        <div class="flex items-center justify-between gap-3">

                                            <h3 class="font-extrabold text-gray-800 text-lg">
                                                Jadwal Seminar Diperbarui
                                            </h3>

                                            <span class="text-xs bg-blue-100 text-blue-700 px-3 py-2 rounded-2xl font-semibold">
                                                Hari Ini
                                            </span>

                                        </div>

                                        <p class="text-sm text-gray-500 mt-2">
                                            Jadwal seminar proposal telah diperbarui oleh LO.
                                        </p>

                                    </div>

                                </div>

                            </div>

                            <!-- ITEM -->
                            <div class="activity-card bg-[#f8fafc] border border-gray-100 rounded-3xl p-5">

                                <div class="flex items-start gap-4">

                                    <div class="w-14 h-14 rounded-2xl bg-orange-100 flex items-center justify-center">

                                        <i class="fa-solid fa-bullhorn text-orange-500 text-xl"></i>

                                    </div>

                                    <div class="flex-1">

                                        <div class="flex items-center justify-between gap-3">

                                            <h3 class="font-extrabold text-gray-800 text-lg">
                                                Pengumuman Baru
                                            </h3>

                                            <span class="text-xs bg-orange-100 text-orange-700 px-3 py-2 rounded-2xl font-semibold">
                                                2 Jam Lalu
                                            </span>

                                        </div>

                                        <p class="text-sm text-gray-500 mt-2">
                                            Terdapat informasi terbaru terkait kegiatan kampus minggu ini.
                                        </p>

                                    </div>

                                </div>

                            </div>

                            <!-- ITEM -->
                            <div class="activity-card bg-[#f8fafc] border border-gray-100 rounded-3xl p-5">

                                <div class="flex items-start gap-4">

                                    <div class="w-14 h-14 rounded-2xl bg-green-100 flex items-center justify-center">

                                        <i class="fa-solid fa-trophy text-green-600 text-xl"></i>

                                    </div>

                                    <div class="flex-1">

                                        <div class="flex items-center justify-between gap-3">

                                            <h3 class="font-extrabold text-gray-800 text-lg">
                                                Reward Bertambah
                                            </h3>

                                            <span class="text-xs bg-green-100 text-green-700 px-3 py-2 rounded-2xl font-semibold">
                                                Kemarin
                                            </span>

                                        </div>

                                        <p class="text-sm text-gray-500 mt-2">
                                            Selamat! Anda mendapatkan tambahan poin reward mahasiswa.
                                        </p>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <!-- QUICK INFO -->
                    <div>

                        <div class="bg-gradient-to-br from-[#17337a] to-[#1f3f99] rounded-[30px] p-6 text-white mb-5">

                            <div class="flex items-center justify-between mb-5">

                                <h3 class="text-xl font-extrabold">
                                    Statistik
                                </h3>

                                <i class="fa-solid fa-chart-simple text-2xl opacity-70"></i>

                            </div>

                            <div class="space-y-5">

                                <div>

                                    <div class="flex justify-between mb-2">

                                        <span class="text-sm opacity-80">
                                            Kehadiran
                                        </span>

                                        <span class="font-bold">
                                            92%
                                        </span>

                                    </div>

                                    <div class="w-full bg-white/20 rounded-full h-3">
                                        <div class="bg-white h-3 rounded-full w-[92%]"></div>
                                    </div>

                                </div>

                                <div>

                                    <div class="flex justify-between mb-2">

                                        <span class="text-sm opacity-80">
                                            Progress Reward
                                        </span>

                                        <span class="font-bold">
                                            75%
                                        </span>

                                    </div>

                                    <div class="w-full bg-white/20 rounded-full h-3">
                                        <div class="bg-yellow-300 h-3 rounded-full w-[75%]"></div>
                                    </div>

                                </div>

                            </div>

                        </div>

                        <!-- INFO CARD -->
                        <div class="bg-[#f8fafc] border border-gray-100 rounded-[30px] p-6">

                            <div class="flex items-center gap-4 mb-4">

                                <div class="w-14 h-14 rounded-2xl bg-purple-100 flex items-center justify-center">

                                    <i class="fa-solid fa-user-graduate text-purple-600 text-xl"></i>

                                </div>

                                <div>

                                    <p class="text-sm text-gray-500">
                                        Mahasiswa Aktif
                                    </p>

                                    <h3 class="text-2xl font-extrabold text-gray-800">
                                        BSS Connect
                                    </h3>

                                </div>

                            </div>

                            <p class="text-sm text-gray-500 leading-relaxed">
                                Tetap pantau jadwal, pengumuman, dan reward terbaru melalui dashboard mahasiswa.
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </main>

</div>

</body>
</html>