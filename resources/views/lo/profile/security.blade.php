{{-- resources/views/lo/profile/security.blade.php --}}

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>BSS Connect - Keamanan Akun LO</title>

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

        .input-style{
            border:1px solid #e5e7eb;
            border-radius:20px;
            padding:16px 20px;
            width:100%;
            outline:none;
            transition:.2s ease;
            background:#fff;
        }

        .input-style:focus{
            border-color:#17337a;
            box-shadow:0 0 0 4px rgba(23,51,122,.08);
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
                   class="flex gap-4 px-4 py-3 rounded-2xl hover:bg-white/10 transition">

                    <i class="fa-solid fa-house"></i>

                    <span class="text-sm">
                        Dashboard
                    </span>

                </a>

                <a href="{{ route('lo.jadwal.index') }}"
                   class="flex gap-4 px-4 py-3 rounded-2xl hover:bg-white/10 transition">

                    <i class="fa-solid fa-calendar-days"></i>

                    <span class="text-sm">
                        Kelola Jadwal
                    </span>

                </a>

                <a href="{{ route('lo.pengumuman.index') }}"
                   class="flex gap-4 px-4 py-3 rounded-2xl hover:bg-white/10 transition">

                    <i class="fa-solid fa-bullhorn"></i>

                    <span class="text-sm">
                        Pengumuman
                    </span>

                </a>

                <a href="{{ route('lo.profile') }}"
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
        <div class="main-blue h-[260px] rounded-b-[35px] px-5 lg:px-10 pt-10 text-white">

            <p class="text-sm opacity-80 mb-2">
                Pengaturan Keamanan
            </p>

            <h1 class="text-3xl lg:text-4xl font-extrabold">
                Keamanan Akun
            </h1>

            <p class="tracking-[3px] text-[11px] mt-2 opacity-70 uppercase">
                Security Settings
            </p>

        </div>

        <!-- CONTENT -->
        <div class="px-4 lg:px-10 -mt-20 relative z-10">

            <div class="bg-white mobile-card card-shadow p-6 lg:p-8 max-w-5xl mx-auto">

                <!-- TOP CARD -->
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
                                    Liaison Officer BSS Connect
                                </p>

                                <div class="flex items-center gap-2 mt-4">

                                    <span class="bg-white/20 px-4 py-2 rounded-2xl text-xs">
                                        <i class="fa-solid fa-shield-halved mr-1"></i>
                                        Keamanan Akun
                                    </span>

                                    <span class="bg-green-400/20 text-green-100 px-4 py-2 rounded-2xl text-xs">
                                        <i class="fa-solid fa-lock mr-1"></i>
                                        Protected
                                    </span>

                                </div>

                            </div>

                        </div>

                        <!-- BUTTON KEMBALI -->
                        <div class="flex gap-3">

                            <a href="{{ route('lo.profile') }}"
                               class="bg-white text-[#17337a] px-5 py-3 rounded-2xl text-sm font-bold hover:scale-105 transition">

                                <i class="fa-solid fa-user mr-2"></i>
                                Kembali Profil

                            </a>

                        </div>

                    </div>

                </div>

                <!-- SECURITY FORM -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                    <!-- LEFT INFO -->
                    <div class="lg:col-span-1">

                        <div class="profile-card bg-[#f8fafc] border border-gray-100 rounded-3xl p-6">

                            <div class="flex flex-col items-center text-center">

                                <div class="w-24 h-24 rounded-full bg-red-100 flex items-center justify-center mb-5">

                                    <i class="fa-solid fa-lock text-red-500 text-4xl"></i>

                                </div>

                                <h3 class="text-xl font-extrabold text-gray-800">
                                    Sistem Keamanan
                                </h3>

                                <p class="text-sm text-gray-500 mt-3 leading-relaxed">
                                    Pastikan password akun selalu aman dan tidak dibagikan kepada orang lain.
                                </p>

                                <div class="mt-5 w-full">

                                    <div class="bg-green-100 text-green-700 py-3 rounded-2xl text-sm font-semibold">
                                        <i class="fa-solid fa-circle-check mr-2"></i>
                                        Akun Terproteksi
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <!-- RIGHT FORM -->
                    <div class="lg:col-span-2">

                        <div class="profile-card bg-[#f8fafc] border border-gray-100 rounded-3xl p-6">

                            <div class="mb-6">

                                <h2 class="text-2xl font-extrabold text-gray-800">
                                    Update Password
                                </h2>

                                <p class="text-sm text-gray-500 mt-1">
                                    Ubah password akun untuk meningkatkan keamanan sistem
                                </p>

                            </div>

                            <form class="space-y-5">

                                <div>

                                    <label class="text-sm font-semibold text-gray-600">
                                        Password Lama
                                    </label>

                                    <input type="password"
                                           placeholder="Masukkan password lama"
                                           class="input-style mt-2">

                                </div>

                                <div>

                                    <label class="text-sm font-semibold text-gray-600">
                                        Password Baru
                                    </label>

                                    <input type="password"
                                           placeholder="Masukkan password baru"
                                           class="input-style mt-2">

                                </div>

                                <div>

                                    <label class="text-sm font-semibold text-gray-600">
                                        Konfirmasi Password
                                    </label>

                                    <input type="password"
                                           placeholder="Konfirmasi password baru"
                                           class="input-style mt-2">

                                </div>

                                <div class="pt-4 flex flex-col lg:flex-row gap-4">

                                    <button
                                        type="submit"
                                        class="bg-[#17337a] hover:bg-[#12285f] text-white px-6 py-4 rounded-2xl font-bold transition">

                                        <i class="fa-solid fa-key mr-2"></i>
                                        Update Password

                                    </button>

                                    <a href="{{ route('lo.profile') }}"
                                       class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-6 py-4 rounded-2xl font-bold transition text-center">

                                        Batal

                                    </a>

                                </div>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </main>

</div>

</body>
</html>