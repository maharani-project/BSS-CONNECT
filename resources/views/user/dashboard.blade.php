<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BSS Connect - Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .bg-bss-dark { background-color: #0f172a; } /* Slate 900 untuk kesan lebih premium */
        .bg-bss-gradient { background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%); }
        .glass-card { background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); }
        .rounded-custom { border-radius: 2.5rem; }
        
        /* Custom Scrollbar */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: #f1f1f1; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
    </style>
</head>
<body class="bg-slate-50 antialiased">

    <div class="min-h-screen flex">
        <aside class="hidden lg:flex flex-col w-72 bg-bss-dark text-slate-400 p-6 shadow-2xl border-r border-slate-800/50">
    <div class="mb-10 px-4 pt-4">
        <span class="text-white font-extrabold text-2xl tracking-tighter flex items-center">
            <div class="w-9 h-9 bg-blue-600 rounded-xl mr-3 flex items-center justify-center shadow-lg shadow-blue-500/20">
                <i class="fa-solid fa-bolt text-white text-sm"></i>
            </div>
            BSS<span class="text-blue-500">CONNECT</span>
        </span>
    </div>
    
    <div class="flex-1 space-y-8">
        <div>
            <p class="px-4 text-[10px] font-bold text-slate-500 uppercase tracking-[0.2em] mb-4 text-white">Menu Utama</p>
            <nav class="space-y-1">
                <a href="{{ route('dashboard') }}" class="flex items-center space-x-4 bg-gradient-to-r from-blue-600/20 to-transparent text-blue-400 p-4 rounded-2xl border-l-4 border-blue-500 shadow-sm transition-all group">
                    <i class="fa-solid fa-grid-2 text-lg"></i> 
                    <span class="font-bold">Dashboard</span>
                </a>
                
                <a href="{{ route('jadwal.index') }}" class="flex items-center space-x-4 p-4 rounded-2xl hover:bg-slate-800/50 hover:text-slate-100 transition-all group">
                    <i class="fa-solid fa-calendar-check text-lg opacity-60 group-hover:opacity-100 group-hover:text-blue-400"></i> 
                    <span class="font-medium">Jadwal Acara</span>
                </a>

                <a href="{{ route('pengumuman.index') }}" class="flex items-center space-x-4 p-4 rounded-2xl hover:bg-slate-800/50 hover:text-slate-100 transition-all group">
                    <i class="fa-solid fa-bullhorn text-lg opacity-60 group-hover:opacity-100 group-hover:text-blue-400"></i> 
                    <span class="font-medium">Pengumuman</span>
                </a>
                <a href="{{ route('user.list') }}" class="flex items-center space-x-4 p-4 rounded-2xl hover:bg-slate-800/50 hover:text-slate-100 transition-all group">
                    <i class="fa-solid fa-users-gear text-lg opacity-60 group-hover:opacity-100 group-hover:text-blue-400"></i> 
                    <span class="font-medium">Daftar Mahasiswa</span>
                </a>
                <a href="{{ route('user.lo') }}" class="flex items-center space-x-4 p-4 rounded-2xl hover:bg-slate-800/50 hover:text-slate-100 transition-all group">
                    <i class="fa-solid fa-user-shield text-lg opacity-60 group-hover:opacity-100 group-hover:text-blue-400"></i> 
                    <span class="font-medium">Data Panitia/LO</span>
                </a>
            </nav>
        </div>
    </div>
    

    <div class="pt-6 mt-6 border-t border-slate-800/80">
        <div class="flex items-center p-3 mb-4 bg-slate-800/30 rounded-2xl border border-slate-700/30">
            <img src="https://api.dicebear.com/7.x/avataaars/svg?seed={{ Auth::user()->name }}" class="w-10 h-10 rounded-xl bg-slate-700 p-0.5">
            <div class="ml-3 overflow-hidden">
                <p class="text-sm font-bold text-slate-100 truncate">{{ Auth::user()->name }}</p>
                <p class="text-[10px] text-slate-500 truncate uppercase tracking-tighter">Super Admin</p>
            </div>
        </div>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
            @csrf
        </form>
        <button onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
                class="flex items-center justify-center space-x-3 p-4 w-full rounded-2xl bg-red-500/5 text-red-400 border border-red-500/10 hover:bg-red-500 hover:text-white transition-all shadow-lg hover:shadow-red-500/20 group">
            <i class="fa-solid fa-power-off text-lg"></i>
            <span class="font-bold">Keluar Sistem</span>
        </button>
    </div>
