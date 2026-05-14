{{-- resources/views/mahasiswa/profile/settings.blade.php --}}

<!DOCTYPE html>
<html lang="id" class="transition-all duration-300">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>BSS Connect - Pengaturan Mahasiswa</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            darkMode: 'class'
        }
    </script>

    <script>

        // CEK DARK MODE SAAT LOAD
        if(localStorage.getItem('darkMode') === 'enabled'){
            document.documentElement.classList.add('dark');
        }

    </script>

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

        .toggle-switch{
            appearance:none;
            width:52px;
            height:30px;
            background:#d1d5db;
            border-radius:999px;
            position:relative;
            cursor:pointer;
            transition:.3s;
        }

        .toggle-switch:checked{
            background:#17337a;
        }

        .toggle-switch::before{
            content:'';
            position:absolute;
            width:22px;
            height:22px;
            border-radius:50%;
            background:white;
            top:4px;
            left:4px;
            transition:.3s;
        }

        .toggle-switch:checked::before{
            transform:translateX(22px);
        }

    </style>
</head>

<body class="dark:bg-[#020617] transition-all duration-300">

<div class="flex min-h-screen">

    <!-- SIDEBAR -->
    <aside class="hidden lg:flex w-64 bg-[#10235d] dark:bg-[#0f172a] text-white flex-col justify-between p-5 transition-all duration-300">

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
                   class="flex gap-4 px-4 py-3 rounded-2xl hover:bg-white/10 transition">

                    <i class="fa-solid fa-house"></i>

                    <span class="text-sm">
                        Dashboard
                    </span>

                </a>

                <a href="{{ route('mahasiswa.jadwal') }}"
                   class="flex gap-4 px-4 py-3 rounded-2xl hover:bg-white/10 transition">

                    <i class="fa-solid fa-calendar-days"></i>

                    <span class="text-sm">
                        Jadwal
                    </span>

                </a>

                <a href="{{ route('mahasiswa.pengumuman') }}"
                   class="flex gap-4 px-4 py-3 rounded-2xl hover:bg-white/10 transition">

                    <i class="fa-solid fa-bullhorn"></i>

                    <span class="text-sm">
                        Pengumuman
                    </span>

                </a>

                <a href="{{ route('mahasiswa.reward') }}"
                   class="flex gap-4 px-4 py-3 rounded-2xl hover:bg-white/10 transition">

                    <i class="fa-solid fa-award"></i>

                    <span class="text-sm">
                        Reward
                    </span>

                </a>

                <a href="{{ route('mahasiswa.profile') }}"
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

                <img src="https://api.dicebear.com/7.x/avataaars/svg?seed={{ Auth::user()->name }}"
                     class="w-12 h-12 rounded-xl bg-white p-1">

                <div class="ml-3">

                    <h3 class="font-bold text-sm">
                        {{ Auth::user()->name }}
                    </h3>

                    <p class="text-[11px] opacity-70">
                        Mahasiswa BSS
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
                Preferensi Sistem
            </p>

            <h1 class="text-3xl lg:text-4xl font-extrabold">
                Pengaturan Mahasiswa
            </h1>

            <p class="tracking-[3px] text-[11px] mt-2 opacity-70 uppercase">
                Student Settings
            </p>

        </div>

        <!-- CONTENT -->
        <div class="px-4 lg:px-10 -mt-20 relative z-10">

            <div class="bg-white dark:bg-[#0f172a] mobile-card card-shadow p-6 lg:p-8 max-w-6xl mx-auto transition-all duration-300">

                <!-- TOP CARD -->
                <div class="profile-card bg-gradient-to-r from-[#17337a] to-[#1f3f99] rounded-[30px] p-8 text-white mb-8">

                    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">

                        <div class="flex items-center gap-5">

                            <div class="w-28 h-28 rounded-full bg-white/20 p-2 backdrop-blur">

                                <img src="https://api.dicebear.com/7.x/avataaars/svg?seed={{ Auth::user()->name }}"
                                     class="w-full h-full rounded-full bg-white object-cover">

                            </div>

                            <div>

                                <h2 class="text-3xl font-extrabold">
                                    Pengaturan Sistem
                                </h2>

                                <p class="mt-2 text-sm opacity-80">
                                    Atur preferensi akun dan tampilan aplikasi mahasiswa
                                </p>

                                <div class="flex items-center gap-2 mt-4">

                                    <span class="bg-white/20 px-4 py-2 rounded-2xl text-xs">
                                        <i class="fa-solid fa-gear mr-1"></i>
                                        Pengaturan
                                    </span>

                                    <span class="bg-green-400/20 text-green-100 px-4 py-2 rounded-2xl text-xs">
                                        <i class="fa-solid fa-sliders mr-1"></i>
                                        Sistem Aktif
                                    </span>

                                </div>

                            </div>

                        </div>

                        <!-- BUTTON KEMBALI -->
                        <div class="flex gap-3">

                            <a href="{{ route('mahasiswa.profile') }}"
                               class="bg-white text-[#17337a] px-5 py-3 rounded-2xl text-sm font-bold hover:scale-105 transition">

                                <i class="fa-solid fa-user mr-2"></i>
                                Kembali Profil

                            </a>

                        </div>

                    </div>

                </div>

                <!-- SETTINGS -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">

                    <!-- NOTIFIKASI -->
                    <div class="profile-card bg-[#f8fafc] dark:bg-[#1e293b] border border-gray-100 dark:border-slate-700 rounded-3xl p-6 transition-all duration-300">

                        <div class="flex items-center justify-between gap-4">

                            <div class="flex items-center gap-4">

                                <div class="w-14 h-14 rounded-2xl bg-blue-100 flex items-center justify-center">

                                    <i class="fa-solid fa-envelope-open-text text-blue-600 text-xl"></i>

                                </div>

                                <div>

                                    <h3 class="font-extrabold text-gray-800 dark:text-white text-lg">
                                        Notifikasi Email
                                    </h3>

                                    <p class="text-sm text-gray-500 dark:text-slate-300 mt-1">
                                        Aktifkan pemberitahuan email mahasiswa
                                    </p>

                                </div>

                            </div>

                            <input type="checkbox"
                                   checked
                                   class="toggle-switch">

                        </div>

                    </div>

                    <!-- DARK MODE -->
                    <div class="profile-card bg-[#f8fafc] dark:bg-[#1e293b] border border-gray-100 dark:border-slate-700 rounded-3xl p-6 transition-all duration-300">

                        <div class="flex items-center justify-between gap-4">

                            <div class="flex items-center gap-4">

                                <div class="w-14 h-14 rounded-2xl bg-purple-100 flex items-center justify-center">

                                    <i class="fa-solid fa-moon text-purple-600 text-xl"></i>

                                </div>

                                <div>

                                    <h3 class="font-extrabold text-gray-800 dark:text-white text-lg">
                                        Dark Mode
                                    </h3>

                                    <p class="text-sm text-gray-500 dark:text-slate-300 mt-1">
                                        Aktifkan tampilan mode gelap
                                    </p>

                                </div>

                            </div>

                            <input type="checkbox"
                                   id="darkToggle"
                                   class="toggle-switch">

                        </div>

                    </div>

                    <!-- KEAMANAN LOGIN -->
                    <div class="profile-card bg-[#f8fafc] dark:bg-[#1e293b] border border-gray-100 dark:border-slate-700 rounded-3xl p-6 transition-all duration-300">

                        <div class="flex items-center justify-between gap-4">

                            <div class="flex items-center gap-4">

                                <div class="w-14 h-14 rounded-2xl bg-red-100 flex items-center justify-center">

                                    <i class="fa-solid fa-shield-halved text-red-500 text-xl"></i>

                                </div>

                                <div>

                                    <h3 class="font-extrabold text-gray-800 dark:text-white text-lg">
                                        Verifikasi Login
                                    </h3>

                                    <p class="text-sm text-gray-500 dark:text-slate-300 mt-1">
                                        Aktifkan keamanan tambahan akun
                                    </p>

                                </div>

                            </div>

                            <input type="checkbox"
                                   checked
                                   class="toggle-switch">

                        </div>

                    </div>

                    <!-- SUARA -->
                    <div class="profile-card bg-[#f8fafc] dark:bg-[#1e293b] border border-gray-100 dark:border-slate-700 rounded-3xl p-6 transition-all duration-300">

                        <div class="flex items-center justify-between gap-4">

                            <div class="flex items-center gap-4">

                                <div class="w-14 h-14 rounded-2xl bg-yellow-100 flex items-center justify-center">

                                    <i class="fa-solid fa-volume-high text-yellow-600 text-xl"></i>

                                </div>

                                <div>

                                    <h3 class="font-extrabold text-gray-800 dark:text-white text-lg">
                                        Suara Notifikasi
                                    </h3>

                                    <p class="text-sm text-gray-500 dark:text-slate-300 mt-1">
                                        Aktifkan suara pemberitahuan sistem
                                    </p>

                                </div>

                            </div>

                            <input type="checkbox"
                                   checked
                                   class="toggle-switch">

                        </div>

                    </div>

                </div>

                <!-- ACTION -->
                <div class="mt-10 flex flex-col lg:flex-row gap-4 justify-center">

                    <a href="{{ route('mahasiswa.profile') }}"
                       class="bg-[#17337a] hover:bg-[#12285f] text-white px-6 py-3 rounded-2xl font-semibold text-sm text-center transition">

                        <i class="fa-solid fa-user mr-2"></i>
                        Kembali ke Profil

                    </a>

                    <button
                        class="bg-green-500 hover:bg-green-600 text-white px-6 py-3 rounded-2xl font-semibold text-sm transition">

                        <i class="fa-solid fa-floppy-disk mr-2"></i>
                        Simpan Pengaturan

                    </button>

                </div>

            </div>

        </div>

    </main>

</div>

<script>

    const darkToggle = document.getElementById('darkToggle');

    // STATUS AWAL
    if(localStorage.getItem('darkMode') === 'enabled'){
        darkToggle.checked = true;
    }

    // TOGGLE DARK MODE
    darkToggle.addEventListener('change', function(){

        if(this.checked){

            document.documentElement.classList.add('dark');
            localStorage.setItem('darkMode', 'enabled');

        }else{

            document.documentElement.classList.remove('dark');
            localStorage.setItem('darkMode', 'disabled');

        }

    });

</script>

</body>
</html>