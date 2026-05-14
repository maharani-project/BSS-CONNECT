<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>BSS Connect - Edit Pengumuman</title>

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
            box-shadow:0 10px 25px rgba(0,0,0,0.06);
        }

        .mobile-card{
            border-radius:28px;
        }

        .form-input{
            width:100%;
            height:52px;
            border:none;
            outline:none;
            border-radius:18px;
            background:#edf2ff;
            padding:0 18px;
            font-size:14px;
        }

        .form-input:focus{
            background:white;
            box-shadow:0 0 0 3px rgba(37,99,235,0.15);
        }
    </style>

</head>

<body>

<div class="flex min-h-screen">

    <!-- SIDEBAR (UPDATED STYLE) -->
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
                   class="flex items-center gap-4 px-4 py-3 rounded-2xl hover:bg-white/10 transition">
                    <i class="fa-solid fa-house"></i>
                    <span class="text-sm">Dashboard</span>
                </a>

                <a href="{{ route('lo.jadwal.index') }}"
                   class="flex items-center gap-4 px-4 py-3 rounded-2xl hover:bg-white/10 transition">
                    <i class="fa-solid fa-calendar-days"></i>
                    <span class="text-sm">Kelola Jadwal</span>
                </a>

                <a href="{{ route('lo.pengumuman.index') }}"
                   class="flex items-center gap-4 px-4 py-3 rounded-2xl bg-white/10">
                    <i class="fa-solid fa-bullhorn"></i>
                    <span class="text-sm">Pengumuman</span>
                </a>

                <a href="{{ route('lo.profile') }}"
                   class="flex items-center gap-4 px-4 py-3 rounded-2xl hover:bg-white/10 transition">
                    <i class="fa-solid fa-user"></i>
                    <span class="text-sm">Profil</span>
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

    <!-- CONTENT -->
    <main class="flex-1 overflow-hidden relative">

        <!-- HEADER -->
        <div class="main-blue h-[240px] rounded-b-[32px] px-5 lg:px-10 pt-8">

            <div class="text-white">

                <p class="text-sm opacity-80 mb-1">
                    Manajemen Informasi
                </p>

                <h1 class="text-3xl font-extrabold">
                    Edit Pengumuman
                </h1>

                <p class="uppercase tracking-[3px] text-[11px] mt-2 opacity-70">
                    Update informasi pengumuman
                </p>

            </div>

        </div>

        <!-- FORM -->
        <div class="px-4 lg:px-10 -mt-16 relative z-10">

            <div class="bg-white mobile-card card-shadow max-w-6xl mx-auto p-6 lg:p-8">

                <div class="flex items-center justify-between mb-6">

                    <div>
                        <h2 class="text-2xl font-extrabold text-gray-800">
                            Form Pengumuman
                        </h2>
                        <p class="text-sm text-gray-500">
                            Edit data pengumuman
                        </p>
                    </div>

                    <div class="w-14 h-14 rounded-3xl bg-blue-100 flex items-center justify-center">
                        <i class="fa-solid fa-pen-to-square text-blue-600 text-xl"></i>
                    </div>

                </div>

                <form action="{{ route('lo.pengumuman.update', $pengumuman->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">

                        <!-- JUDUL -->
                        <div>
                            <label class="block mb-2 font-semibold text-gray-700">Judul</label>
                            <input type="text"
                                   name="judul"
                                   value="{{ $pengumuman->judul }}"
                                   class="form-input"
                                   required>
                        </div>

                        <!-- DEADLINE -->
                        <div>
                            <label class="block mb-2 font-semibold text-gray-700">Deadline</label>
                            <input type="datetime-local"
                                   name="deadline"
                                   value="{{ \Carbon\Carbon::parse($pengumuman->deadline)->format('Y-m-d\TH:i') }}"
                                   class="form-input"
                                   required>
                        </div>

                        <!-- LINK TUGAS -->
                        <div class="lg:col-span-2">
                            <label class="block mb-2 font-semibold text-gray-700">Link Tugas</label>
                            <input type="url"
                                   name="link_tugas"
                                   value="{{ $pengumuman->link_tugas }}"
                                   class="form-input"
                                   required>
                        </div>

                    </div>

                    <div class="flex gap-4 mt-6">

                        <a href="{{ route('lo.pengumuman.index') }}"
                           class="px-6 h-12 rounded-2xl bg-gray-200 hover:bg-gray-300 flex items-center justify-center font-semibold">
                            Kembali
                        </a>

                        <button type="submit"
                                class="flex-1 bg-blue-600 hover:bg-blue-700 text-white h-12 rounded-2xl font-semibold">
                            <i class="fa-solid fa-floppy-disk mr-2"></i>
                            Update Pengumuman
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </main>

</div>

</body>
</html>