<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BSS Connect - Dashboard Mahasiswa</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .bg-bss-dark { background-color: #0f172a; }
        .bg-bss-gradient { background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%); }
        .glass-card { background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); }
        .rounded-custom { border-radius: 2.5rem; }

        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: #f1f1f1; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
    </style>
</head>

<body class="bg-slate-50 antialiased">

<div class="min-h-screen flex">

    <!-- SIDEBAR -->
    <aside class="hidden lg:flex flex-col w-72 bg-bss-dark text-slate-400 p-6 shadow-2xl border-r border-slate-800/50">

        <div class="mb-10 px-4 pt-4">
            <span class="text-white font-extrabold text-2xl flex items-center">
                <div class="w-9 h-9 bg-blue-600 rounded-xl mr-3 flex items-center justify-center">
                    <i class="fa-solid fa-graduation-cap text-white text-sm"></i>
                </div>
                BSS<span class="text-blue-500">CONNECT</span>
            </span>
        </div>

        <div class="flex-1 space-y-8">

            <nav class="space-y-2">

                <a href="{{ route('mahasiswa.dashboard') }}"
                   class="flex items-center space-x-4 bg-blue-600/20 text-blue-400 p-4 rounded-2xl border-l-4 border-blue-500">
                    <i class="fa-solid fa-grid-2"></i>
                    <span class="font-bold">Dashboard</span>
                </a>

                <a href="{{ route('mahasiswa.jadwal') }}"
                   class="flex items-center space-x-4 p-4 rounded-2xl hover:bg-slate-800/50 hover:text-white transition">
                    <i class="fa-solid fa-calendar"></i>
                    <span>Jadwal</span>
                </a>

                <a href="{{ route('mahasiswa.pengumuman') }}"
                   class="flex items-center space-x-4 p-4 rounded-2xl hover:bg-slate-800/50 hover:text-white transition">
                    <i class="fa-solid fa-bullhorn"></i>
                    <span>Pengumuman</span>
                </a>

                <!-- FIX UTAMA DI SINI -->
                <a href="{{ url('/profile') }}"
                   class="flex items-center space-x-4 p-4 rounded-2xl hover:bg-slate-800/50 hover:text-white transition">
                    <i class="fa-solid fa-user"></i>
                    <span>Profil Saya</span>
                </a>

            </nav>
        </div>

        <div class="pt-6 mt-6 border-t border-slate-800/80">

            <div class="flex items-center p-3 mb-4 bg-slate-800/30 rounded-2xl">
                <img src="https://api.dicebear.com/7.x/avataaars/svg?seed={{ Auth::user()->name }}"
                     class="w-10 h-10 rounded-xl">
                <div class="ml-3">
                    <p class="text-sm font-bold text-slate-100">{{ Auth::user()->name }}</p>
                    <p class="text-[10px] text-slate-500 uppercase">Mahasiswa</p>
                </div>
            </div>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="w-full p-4 bg-red-500/10 text-red-400 rounded-2xl hover:bg-red-500 hover:text-white transition">
                    <i class="fa-solid fa-right-from-bracket mr-2"></i> Logout
                </button>
            </form>

        </div>
    </aside>

    <!-- MAIN -->
    <main class="flex-1 flex flex-col">

        <!-- HEADER -->
        <header class="bg-bss-gradient pt-10 pb-24 px-6 lg:px-12 text-white">
            <div class="max-w-7xl mx-auto flex justify-between items-center">

                <div>
                    <p id="currentDate" class="text-blue-100/80 text-sm">Memuat...</p>
                    <h1 class="text-3xl font-bold">Halo, {{ Auth::user()->name }} 👋</h1>
                    <p class="text-blue-100/60 text-sm">Dashboard Mahasiswa</p>
                </div>

                <div class="w-12 h-12 bg-white rounded-xl overflow-hidden">
                    <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=student">
                </div>

            </div>
        </header>

        <!-- CONTENT -->
        <div class="px-6 lg:px-12 -mt-16">

            <div class="glass-card rounded-custom p-8 shadow-xl max-w-7xl mx-auto">

                <h2 class="text-lg font-bold mb-6">Informasi Mahasiswa</h2>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                    <div class="bg-blue-50 p-6 rounded-3xl border">
                        <i class="fa-solid fa-calendar text-blue-600 text-2xl mb-3"></i>
                        <p class="text-sm font-bold text-blue-600">Jadwal Hari Ini</p>
                        <p class="text-xl font-black">2 Kegiatan</p>
                    </div>

                    <div class="bg-emerald-50 p-6 rounded-3xl border">
                        <i class="fa-solid fa-bullhorn text-emerald-600 text-2xl mb-3"></i>
                        <p class="text-sm font-bold text-emerald-600">Pengumuman</p>
                        <p class="text-xl font-black">3 Baru</p>
                    </div>

                    <div class="bg-amber-50 p-6 rounded-3xl border">
                        <i class="fa-solid fa-circle-info text-amber-600 text-2xl mb-3"></i>
                        <p class="text-sm font-bold text-amber-600">Status</p>
                        <p class="text-xl font-black">Aktif</p>
                    </div>

                </div>
            </div>
        </div>

        <!-- ACTIVITY -->
        <div class="px-6 lg:px-12 py-10 max-w-7xl mx-auto w-full">

            <h3 class="text-lg font-bold mb-4">Aktivitas Terbaru</h3>

            <div class="space-y-4">

                <div class="bg-white p-5 rounded-3xl border flex items-center">
                    <i class="fa-solid fa-bell text-blue-500 text-xl mr-4"></i>
                    <div>
                        <p class="font-bold">Pengumuman baru diterbitkan</p>
                        <p class="text-xs text-slate-400">Hari ini</p>
                    </div>
                </div>

                <div class="bg-white p-5 rounded-3xl border flex items-center">
                    <i class="fa-solid fa-calendar-check text-emerald-500 text-xl mr-4"></i>
                    <div>
                        <p class="font-bold">Jadwal diperbarui</p>
                        <p class="text-xs text-slate-400">Kemarin</p>
                    </div>
                </div>

            </div>
        </div>

    </main>
</div>

<script>
    const now = new Date();
    document.getElementById("currentDate").innerText =
        now.toLocaleDateString('id-ID', {
            weekday: 'long',
            day: '2-digit',
            month: 'long',
            year: 'numeric'
        });
</script>

</body>
</html>