<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BSS Connect - Pengumuman Mahasiswa</title>

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

        .menu-active{
            background:rgba(255,255,255,0.12);
            color:white;
        }

        .menu-item{
            transition:.25s ease;
        }

        .menu-item:hover{
            background:rgba(255,255,255,0.08);
            color:white;
        }

        .announcement-card{
            transition:.25s ease;
        }

        .announcement-card:hover{
            transform:translateY(-4px);
            box-shadow:0 15px 35px rgba(0,0,0,0.08);
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
                    <i class="fa-solid fa-graduation-cap text-white"></i>
                </div>

                <h1 class="text-2xl font-extrabold">
                    BSS<span class="text-blue-400">CONNECT</span>
                </h1>

            </div>

            <!-- MENU -->
            <div class="space-y-2">

                <a href="{{ route('mahasiswa.dashboard') }}"
                   class="menu-item flex items-center gap-4 px-4 py-3 rounded-2xl">

                    <i class="fa-solid fa-house"></i>

                    <span class="text-sm">
                        Dashboard
                    </span>

                </a>

                <a href="{{ route('mahasiswa.jadwal') }}"
                   class="menu-item flex items-center gap-4 px-4 py-3 rounded-2xl">

                    <i class="fa-solid fa-calendar-days"></i>

                    <span class="text-sm">
                        Jadwal
                    </span>

                </a>

                <a href="{{ route('mahasiswa.pengumuman') }}"
                   class="menu-active flex items-center gap-4 px-4 py-3 rounded-2xl">

                    <i class="fa-solid fa-bullhorn"></i>

                    <span class="text-sm font-semibold">
                        Pengumuman
                    </span>

                </a>

                <a href="{{ route('mahasiswa.reward') }}"
                   class="menu-item flex items-center gap-4 px-4 py-3 rounded-2xl">

                    <i class="fa-solid fa-award"></i>

                    <span class="text-sm">
                        Reward
                    </span>

                </a>

                <a href="{{ route('mahasiswa.profile') }}"
                   class="menu-item flex items-center gap-4 px-4 py-3 rounded-2xl">

                    <i class="fa-solid fa-user"></i>

                    <span class="text-sm">
                        Profile
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
                        Mahasiswa
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
        <div class="main-blue h-[280px] rounded-b-[40px] px-5 lg:px-10 pt-10 relative overflow-hidden">

            <!-- DECORATION -->
            <div class="absolute top-0 right-0 w-72 h-72 bg-white/5 rounded-full -mr-24 -mt-24"></div>
            <div class="absolute bottom-0 right-32 w-40 h-40 bg-white/5 rounded-full"></div>

            <div class="relative z-10 flex flex-col lg:flex-row lg:items-center lg:justify-between">

                <div class="text-white">

                    <p class="text-sm opacity-80 mb-2">
                        Informasi Terbaru
                    </p>

                    <h1 class="text-4xl lg:text-5xl font-extrabold leading-tight">
                        Pengumuman Mahasiswa
                    </h1>

                    <p class="tracking-[3px] text-[11px] mt-3 opacity-70 uppercase">
                        BSS CONNECT NEWS
                    </p>

                    <div class="flex gap-3 mt-6 flex-wrap">

                        <span class="bg-white/15 backdrop-blur px-4 py-2 rounded-2xl text-xs">
                            <i class="fa-solid fa-bullhorn mr-2"></i>
                            Informasi Penting
                        </span>

                        <span class="bg-orange-400/20 text-orange-100 px-4 py-2 rounded-2xl text-xs">
                            <i class="fa-solid fa-circle-exclamation mr-2"></i>
                            Update Terbaru
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
                                Mahasiswa BSS
                            </p>

                        </div>

                    </div>

                    <div class="grid grid-cols-2 gap-3 mt-5">

                        <div class="bg-white/10 rounded-2xl p-3">
                            <p class="text-xs opacity-70">
                                Total Pengumuman
                            </p>
                            <h4 class="text-2xl font-extrabold mt-1">
                                {{ count($pengumumans ?? []) }}
                            </h4>
                        </div>

                        <div class="bg-white/10 rounded-2xl p-3">
                            <p class="text-xs opacity-70">
                                Status
                            </p>
                            <h4 class="text-lg font-extrabold mt-2 text-green-300">
                                Aktif
                            </h4>
                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- CONTENT -->
        <div class="px-4 lg:px-10 -mt-16 relative z-10 pb-10">

            <div class="bg-white mobile-card card-shadow p-6 lg:p-8">

                <!-- TITLE -->
                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 mb-8">

                    <div>

                        <h2 class="text-2xl font-extrabold text-gray-800">
                            Daftar Pengumuman
                        </h2>

                        <p class="text-gray-500 text-sm mt-1">
                            Informasi terbaru dan pengumuman resmi mahasiswa
                        </p>

                    </div>

                    <!-- SEARCH -->
                    <div class="relative w-full lg:w-[320px]">

                        <input type="text"
                               placeholder="Cari pengumuman..."
                               class="w-full bg-gray-100 border-none rounded-2xl py-3 pl-12 pr-4 text-sm focus:ring-2 focus:ring-blue-500 outline-none">

                        <i class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>

                    </div>

                </div>

                <!-- LIST PENGUMUMAN -->
                <div class="space-y-5">

                    @forelse($pengumumans as $pengumuman)

                    <div class="announcement-card bg-[#f8fafc] border border-gray-100 rounded-3xl p-6">

                        <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between gap-5">

                            <div class="flex items-start gap-5 flex-1">

                                <div class="w-16 h-16 rounded-2xl bg-orange-500 text-white flex items-center justify-center text-2xl shadow-lg">
                                    <i class="fa-solid fa-bullhorn"></i>
                                </div>

                                <div class="flex-1">

                                    <div class="flex flex-wrap items-center gap-3">

                                        <h3 class="font-extrabold text-xl text-gray-800">
                                            {{ $pengumuman->judul }}
                                        </h3>

                                        <span class="bg-orange-100 text-orange-700 text-[11px] px-3 py-1 rounded-full font-bold uppercase">
                                            Pengumuman
                                        </span>

                                    </div>

                                    <div class="flex flex-wrap items-center gap-4 mt-4 text-sm text-gray-500">

                                        <span>
                                            <i class="fa-solid fa-calendar mr-2 text-blue-600"></i>
                                            Deadline:
                                            {{ \Carbon\Carbon::parse($pengumuman->deadline)->format('d F Y') }}
                                        </span>

                                    </div>

                                    <div class="mt-5">

                                        <a href="{{ $pengumuman->link_tugas }}"
                                           target="_blank"
                                           class="inline-flex items-center gap-3 bg-[#17337a] hover:bg-[#12285f] text-white px-5 py-3 rounded-2xl text-sm font-semibold transition">

                                            <i class="fa-solid fa-link"></i>

                                            Buka Link Pengumuman

                                        </a>

                                    </div>

                                </div>

                            </div>

                            <div>

                                <span class="bg-green-100 text-green-700 px-4 py-2 rounded-2xl text-xs font-bold uppercase">
                                    Aktif
                                </span>

                            </div>

                        </div>

                    </div>

                    @empty

                    <div class="bg-gray-50 border border-dashed border-gray-200 rounded-3xl p-12 text-center">

                        <div class="w-20 h-20 rounded-full bg-orange-100 text-orange-500 flex items-center justify-center mx-auto text-3xl">
                            <i class="fa-solid fa-bullhorn"></i>
                        </div>

                        <h3 class="text-2xl font-extrabold text-gray-800 mt-6">
                            Belum Ada Pengumuman
                        </h3>

                        <p class="text-gray-500 text-sm mt-2">
                            Pengumuman terbaru akan muncul di halaman ini.
                        </p>

                    </div>

                    @endforelse

                </div>

            </div>

        </div>

    </main>

</div>

</body>
</html>