{{-- resources/views/admin/LO/index.blade.php --}}

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>BSS Connect - Data LO</title>

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

        .table-card{
            transition:.25s ease;
        }

        .table-card:hover{
            transform:translateY(-3px);
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
                   class="flex gap-4 px-4 py-3 rounded-2xl bg-white/10 transition">

                    <i class="fa-solid fa-user-tie"></i>

                    <span class="text-sm">
                        LO
                    </span>

                </a>

                <a href="{{ route('admin.profile') }}"
                   class="flex gap-4 px-4 py-3 rounded-2xl hover:bg-white/10 transition">

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
                        ADMIN
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
                Management Sistem
            </p>

            <h1 class="text-3xl lg:text-4xl font-extrabold">
                Data LO
            </h1>

            <p class="tracking-[3px] text-[11px] mt-2 opacity-70 uppercase">
                Liaison Officer Management
            </p>

        </div>

        <!-- CONTENT -->
        <div class="px-4 lg:px-10 -mt-20 relative z-10">

            <div class="bg-white mobile-card card-shadow p-6 lg:p-8 max-w-7xl mx-auto">

                <!-- TOP CARD -->
                <div class="bg-gradient-to-r from-[#17337a] to-[#1f3f99] rounded-[30px] p-8 text-white mb-8">

                    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">

                        <div class="flex items-center gap-5">

                            <div class="w-28 h-28 rounded-full bg-white/20 p-2">

                                <div class="w-full h-full rounded-full bg-white flex items-center justify-center">
                                    <i class="fa-solid fa-user-tie text-5xl text-[#17337a]"></i>
                                </div>

                            </div>

                            <div>

                                <h2 class="text-3xl font-extrabold">
                                    Kelola Data LO
                                </h2>

                                <p class="mt-2 text-sm opacity-80">
                                    Monitoring dan manajemen data Liaison Officer
                                </p>

                                <div class="flex gap-2 mt-4 flex-wrap">

                                    <span class="bg-white/20 px-4 py-2 rounded-2xl text-xs">
                                        <i class="fa-solid fa-user-tie mr-1"></i>
                                        LO System
                                    </span>

                                    <span class="bg-green-400/20 text-green-100 px-4 py-2 rounded-2xl text-xs">
                                        <i class="fa-solid fa-circle-check mr-1"></i>
                                        Sistem Aktif
                                    </span>

                                </div>

                            </div>

                        </div>

                        <!-- BUTTON -->
                        <div class="flex gap-3">

                            <a href="#"
                               class="bg-white text-[#17337a] px-5 py-3 rounded-2xl text-sm font-bold hover:scale-105 transition">

                                <i class="fa-solid fa-plus mr-2"></i>
                                Tambah LO

                            </a>

                        </div>

                    </div>

                </div>

                <!-- SEARCH -->
                <div class="mb-6">

                    <div class="flex flex-col lg:flex-row gap-4">

                        <div class="flex-1 relative">

                            <i class="fa-solid fa-magnifying-glass absolute left-5 top-1/2 -translate-y-1/2 text-gray-400"></i>

                            <input type="text"
                                   placeholder="Cari data LO..."
                                   class="w-full bg-[#f8fafc] border border-gray-200 rounded-2xl py-4 pl-14 pr-5 outline-none focus:border-[#17337a]">

                        </div>

                        <button
                            class="bg-[#17337a] hover:bg-[#12285f] text-white px-6 py-4 rounded-2xl font-semibold transition">

                            <i class="fa-solid fa-filter mr-2"></i>
                            Filter

                        </button>

                    </div>

                </div>

                <!-- TABLE -->
                <div class="overflow-x-auto">

                    <table class="w-full">

                        <thead>

                        <tr class="text-left text-gray-500 text-sm border-b">

                            <th class="pb-4 font-semibold">No</th>
                            <th class="pb-4 font-semibold">Nama LO</th>
                            <th class="pb-4 font-semibold">Email</th>
                            <th class="pb-4 font-semibold">No HP</th>
                            <th class="pb-4 font-semibold">Status</th>
                            <th class="pb-4 font-semibold text-center">Action</th>

                        </tr>

                        </thead>

                        <tbody class="divide-y divide-gray-100">

                        @forelse($los ?? [] as $index => $lo)

                            <tr class="table-card">

                                <td class="py-5 text-sm text-gray-700">
                                    {{ $index + 1 }}
                                </td>

                                <td class="py-5">

                                    <div class="flex items-center gap-3">

                                        <img src="https://api.dicebear.com/7.x/avataaars/svg?seed={{ $lo->name }}"
                                             class="w-12 h-12 rounded-xl bg-gray-100 p-1">

                                        <div>

                                            <h3 class="font-bold text-gray-800">
                                                {{ $lo->name }}
                                            </h3>

                                            <p class="text-sm text-gray-500">
                                                Liaison Officer
                                            </p>

                                        </div>

                                    </div>

                                </td>

                                <td class="py-5 text-sm text-gray-600">
                                    {{ $lo->email }}
                                </td>

                                <td class="py-5 text-sm text-gray-600">
                                    {{ $lo->phone ?? '-' }}
                                </td>

                                <td class="py-5">

                                    <span class="bg-green-100 text-green-700 px-4 py-2 rounded-2xl text-xs font-bold">
                                        Aktif
                                    </span>

                                </td>

                                <td class="py-5">

                                    <div class="flex justify-center gap-2">

                                        <a href="#"
                                           class="w-10 h-10 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center hover:scale-105 transition">

                                            <i class="fa-solid fa-eye"></i>

                                        </a>

                                        <a href="#"
                                           class="w-10 h-10 rounded-xl bg-yellow-100 text-yellow-600 flex items-center justify-center hover:scale-105 transition">

                                            <i class="fa-solid fa-pen"></i>

                                        </a>

                                        <button
                                            class="w-10 h-10 rounded-xl bg-red-100 text-red-600 flex items-center justify-center hover:scale-105 transition">

                                            <i class="fa-solid fa-trash"></i>

                                        </button>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="6" class="py-20 text-center">

                                    <div class="flex flex-col items-center">

                                        <div class="w-24 h-24 rounded-full bg-gray-100 flex items-center justify-center mb-5">

                                            <i class="fa-solid fa-user-tie text-4xl text-gray-400"></i>

                                        </div>

                                        <h3 class="text-2xl font-bold text-gray-700">
                                            Data LO Belum Ada
                                        </h3>

                                        <p class="text-gray-500 mt-2">
                                            Tambahkan data LO untuk mulai monitoring
                                        </p>

                                    </div>

                                </td>

                            </tr>

                        @endforelse

                        </tbody>

                    </table>

                </div>

                <!-- FOOTER ACTION -->
                <div class="mt-10 flex flex-col lg:flex-row gap-4 justify-center">

                    <a href="{{ route('admin.dashboard') }}"
                       class="bg-[#17337a] hover:bg-[#12285f] text-white px-6 py-3 rounded-2xl font-semibold text-sm text-center">

                        <i class="fa-solid fa-house mr-2"></i>
                        Dashboard

                    </a>

                    <a href="{{ route('admin.profile') }}"
                       class="bg-white border border-gray-200 hover:bg-gray-100 text-gray-700 px-6 py-3 rounded-2xl font-semibold text-sm text-center">

                        <i class="fa-solid fa-user mr-2"></i>
                        Profil

                    </a>

                </div>

            </div>

        </div>

    </main>

</div>

</body>
</html>