<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BSS Connect - Jadwal Acara</title>
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

        .active-menu {
            background: linear-gradient(to right, rgba(37, 99, 235, 0.2), transparent);
            color: #60a5fa;
            border-left: 4px solid #3b82f6;
        }

        /* Timeline Dot Connector */
        .timeline-line::before {
            content: '';
            position: absolute;
            left: 20px;
            top: 0;
            bottom: 0;
            width: 2px;
            background: #e2e8f0;
            z-index: 0;
        }
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
                    <p class="px-4 text-[10px] font-bold text-slate-500 uppercase tracking-[0.2em] mb-4">Menu Utama</p>
                    <nav class="space-y-1">
                        <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-4 p-4 rounded-2xl hover:bg-slate-800/50 hover:text-slate-100 transition-all group">
                            <i class="fa-solid fa-grid-2 text-lg opacity-60 group-hover:opacity-100"></i> 
                            <span class="font-medium">Dashboard</span>
                        </a>
                        
                        <a href="{{ route('admin.jadwal.index') }}" class="flex items-center space-x-4 active-menu p-4 rounded-2xl transition-all group">
                            <i class="fa-solid fa-calendar-check text-lg text-blue-400"></i> 
                            <span class="font-bold text-blue-400">Jadwal Acara</span>
                        </a>

                        <a href="{{ route('admin.pengumuman.index') }}" class="flex items-center space-x-4 p-4 rounded-2xl hover:bg-slate-800/50 hover:text-slate-100 transition-all group">
                            <i class="fa-solid fa-bullhorn text-lg opacity-60 group-hover:opacity-100"></i> 
                            <span class="font-medium">Pengumuman</span>
                        </a>

                        <a href="{{ route('admin.mahasiswa.index') }}" class="flex items-center space-x-4 p-4 rounded-2xl hover:bg-slate-800/50 hover:text-slate-100 transition-all group">
                            <i class="fa-solid fa-users-gear text-lg opacity-60 group-hover:opacity-100"></i> 
                            <span class="font-medium">Daftar Mahasiswa</span>
                        </a>

                        <a href="{{ route('admin.lo.index') }}" class="flex items-center space-x-4 p-4 rounded-2xl hover:bg-slate-800/50 hover:text-slate-100 transition-all group">
                            <i class="fa-solid fa-user-shield text-lg opacity-60 group-hover:opacity-100"></i> 
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
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">@csrf</form>
                <button onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
                        class="flex items-center justify-center space-x-3 p-4 w-full rounded-2xl bg-red-500/5 text-red-400 border border-red-500/10 hover:bg-red-500 hover:text-white transition-all group">
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
                        <h1 class="text-3xl lg:text-4xl font-extrabold tracking-tight">Jadwal Acara <span class="text-blue-300">📅</span></h1>
                        <p class="text-blue-100/60 text-sm mt-1 uppercase tracking-widest font-bold">Agenda & Rundown PKKMB 2026</p>
                    </div>
                    
                    <button class="bg-white text-blue-700 px-6 py-3 rounded-2xl font-bold text-sm shadow-xl shadow-blue-900/20 hover:scale-105 transition-all flex items-center gap-2">
                        <i class="fa-solid fa-calendar-plus"></i>
                        Tambah Agenda
                    </button>
                </div>
            </header>

            <div class="px-6 lg:px-12 -mt-20 flex-1 overflow-hidden flex flex-col pb-8">
                <div class="glass-card rounded-custom shadow-xl border border-white max-w-7xl mx-auto w-full flex flex-col h-full overflow-hidden">
                    
                    <div class="p-6 border-b border-slate-100 flex gap-4 overflow-x-auto no-scrollbar bg-white/50">
                        <button class="px-6 py-3 bg-blue-600 text-white rounded-2xl font-bold text-sm shadow-lg shadow-blue-200 transition-all whitespace-nowrap">Hari 1 - 24 April</button>
                        <button class="px-6 py-3 bg-slate-50 text-slate-400 border border-slate-100 rounded-2xl font-bold text-sm hover:bg-white hover:text-blue-600 transition-all whitespace-nowrap">Hari 2 - 25 April</button>
                        <button class="px-6 py-3 bg-slate-50 text-slate-400 border border-slate-100 rounded-2xl font-bold text-sm hover:bg-white hover:text-blue-600 transition-all whitespace-nowrap">Hari 3 - 26 April</button>
                    </div>

                    <div class="flex-1 overflow-y-auto p-8 relative timeline-line">
                        
                        <div class="relative flex items-start mb-10 group">
                            <div class="z-10 w-10 h-10 rounded-full bg-blue-600 border-4 border-blue-100 flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform">
                                <i class="fa-solid fa-clock text-white text-[10px]"></i>
                            </div>
                            <div class="ml-8 bg-white border-l-4 border-blue-500 rounded-3xl p-6 shadow-sm hover:shadow-md transition-all flex-1">
                                <div class="flex flex-col md:flex-row justify-between md:items-center gap-4">
                                    <div>
                                        <div class="flex items-center gap-2 mb-1">
                                            <span class="px-2 py-0.5 bg-blue-50 text-blue-600 text-[10px] font-black uppercase rounded-md">Sedang Berlangsung</span>
                                            <span class="text-xs font-bold text-slate-400 tracking-wider">08:00 - 09:30 WITA</span>
                                        </div>
                                        <h3 class="text-xl font-extrabold text-slate-800">Pembukaan & Sambutan Rektor</h3>
                                        <p class="text-sm text-slate-500 mt-1 italic"><i class="fa-solid fa-location-dot mr-1"></i> Auditorium Utama Lt. 3</p>
                                    </div>
                                    <div class="flex gap-2">
                                        <button class="w-10 h-10 rounded-xl bg-slate-50 text-slate-400 hover:bg-amber-50 hover:text-amber-600 transition-all flex items-center justify-center"><i class="fa-solid fa-pen-to-square text-sm"></i></button>
                                        <button class="w-10 h-10 rounded-xl bg-slate-50 text-slate-400 hover:bg-rose-50 hover:text-rose-600 transition-all flex items-center justify-center"><i class="fa-solid fa-trash-can text-sm"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="relative flex items-start mb-10 group">
                            <div class="z-10 w-10 h-10 rounded-full bg-slate-200 border-4 border-white flex items-center justify-center group-hover:bg-blue-200 transition-colors">
                                <i class="fa-solid fa-circle text-slate-400 text-[6px]"></i>
                            </div>
                            <div class="ml-8 bg-white border border-slate-100 rounded-3xl p-6 shadow-sm hover:shadow-md transition-all flex-1">
                                <div class="flex flex-col md:flex-row justify-between md:items-center gap-4">
                                    <div>
                                        <div class="flex items-center gap-2 mb-1">
                                            <span class="text-xs font-bold text-slate-400 tracking-wider">09:45 - 11:30 WITA</span>
                                        </div>
                                        <h3 class="text-xl font-extrabold text-slate-800">Materi Kesadaran Bela Negara</h3>
                                        <p class="text-sm text-slate-500 mt-1 italic"><i class="fa-solid fa-user-tie mr-1"></i> Pemateri: Letkol Inf. Sudirman</p>
                                    </div>
                                    <div class="flex gap-2">
                                        <button class="w-10 h-10 rounded-xl bg-slate-50 text-slate-400 hover:bg-amber-50 hover:text-amber-600 transition-all flex items-center justify-center"><i class="fa-solid fa-pen-to-square text-sm"></i></button>
                                        <button class="w-10 h-10 rounded-xl bg-slate-50 text-slate-400 hover:bg-rose-50 hover:text-rose-600 transition-all flex items-center justify-center"><i class="fa-solid fa-trash-can text-sm"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="relative flex items-start mb-10 group">
                            <div class="z-10 w-10 h-10 rounded-full bg-emerald-100 border-4 border-white flex items-center justify-center">
                                <i class="fa-solid fa-utensils text-emerald-600 text-xs"></i>
                            </div>
                            <div class="ml-8 bg-emerald-50/30 border border-emerald-100 border-dashed rounded-3xl p-6 flex-1">
                                <div class="flex flex-col md:flex-row justify-between md:items-center gap-4">
                                    <div>
                                        <div class="flex items-center gap-2 mb-1">
                                            <span class="text-xs font-bold text-emerald-600 tracking-wider uppercase">Break Time</span>
                                            <span class="text-xs font-bold text-slate-400 tracking-wider">12:00 - 13:00 WITA</span>
                                        </div>
                                        <h3 class="text-lg font-bold text-slate-700 uppercase">Ishoma (Istirahat, Sholat, Makan)</h3>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="p-6 border-t border-slate-100 bg-slate-50/50 flex justify-between items-center">
                        <button class="text-xs font-bold text-blue-600 hover:underline"><i class="fa-solid fa-download mr-1"></i> Unduh PDF Rundown</button>
                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Update terakhir: 2 menit yang lalu</p>
                    </div>
                </div>
            </div>

            <div class="lg:hidden fixed bottom-6 left-6 right-6 bg-bss-dark/95 backdrop-blur-lg rounded-3xl py-4 px-8 flex justify-between items-center shadow-2xl z-50">
                <a href="{{ route('admin.dashboard') }}" class="text-slate-500"><i class="fa-solid fa-house-chimney text-xl"></i></a>
                <a href="{{ route('admin.jadwal.index') }}" class="text-blue-400"><i class="fa-solid fa-calendar text-xl"></i></a>
                <a href="{{ route('admin.pengumuman.index') }}" class="text-slate-500"><i class="fa-solid fa-bullhorn text-xl"></i></a>
                <a href="{{ route('admin.lo.index') }}" class="text-slate-500"><i class="fa-solid fa-user-shield text-xl"></i></a>
            </div>
        </main>
    </div>

    <script>
        // Set Current Date
        const now = new Date();
        const options = { weekday: 'long', day: '2-digit', month: 'long', year: 'numeric' };
        document.getElementById('currentDate').innerText = now.toLocaleDateString('id-ID', options);
    </script>
</body>
</html>