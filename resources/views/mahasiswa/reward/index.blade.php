{{-- resources/views/mahasiswa/reward/index.blade.php --}}

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>BSS Connect - Reward Mahasiswa</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap"
          rel="stylesheet">

    <style>

        *{
            font-family:'Plus Jakarta Sans',sans-serif;
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

        .reward-card{
            transition:.25s ease;
        }

        .reward-card:hover{
            transform:translateY(-4px);
            box-shadow:0 15px 35px rgba(0,0,0,0.08);
        }

        .point-glow{
            box-shadow:0 15px 40px rgba(59,130,246,.35);
        }

        ::-webkit-scrollbar{
            width:6px;
        }

        ::-webkit-scrollbar-thumb{
            background:#cbd5e1;
            border-radius:20px;
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

                <a href="{{ route('mahasiswa.dashboard') }}"
                   class="flex items-center gap-4 px-4 py-3 rounded-2xl hover:bg-white/10 transition">

                    <i class="fa-solid fa-house"></i>

                    <span class="text-sm">
                        Dashboard
                    </span>

                </a>

                <a href="{{ route('mahasiswa.jadwal') }}"
                   class="flex items-center gap-4 px-4 py-3 rounded-2xl hover:bg-white/10 transition">

                    <i class="fa-solid fa-calendar-days"></i>

                    <span class="text-sm">
                        Jadwal
                    </span>

                </a>

                <a href="{{ route('mahasiswa.pengumuman') }}"
                   class="flex items-center gap-4 px-4 py-3 rounded-2xl hover:bg-white/10 transition">

                    <i class="fa-solid fa-bullhorn"></i>

                    <span class="text-sm">
                        Pengumuman
                    </span>

                </a>

                <!-- ACTIVE -->
                <a href="{{ route('mahasiswa.reward') }}"
                   class="flex items-center gap-4 px-4 py-3 rounded-2xl bg-white/10">

                    <i class="fa-solid fa-award text-yellow-300"></i>

                    <span class="text-sm font-semibold">
                        Reward
                    </span>

                </a>

                <a href="{{ route('mahasiswa.profile') }}"
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

                    <p class="text-[11px] opacity-70 uppercase">
                        Mahasiswa BSS
                    </p>

                </div>

            </div>

            <form id="logout-form"
                  action="{{ route('logout') }}"
                  method="POST">
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

            <!-- DECOR -->
            <div class="absolute top-0 right-0 w-72 h-72 bg-white/5 rounded-full -mr-24 -mt-24"></div>
            <div class="absolute bottom-0 right-32 w-40 h-40 bg-white/5 rounded-full"></div>

            <div class="relative z-10 flex flex-col lg:flex-row lg:items-center lg:justify-between">

                <div class="text-white">

                    <p class="text-sm opacity-80 mb-2">
                        Reward Mahasiswa
                    </p>

                    <h1 class="text-4xl lg:text-5xl font-extrabold leading-tight">
                        Reward Point
                    </h1>

                    <p class="tracking-[3px] text-[11px] mt-3 opacity-70 uppercase">
                        Sistem Poin Aktivitas Mahasiswa
                    </p>

                    <div class="flex gap-3 mt-6 flex-wrap">

                        <span class="bg-white/15 backdrop-blur px-4 py-2 rounded-2xl text-xs">
                            <i class="fa-solid fa-star mr-2"></i>
                            Level Gold
                        </span>

                        <span class="bg-yellow-400/20 text-yellow-100 px-4 py-2 rounded-2xl text-xs">
                            <i class="fa-solid fa-trophy mr-2"></i>
                            Ranking #12
                        </span>

                    </div>

                </div>

                <!-- MINI CARD -->
                <div class="mt-8 lg:mt-0 bg-white/10 backdrop-blur rounded-[30px] p-5 text-white w-full lg:w-[320px]">

                    <div class="flex items-center gap-4">

                        <div class="w-16 h-16 rounded-2xl bg-yellow-400 flex items-center justify-center text-slate-900 text-2xl point-glow">
                            <i class="fa-solid fa-coins"></i>
                        </div>

                        <div>

                            <h3 class="font-extrabold text-lg">
                                1,250 Poin
                            </h3>

                            <p class="text-sm opacity-80">
                                Reward Aktif
                            </p>

                        </div>

                    </div>

                    <div class="grid grid-cols-2 gap-3 mt-5">

                        <div class="bg-white/10 rounded-2xl p-3">

                            <p class="text-xs opacity-70">
                                Progress
                            </p>

                            <h4 class="text-2xl font-extrabold mt-1">
                                75%
                            </h4>

                        </div>

                        <div class="bg-white/10 rounded-2xl p-3">

                            <p class="text-xs opacity-70">
                                Badge
                            </p>

                            <h4 class="text-2xl font-extrabold mt-1">
                                Gold
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
                            Statistik Reward
                        </h2>

                        <p class="text-gray-500 text-sm mt-1">
                            Pantau perkembangan poin dan aktivitas mahasiswa
                        </p>

                    </div>

                </div>

                <!-- CARD -->
                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-5">

                    <!-- TOTAL -->
                    <div class="reward-card bg-gradient-to-br from-yellow-400 to-orange-400 rounded-3xl p-6 text-white">

                        <div class="flex items-center justify-between">

                            <div>

                                <p class="text-sm opacity-80">
                                    Total Poin
                                </p>

                                <h3 class="text-5xl font-extrabold mt-4">
                                    1250
                                </h3>

                            </div>

                            <div class="w-16 h-16 rounded-2xl bg-white/20 flex items-center justify-center text-2xl">
                                <i class="fa-solid fa-coins"></i>
                            </div>

                        </div>

                        <div class="mt-6 bg-white/20 rounded-2xl px-4 py-3 text-sm font-semibold">

                            <i class="fa-solid fa-arrow-trend-up mr-2"></i>
                            +150 poin minggu ini

                        </div>

                    </div>

                    <!-- LEVEL -->
                    <div class="reward-card bg-[#f8fafc] border border-gray-100 rounded-3xl p-6">

                        <div class="flex items-center justify-between">

                            <div>

                                <p class="text-sm text-gray-500">
                                    Level Mahasiswa
                                </p>

                                <h3 class="text-3xl font-extrabold text-gray-800 mt-4">
                                    Gold Tier
                                </h3>

                            </div>

                            <div class="w-16 h-16 rounded-2xl bg-yellow-100 flex items-center justify-center text-yellow-500 text-2xl">
                                <i class="fa-solid fa-medal"></i>
                            </div>

                        </div>

                        <div class="mt-6">

                            <div class="flex justify-between text-xs font-bold text-gray-400 mb-2">

                                <span>Progress</span>
                                <span>75%</span>

                            </div>

                            <div class="w-full h-3 bg-gray-100 rounded-full overflow-hidden">

                                <div class="h-full bg-gradient-to-r from-yellow-400 to-orange-400 rounded-full w-[75%]"></div>

                            </div>

                        </div>

                    </div>

                    <!-- RANK -->
                    <div class="reward-card bg-[#f8fafc] border border-gray-100 rounded-3xl p-6">

                        <div class="flex items-center justify-between">

                            <div>

                                <p class="text-sm text-gray-500">
                                    Ranking Kampus
                                </p>

                                <h3 class="text-3xl font-extrabold text-gray-800 mt-4">
                                    #12
                                </h3>

                            </div>

                            <div class="w-16 h-16 rounded-2xl bg-blue-100 flex items-center justify-center text-blue-500 text-2xl">
                                <i class="fa-solid fa-trophy"></i>
                            </div>

                        </div>

                        <div class="mt-6 text-sm text-gray-500">
                            Kamu termasuk mahasiswa dengan poin tertinggi minggu ini.
                        </div>

                    </div>

                </div>

                <!-- HISTORY -->
                <div class="mt-10">

                    <div class="mb-6">

                        <h2 class="text-2xl font-extrabold text-gray-800">
                            Riwayat Reward
                        </h2>

                        <p class="text-gray-500 text-sm mt-1">
                            Aktivitas terbaru yang menghasilkan poin reward
                        </p>

                    </div>

                    <div class="space-y-4">

                        <!-- ITEM -->
                        <div class="reward-card bg-[#f8fafc] border border-gray-100 rounded-3xl p-6 flex items-center justify-between">

                            <div class="flex items-center gap-5">

                                <div class="w-14 h-14 rounded-2xl bg-green-100 text-green-600 flex items-center justify-center text-xl">
                                    <i class="fa-solid fa-check"></i>
                                </div>

                                <div>

                                    <h4 class="font-extrabold text-gray-800">
                                        Kehadiran Pembukaan BSS
                                    </h4>

                                    <p class="text-sm text-gray-500 mt-1">
                                        Kamu hadir tepat waktu pada acara pembukaan.
                                    </p>

                                </div>

                            </div>

                            <div class="text-right">

                                <h5 class="text-2xl font-extrabold text-green-500">
                                    +100
                                </h5>

                                <p class="text-xs text-gray-400 mt-1 uppercase">
                                    2 Jam Lalu
                                </p>

                            </div>

                        </div>

                        <!-- ITEM -->
                        <div class="reward-card bg-[#f8fafc] border border-gray-100 rounded-3xl p-6 flex items-center justify-between">

                            <div class="flex items-center gap-5">

                                <div class="w-14 h-14 rounded-2xl bg-blue-100 text-blue-600 flex items-center justify-center text-xl">
                                    <i class="fa-solid fa-users"></i>
                                </div>

                                <div>

                                    <h4 class="font-extrabold text-gray-800">
                                        Aktif Diskusi Kelompok
                                    </h4>

                                    <p class="text-sm text-gray-500 mt-1">
                                        Mendapat reward karena aktif saat diskusi.
                                    </p>

                                </div>

                            </div>

                            <div class="text-right">

                                <h5 class="text-2xl font-extrabold text-blue-500">
                                    +50
                                </h5>

                                <p class="text-xs text-gray-400 mt-1 uppercase">
                                    Kemarin
                                </p>

                            </div>

                        </div>

                        <!-- ITEM -->
                        <div class="reward-card bg-[#f8fafc] border border-gray-100 rounded-3xl p-6 flex items-center justify-between">

                            <div class="flex items-center gap-5">

                                <div class="w-14 h-14 rounded-2xl bg-purple-100 text-purple-600 flex items-center justify-center text-xl">
                                    <i class="fa-solid fa-star"></i>
                                </div>

                                <div>

                                    <h4 class="font-extrabold text-gray-800">
                                        Mahasiswa Teraktif
                                    </h4>

                                    <p class="text-sm text-gray-500 mt-1">
                                        Mendapat penghargaan mahasiswa paling aktif.
                                    </p>

                                </div>

                            </div>

                            <div class="text-right">

                                <h5 class="text-2xl font-extrabold text-purple-500">
                                    +250
                                </h5>

                                <p class="text-xs text-gray-400 mt-1 uppercase">
                                    Minggu Ini
                                </p>

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