<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BSS Connect - Pengumuman Admin</title>

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
            background:#f5f5f5;
        }

        .main-blue{
            background:#1f3f99;
        }

        .card-shadow{
            box-shadow:0 10px 30px rgba(0,0,0,0.06);
        }

        .mobile-card{
            border-radius:28px;
        }

        .task-card{
            transition:.25s ease;
        }

        .task-card:hover{
            transform:translateY(-4px);
            box-shadow:0 15px 35px rgba(0,0,0,0.10);
        }
    </style>
</head>

<body>

<div class="flex min-h-screen">

    <!-- SIDEBAR ADMIN (SUDAH DISESUAIKAN) -->
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
                   class="flex items-center gap-4 px-4 py-3 rounded-2xl hover:bg-white/10 transition">
                    <i class="fa-solid fa-calendar-days"></i>
                    <span class="text-sm">Kelola Jadwal</span>
                </a>

                <!-- ACTIVE -->
                <a href="{{ route('admin.pengumuman') }}"
                   class="flex items-center gap-4 px-4 py-3 rounded-2xl bg-white/10">
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
    <main class="flex-1 overflow-hidden">

        <!-- HEADER -->
        <div class="main-blue h-[260px] rounded-b-[35px] px-5 lg:px-10 pt-10">

            <div class="text-white">

                <p class="text-sm opacity-80 mb-2">
                    Manajemen Tugas Admin
                </p>

                <h1 class="text-3xl lg:text-4xl font-extrabold">
                    Pengumuman Tugas
                </h1>

                <p class="tracking-[3px] text-[11px] mt-2 opacity-70 uppercase">
                    Deadline & Link Tugas
                </p>

            </div>

        </div>

        <!-- CONTENT -->
        <div class="px-4 lg:px-10 -mt-20 relative z-10">

            <div class="bg-white mobile-card card-shadow p-6 lg:p-8">

                <!-- HEADER CONTENT -->
                <div class="flex justify-between items-center mb-8">

                    <div>
                        <h2 class="text-2xl font-extrabold text-gray-800">
                            Daftar Pengumuman
                        </h2>
                        <p class="text-gray-500 text-sm mt-1">
                            Semua pengumuman dari admin
                        </p>
                    </div>

                    <a href="{{ route('admin.pengumuman.create') }}"
                       class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-2xl text-sm font-semibold transition">

                        <i class="fa-solid fa-plus mr-2"></i>
                        Tambah Pengumuman

                    </a>

                </div>

                <!-- LIST -->
                <div class="space-y-5">

                    @forelse($pengumumans as $item)

                    <div class="task-card border border-gray-100 rounded-3xl p-5 bg-white">

                        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-5">

                            <div>

                                <div class="flex items-start gap-4">

                                    <div class="w-14 h-14 rounded-2xl bg-orange-100 flex items-center justify-center">
                                        <i class="fa-solid fa-bullhorn text-orange-500 text-xl"></i>
                                    </div>

                                    <div>

                                        <h3 class="font-extrabold text-lg text-gray-800">
                                            {{ $item->judul }}
                                        </h3>

                                        <p class="text-sm text-gray-500 mt-2">
                                            <i class="fa-regular fa-calendar mr-1"></i>
                                            Deadline: {{ $item->deadline }}
                                        </p>

                                        <a href="{{ $item->link_tugas }}"
                                           target="_blank"
                                           class="inline-flex items-center gap-2 mt-3 text-blue-600 text-sm font-semibold hover:underline">

                                            <i class="fa-solid fa-link"></i>
                                            Buka Link Tugas

                                        </a>

                                    </div>

                                </div>

                            </div>

                            <div class="flex gap-3">

                                <a href="{{ route('admin.pengumuman.edit', $item->id) }}"
                                   class="w-11 h-11 flex items-center justify-center bg-blue-50 hover:bg-blue-100 rounded-2xl transition">

                                    <i class="fa-solid fa-pen text-blue-600"></i>

                                </a>

                                <form action="{{ route('admin.pengumuman.delete', $item->id) }}"
                                      method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button class="w-11 h-11 bg-red-50 hover:bg-red-100 rounded-2xl transition">
                                        <i class="fa-solid fa-trash text-red-600"></i>
                                    </button>

                                </form>

                            </div>

                        </div>

                    </div>

                    @empty

                    <div class="text-center py-16">

                        <div class="w-24 h-24 mx-auto rounded-full bg-gray-100 flex items-center justify-center mb-5">
                            <i class="fa-solid fa-bullhorn text-3xl text-gray-400"></i>
                        </div>

                        <h3 class="text-xl font-bold text-gray-700">
                            Belum Ada Pengumuman
                        </h3>

                        <p class="text-gray-500 text-sm mt-2">
                            Tambahkan pengumuman baru untuk mahasiswa
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