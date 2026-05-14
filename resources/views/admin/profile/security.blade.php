{{-- resources/views/admin/profile/security.blade.php --}}

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>BSS Connect - Keamanan Admin</title>

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
                   class="flex gap-4 px-4 py-3 rounded-2xl hover:bg-white/10 transition">
                    <i class="fa-solid fa-house"></i>
                    <span class="text-sm">Dashboard</span>
                </a>

                <a href="{{ route('admin.jadwal') }}"
                   class="flex gap-4 px-4 py-3 rounded-2xl hover:bg-white/10 transition">
                    <i class="fa-solid fa-calendar-days"></i>
                    <span class="text-sm">Jadwal</span>
                </a>

                <a href="{{ route('admin.pengumuman') }}"
                   class="flex gap-4 px-4 py-3 rounded-2xl hover:bg-white/10 transition">
                    <i class="fa-solid fa-bullhorn"></i>
                    <span class="text-sm">Pengumuman</span>
                </a>

                <a href="{{ route('admin.mahasiswa') }}"
                   class="flex gap-4 px-4 py-3 rounded-2xl hover:bg-white/10 transition">
                    <i class="fa-solid fa-users"></i>
                    <span class="text-sm">Mahasiswa</span>
                </a>

                <a href="{{ route('admin.lo') }}"
                   class="flex gap-4 px-4 py-3 rounded-2xl hover:bg-white/10 transition">
                    <i class="fa-solid fa-user-tie"></i>
                    <span class="text-sm">LO</span>
                </a>

                <a href="{{ route('admin.profile') }}"
                   class="flex gap-4 px-4 py-3 rounded-2xl hover:bg-white/10 transition">
                    <i class="fa-solid fa-user"></i>
                    <span class="text-sm">Profil</span>
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

            <button onclick="event.preventDefault();document.getElementById('logout-form').submit();"
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
                Keamanan Admin
            </h1>

            <p class="tracking-[3px] text-[11px] mt-2 opacity-70 uppercase">
                Admin Security Settings
            </p>

        </div>

        <!-- CONTENT -->
        <div class="px-4 lg:px-10 -mt-20 relative z-10">

            <div class="bg-white mobile-card card-shadow p-6 lg:p-8 max-w-5xl mx-auto">

                <!-- TOP CARD -->
                <div class="profile-card bg-gradient-to-r from-[#17337a] to-[#1f3f99] rounded-[30px] p-8 text-white mb-8">

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
                                Administrator BSS Connect
                            </p>

                        </div>

                    </div>

                </div>

                <!-- ALERT -->
                @if(session('success'))

                    <div class="mb-5 bg-green-100 border border-green-200 text-green-700 px-5 py-4 rounded-2xl">
                        {{ session('success') }}
                    </div>

                @endif

                @if($errors->any())

                    <div class="mb-5 bg-red-100 border border-red-200 text-red-700 px-5 py-4 rounded-2xl">

                        <ul class="list-disc ml-5 text-sm space-y-1">

                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach

                        </ul>

                    </div>

                @endif

                <!-- FORM -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                    <!-- LEFT -->
                    <div>

                        <div class="profile-card bg-[#f8fafc] border border-gray-100 rounded-3xl p-6">

                            <div class="flex flex-col items-center text-center">

                                <div class="w-24 h-24 rounded-full bg-red-100 flex items-center justify-center mb-5">

                                    <i class="fa-solid fa-shield-halved text-red-500 text-4xl"></i>

                                </div>

                                <h3 class="text-xl font-extrabold text-gray-800">
                                    Keamanan Sistem
                                </h3>

                                <p class="text-sm text-gray-500 mt-3">
                                    Pastikan password admin kuat dan aman.
                                </p>

                            </div>

                        </div>

                    </div>

                    <!-- RIGHT -->
                    <div class="lg:col-span-2">

                        <div class="profile-card bg-[#f8fafc] border border-gray-100 rounded-3xl p-6">

                            <div class="mb-6">

                                <h2 class="text-2xl font-extrabold text-gray-800">
                                    Update Password
                                </h2>

                            </div>

                            <form action="#"
                                  method="POST"
                                  class="space-y-5">

                                @csrf

                                <div>

                                    <label class="text-sm font-semibold text-gray-600">
                                        Password Lama
                                    </label>

                                    <input type="password"
                                           name="current_password"
                                           class="input-style mt-2">

                                </div>

                                <div>

                                    <label class="text-sm font-semibold text-gray-600">
                                        Password Baru
                                    </label>

                                    <input type="password"
                                           name="password"
                                           class="input-style mt-2">

                                </div>

                                <div>

                                    <label class="text-sm font-semibold text-gray-600">
                                        Konfirmasi Password
                                    </label>

                                    <input type="password"
                                           name="password_confirmation"
                                           class="input-style mt-2">

                                </div>

                                <div class="pt-4 flex gap-4">

                                    <button
                                        type="submit"
                                        class="bg-[#17337a] hover:bg-[#12285f] text-white px-6 py-4 rounded-2xl font-bold transition">

                                        <i class="fa-solid fa-key mr-2"></i>
                                        Update Password

                                    </button>

                                    <a href="{{ route('admin.profile') }}"
                                       class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-6 py-4 rounded-2xl font-bold transition">

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