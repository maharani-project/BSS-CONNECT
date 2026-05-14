<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>BSS Connect - Admin Jadwal</title>

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
            box-shadow:0 10px 30px rgba(0,0,0,0.06);
        }

        .mobile-card{
            border-radius:28px;
        }

        .jadwal-card{
            transition:.25s ease;
        }

        .jadwal-card:hover{
            transform:translateY(-4px);
            box-shadow:0 15px 35px rgba(0,0,0,0.10);
        }

        .badge{
            font-size:11px;
            padding:4px 10px;
            border-radius:999px;
            font-weight:600;
        }

        .bg-bss{
            background:#dbeafe;
            color:#1d4ed8;
        }

        .bg-agenda{
            background:#ede9fe;
            color:#5b21b6;
        }

        .bg-default{
            background:#f1f5f9;
            color:#334155;
        }

        .left-strip{
            width:6px;
            border-radius:999px;
        }
    </style>
</head>

<body>

<div class="flex min-h-screen">

    <!-- SIDEBAR (SUDAH DISESUAIKAN ADMIN STYLE) -->
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
                   class="flex items-center gap-4 px-4 py-3 rounded-2xl hover:bg-white/10 transition">
                    <i class="fa-solid fa-house"></i>
                    <span class="text-sm">Dashboard</span>
                </a>

                <a href="{{ route('admin.jadwal') }}"
                   class="flex items-center gap-4 px-4 py-3 rounded-2xl bg-white/10">
                    <i class="fa-solid fa-calendar-days"></i>
                    <span class="text-sm">Kelola Jadwal</span>
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

                <img src="https://api.dicebear.com/7.x/avataaars/svg?seed={{ Auth::user()->name }}"
                     class="w-12 h-12 rounded-xl bg-white p-1">

                <div class="ml-3">

                    <h3 class="font-bold text-sm">
                        {{ Auth::user()->name }}
                    </h3>

                    <p class="text-[11px] opacity-70">
                        ADMIN
                    </p>

                </div>

            </div>

            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
            </form>

            <button onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                    class="w-full bg-red-500 rounded-2xl py-3 text-sm font-bold hover:bg-red-600 transition">
                Keluar Sistem
            </button>

        </div>

    </aside>

    <!-- MAIN -->
    <main class="flex-1 relative overflow-hidden">

        <!-- HEADER -->
        <div class="main-blue h-[260px] rounded-b-[35px] px-5 lg:px-10 pt-10">

            <div class="text-white">

                <p class="text-sm opacity-80 mb-2">
                    Manajemen Kegiatan
                </p>

                <h1 class="text-3xl lg:text-4xl font-extrabold">
                    Kelola Jadwal (Admin)
                </h1>

                <p class="tracking-[3px] text-[11px] mt-2 opacity-70 uppercase">
                    Agenda & Event Sistem
                </p>

            </div>

        </div>

        <!-- BODY -->
        <div class="px-4 lg:px-10 -mt-20 relative z-10">

            <div class="bg-white mobile-card card-shadow p-6 lg:p-8">

                <!-- HEADER -->
                <div class="flex items-center justify-between mb-8">

                    <div>
                        <h2 class="text-2xl font-extrabold text-gray-800">
                            Data Jadwal
                        </h2>
                        <p class="text-gray-500 text-sm mt-1">
                            Semua agenda kegiatan
                        </p>
                    </div>

                    <a href="{{ route('admin.jadwal.create') }}"
                       class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-2xl text-sm font-semibold shadow-md transition">
                        + Tambah Jadwal
                    </a>

                </div>

                <!-- LIST -->
                <div class="space-y-5">

                    @forelse($jadwals as $jadwal)

                        @php
                            $type = strtolower($jadwal->nama_acara);

                            if(str_contains($type,'bss')) {
                                $color = 'bg-bss';
                                $strip = 'bg-blue-500';
                            } elseif(str_contains($type,'agenda')) {
                                $color = 'bg-agenda';
                                $strip = 'bg-purple-500';
                            } else {
                                $color = 'bg-default';
                                $strip = 'bg-gray-400';
                            }
                        @endphp

                        <div class="jadwal-card flex gap-4 bg-white border border-gray-100 rounded-3xl p-5">

                            <!-- STRIP -->
                            <div class="left-strip {{ $strip }}"></div>

                            <!-- CONTENT -->
                            <div class="flex-1">

                                <h3 class="font-extrabold text-lg text-gray-800">
                                    {{ $jadwal->nama_acara }}
                                </h3>

                                <p class="text-sm text-gray-500 mb-2">
                                    <i class="fa-solid fa-location-dot text-red-400 mr-1"></i>
                                    {{ $jadwal->lokasi }}
                                </p>

                                <div class="flex flex-wrap gap-4 text-sm text-gray-500">

                                    <span>
                                        <i class="fa-regular fa-calendar mr-1"></i>
                                        {{ $jadwal->tanggal }}
                                    </span>

                                    <span>
                                        <i class="fa-regular fa-clock mr-1"></i>
                                        {{ $jadwal->waktu }}
                                    </span>

                                </div>

                            </div>

                            <!-- ACTION -->
                            <div class="flex gap-2">

                                <a href="{{ route('admin.jadwal.edit', $jadwal->id) }}"
                                   class="w-10 h-10 rounded-2xl bg-blue-50 hover:bg-blue-100 flex items-center justify-center">
                                    <i class="fa-solid fa-pen text-blue-600 text-sm"></i>
                                </a>

                                <form action="{{ route('admin.jadwal.delete', $jadwal->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Yakin ingin hapus jadwal ini?')">

                                    @csrf
                                    @method('DELETE')

                                    <button class="w-10 h-10 rounded-2xl bg-red-50 hover:bg-red-100 flex items-center justify-center">
                                        <i class="fa-solid fa-trash text-red-600 text-sm"></i>
                                    </button>

                                </form>

                            </div>

                        </div>

                    @empty

                        <div class="text-center py-14 text-gray-500">
                            <i class="fa-solid fa-calendar-xmark text-4xl mb-4"></i>
                            <p class="font-bold text-lg">Belum ada jadwal</p>
                            <p class="text-sm mt-1">Silakan tambahkan jadwal baru</p>
                        </div>

                    @endforelse

                </div>

            </div>

        </div>

    </main>

</div>

</body>
</html>