</aside>

        <main class="flex-1 flex flex-col h-screen overflow-hidden">
            
            <header class="bg-bss-gradient pt-10 pb-32 px-6 lg:px-12 text-white">
                <div class="flex justify-between items-center max-w-7xl mx-auto">
                    <div>
                        <p class="text-blue-100/80 text-sm font-medium mb-1" id="currentDate">Memuat...</p>
                        <h1 class="text-3xl lg:text-4xl font-extrabold tracking-tight">Halo, Admin <span class="text-blue-300">👋</span></h1>
                        <p class="text-blue-100/60 text-sm mt-1 uppercase tracking-widest font-bold">Pusat Kendali Sistem</p>
                    </div>
                    
                    <div class="flex items-center gap-4 bg-white/10 p-2 rounded-2xl backdrop-blur-md border border-white/10">
                        <div class="text-right hidden sm:block pl-4">
                            <p class="font-bold text-sm leading-none">Super Admin</p>
                            <p class="text-[10px] opacity-70 mt-1 uppercase tracking-tighter">Verified Account</p>
                        </div>
                        <div class="w-12 h-12 bg-white rounded-xl shadow-inner overflow-hidden border-2 border-blue-400/30">
                            <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Felix" alt="Admin" class="w-full h-full object-cover">
                        </div>
                    </div>
                </div>
            </header>

            <div class="px-6 lg:px-12 -mt-20">
                <div class="glass-card rounded-custom p-8 lg:p-10 shadow-xl border border-white max-w-7xl mx-auto">
                    <div class="flex items-center justify-between mb-8">
                        <h2 class="text-xl font-extrabold text-slate-800 flex items-center">
                            <span class="w-2 h-8 bg-blue-600 rounded-full mr-3"></span>
                            Statistik Utama
                        </h2>
                    </div>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                        <a href="{{ route('user.list') }}" class="bg-indigo-50 p-6 rounded-[2rem] border border-indigo-100 transition-all hover:shadow-lg hover:-translate-y-1 block">
                            <div class="bg-indigo-600 w-12 h-12 rounded-2xl flex items-center justify-center mb-4 text-white shadow-lg shadow-indigo-200">
                                <i class="fa-solid fa-user-graduate text-xl"></i>
                            </div>
                            <p class="text-xs text-indigo-600 uppercase font-extrabold tracking-wider">Total Mahasiswa</p>
                            <p class="text-3xl font-black text-slate-800 mt-1" id="countUser">--</p>
                        </a>

                        <a href="{{ route('user.lo') }}" class="bg-emerald-50 p-6 rounded-[2rem] border border-emerald-100 transition-all hover:shadow-lg hover:-translate-y-1 block">
                            <div class="bg-emerald-600 w-12 h-12 rounded-2xl flex items-center justify-center mb-4 text-white shadow-lg shadow-emerald-200">
                                <i class="fa-solid fa-shield-heart text-xl"></i>
                            </div>
                            <p class="text-xs text-emerald-600 uppercase font-extrabold tracking-wider">Total LO</p>
                            <p class="text-3xl font-black text-slate-800 mt-1" id="countLO">--</p>
                        </a>

                        <div class="bg-amber-50 p-6 rounded-[2rem] border border-amber-100 transition-all hover:shadow-lg hover:-translate-y-1 cursor-pointer">
                            <div class="bg-amber-500 w-12 h-12 rounded-2xl flex items-center justify-center mb-4 text-white shadow-lg shadow-amber-200">
                                <i class="fa-solid fa-calendar-star text-xl"></i>
                            </div>
                            <p class="text-xs text-amber-600 uppercase font-extrabold tracking-wider">Jadwal Aktif</p>
                            <p class="text-lg font-bold text-slate-800 mt-1 leading-tight">Cek Jadwal Baru</p>
                        </div>

                        <div class="bg-rose-50 p-6 rounded-[2rem] border border-rose-100 transition-all hover:shadow-lg hover:-translate-y-1 cursor-pointer">
                            <div class="bg-rose-500 w-12 h-12 rounded-2xl flex items-center justify-center mb-4 text-white shadow-lg shadow-rose-200">
                                <i class="fa-solid fa-message-captions text-xl"></i>
                            </div>
                            <p class="text-xs text-rose-600 uppercase font-extrabold tracking-wider">Pengumuman</p>
                            <p class="text-lg font-bold text-slate-800 mt-1 leading-tight">Kelola Berita</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex-1 overflow-y-auto px-6 lg:px-12 py-10 max-w-7xl mx-auto w-full pb-32 lg:pb-10">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-bold text-slate-800">Aktivitas Terkini</h3>
                    <span class="px-3 py-1 bg-slate-200 text-slate-600 text-[10px] font-bold rounded-full uppercase">Real-time</span>
                </div>
                
                <div class="grid lg:grid-cols-2 gap-4">
                    <div class="flex items-start p-5 bg-white rounded-3xl border border-slate-100 hover:border-blue-200 transition-all group">
                        <div class="w-12 h-12 shrink-0 bg-slate-100 rounded-2xl flex items-center justify-center text-slate-400 group-hover:bg-blue-600 group-hover:text-white transition-all">
                            <i class="fa-solid fa-user-plus text-lg"></i>
                        </div>
                        <div class="ml-5">
                            <h4 class="font-bold text-slate-800 group-hover:text-blue-600 transition-colors">5 Mahasiswa baru mendaftar</h4>
                            <p class="text-[11px] text-slate-400 font-bold mt-1 uppercase" id="logDate1">Memuat...</p>
                        </div>
                    </div>

                    <div class="flex items-start p-5 bg-white rounded-3xl border border-slate-100 hover:border-blue-200 transition-all group">
                        <div class="w-12 h-12 shrink-0 bg-slate-100 rounded-2xl flex items-center justify-center text-slate-400 group-hover:bg-blue-600 group-hover:text-white transition-all">
                            <i class="fa-solid fa-paper-plane text-lg"></i>
                        </div>
                        <div class="ml-5">
                            <h4 class="font-bold text-slate-800 group-hover:text-blue-600 transition-colors">Draft pengumuman siap rilis</h4>
                            <p class="text-[11px] text-slate-400 font-bold mt-1 uppercase" id="logDate2">Memuat...</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:hidden fixed bottom-6 left-6 right-6 bg-bss-dark/95 backdrop-blur-lg rounded-3xl py-4 px-8 flex justify-between items-center shadow-2xl z-50">
                <a href="{{ route('dashboard') }}" class="text-blue-400"><i class="fa-solid fa-house-chimney text-xl"></i></a>
                <button class="text-slate-500 hover:text-white"><i class="fa-solid fa-calendar text-xl"></i></button>
                <button class="text-slate-500 hover:text-white"><i class="fa-solid fa-bell text-xl"></i></button>
                <a href="{{ route('user.list') }}" class="text-slate-500 hover:text-white"><i class="fa-solid fa-user text-xl"></i></a>
            </div>
        </main>
    </div>

    <script>
        function updateDashboard() {
            const now = new Date();
            const optionsDate = { weekday: 'long', day: '2-digit', month: 'long', year: 'numeric' };
            const dateString = now.toLocaleDateString('id-ID', optionsDate);
            document.getElementById('currentDate').innerText = dateString;
            
            const stats = {
                totalUser: 230,
                totalLO: 12
            };

            animateValue("countUser", 0, stats.totalUser, 1000);
            animateValue("countLO", 0, stats.totalLO, 1000);

            document.getElementById('logDate1').innerText = "Hari ini • 09:45 WITA";
            document.getElementById('logDate2').innerText = "Kemarin • 18:20 WITA";
        }

        function animateValue(id, start, end, duration) {
            const obj = document.getElementById(id);
            let startTimestamp = null;
            const step = (timestamp) => {
                if (!startTimestamp) startTimestamp = timestamp;
                const progress = Math.min((timestamp - startTimestamp) / duration, 1);
                obj.innerHTML = Math.floor(progress * (end - start) + start);
                if (progress < 1) {
                    window.requestAnimationFrame(step);
                }
            };
            window.requestAnimationFrame(step);
        }

        window.onload = updateDashboard;
    </script>
</body>
</html>