<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BSS Connect - Data Panitia & LO</title>
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
                        
                        <a href="{{ route('admin.jadwal.index') }}" class="flex items-center space-x-4 p-4 rounded-2xl hover:bg-slate-800/50 hover:text-slate-100 transition-all group">
                            <i class="fa-solid fa-calendar-check text-lg opacity-60 group-hover:opacity-100"></i> 
                            <span class="font-medium">Jadwal Acara</span>
                        </a>

                        <a href="{{ route('admin.pengumuman.index') }}" class="flex items-center space-x-4 p-4 rounded-2xl hover:bg-slate-800/50 hover:text-slate-100 transition-all group">
                            <i class="fa-solid fa-bullhorn text-lg opacity-60 group-hover:opacity-100"></i> 
                            <span class="font-medium">Pengumuman</span>
                        </a>

                        <a href="{{ route('admin.mahasiswa.index') }}" class="flex items-center space-x-4 p-4 rounded-2xl hover:bg-slate-800/50 hover:text-slate-100 transition-all group">
                            <i class="fa-solid fa-users-gear text-lg opacity-60 group-hover:opacity-100"></i> 
                            <span class="font-medium">Daftar Mahasiswa</span>
                        </a>

                        <a href="{{ route('admin.lo.index') }}" class="flex items-center space-x-4 active-menu p-4 rounded-2xl transition-all group">
                            <i class="fa-solid fa-user-shield text-lg text-blue-400"></i> 
                            <span class="font-bold text-blue-400">Data Panitia/LO</span>
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
                        <h1 class="text-3xl lg:text-4xl font-extrabold tracking-tight">Data Panitia/LO <span class="text-blue-300">🛡️</span></h1>
                        <p class="text-blue-100/60 text-sm mt-1 uppercase tracking-widest font-bold">Liaison Officer & Staff Panitia</p>
                    </div>
                    
                    <button class="bg-white text-blue-700 px-6 py-3 rounded-2xl font-bold text-sm shadow-xl shadow-blue-900/20 hover:scale-105 transition-all flex items-center gap-2">
                        <i class="fa-solid fa-user-plus"></i>
                        Tambah Panitia
                    </button>
                </div>
            </header>

            <div class="px-6 lg:px-12 -mt-20 flex-1 overflow-hidden flex flex-col pb-8">
                <div class="glass-card rounded-custom shadow-xl border border-white max-w-7xl mx-auto w-full flex flex-col h-full overflow-hidden">
                    
                    <div class="p-6 border-b border-slate-100 flex flex-col md:flex-row gap-4 justify-between items-center bg-white/50">
                        <div class="relative w-full md:w-96">
                            <i class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                            <input type="text" placeholder="Cari nama atau ID panitia..." 
                                class="w-full pl-12 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all text-sm">
                        </div>
                        <div class="flex gap-2">
                            <button class="px-4 py-2 bg-slate-100 text-slate-600 rounded-xl text-xs font-bold hover:bg-slate-200 transition-all"><i class="fa-solid fa-filter mr-2"></i>Filter Divisi</button>
                            <button class="px-4 py-2 bg-blue-50 text-blue-600 rounded-xl text-xs font-bold hover:bg-blue-100 transition-all"><i class="fa-solid fa-file-export mr-2"></i>Export</button>
                        </div>
                    </div>

                    <div class="flex-1 overflow-y-auto p-8">
                        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
                            
                            <div class="bg-white rounded-[2.5rem] p-6 border border-slate-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group">
                                <div class="flex justify-between items-start mb-4">
                                    <div class="w-16 h-16 rounded-2xl bg-blue-100 p-1">
                                        <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Ahmad" class="w-full h-full rounded-xl object-cover">
                                    </div>
                                    <span class="px-3 py-1 bg-emerald-50 text-emerald-600 text-[10px] font-black uppercase rounded-lg">Online</span>
                                </div>
                                <h3 class="font-extrabold text-slate-800 text-lg group-hover:text-blue-600 transition-colors">Ahmad Subardjo</h3>
                                <p class="text-xs text-slate-400 font-bold uppercase tracking-wider mb-4">LO - Kelompok 01 (Garuda)</p>
                                
                                <div class="space-y-3 mb-6">
                                    <div class="flex items-center text-slate-500 text-sm">
                                        <i class="fa-solid fa-envelope w-6 text-blue-500/50"></i>
                                        <span class="text-xs truncate">ahmad.s@bssconnect.com</span>
                                    </div>
                                    <div class="flex items-center text-slate-500 text-sm">
                                        <i class="fa-solid fa-phone w-6 text-blue-500/50"></i>
                                        <span class="text-xs">+62 812-3456-7890</span>
                                    </div>
                                </div>

                                <div class="flex gap-2">
                                    <button class="flex-1 py-3 bg-slate-50 text-slate-600 rounded-2xl text-xs font-bold hover:bg-blue-600 hover:text-white transition-all shadow-sm">Detail</button>
                                    <button class="w-12 h-12 flex items-center justify-center bg-rose-50 text-rose-500 rounded-2xl hover:bg-rose-500 hover:text-white transition-all"><i class="fa-solid fa-trash-can text-sm"></i></button>
                                </div>
                            </div>

                            <div class="bg-white rounded-[2.5rem] p-6 border border-slate-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group">
                                <div class="flex justify-between items-start mb-4">
                                    <div class="w-16 h-16 rounded-2xl bg-purple-100 p-1">
                                        <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Siti" class="w-full h-full rounded-xl object-cover">
                                    </div>
                                    <span class="px-3 py-1 bg-slate-100 text-slate-400 text-[10px] font-black uppercase rounded-lg">Offline</span>
                                </div>
                                <h3 class="font-extrabold text-slate-800 text-lg group-hover:text-blue-600 transition-colors">Siti Aminah</h3>
                                <p class="text-xs text-slate-400 font-bold uppercase tracking-wider mb-4">LO - Kelompok 02 (Merpati)</p>
                                
                                <div class="space-y-3 mb-6">
                                    <div class="flex items-center text-slate-500 text-sm">
                                        <i class="fa-solid fa-envelope w-6 text-blue-500/50"></i>
                                        <span class="text-xs truncate">siti.a@bssconnect.com</span>
                                    </div>
                                    <div class="flex items-center text-slate-500 text-sm">
                                        <i class="fa-solid fa-phone w-6 text-blue-500/50"></i>
                                        <span class="text-xs">+62 857-9876-5432</span>
                                    </div>
                                </div>

                                <div class="flex gap-2">
                                    <button class="flex-1 py-3 bg-slate-50 text-slate-600 rounded-2xl text-xs font-bold hover:bg-blue-600 hover:text-white transition-all shadow-sm">Detail</button>
                                    <button class="w-12 h-12 flex items-center justify-center bg-rose-50 text-rose-500 rounded-2xl hover:bg-rose-500 hover:text-white transition-all"><i class="fa-solid fa-trash-can text-sm"></i></button>
                                </div>
                            </div>

                            <button class="border-2 border-dashed border-slate-200 rounded-[2.5rem] p-6 flex flex-col items-center justify-center text-slate-400 hover:border-blue-400 hover:text-blue-500 transition-all group">
                                <div class="w-16 h-16 rounded-full bg-slate-50 flex items-center justify-center mb-4 group-hover:bg-blue-50 transition-all">
                                    <i class="fa-solid fa-plus text-2xl"></i>
                                </div>
                                <span class="font-bold text-sm uppercase tracking-widest">Tambah Personel Baru</span>
                            </button>

                        </div>
                    </div>

                    <div class="p-6 border-t border-slate-100 bg-slate-50/50 flex justify-between items-center">
                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Total Terdaftar: 12 Personel Panitia</p>
                        <div class="flex gap-2">
                            <button class="w-10 h-10 rounded-xl border border-slate-200 flex items-center justify-center text-slate-400 hover:bg-white transition-all"><i class="fa-solid fa-chevron-left"></i></button>
                            <button class="w-10 h-10 rounded-xl bg-blue-600 text-white font-bold text-xs shadow-lg shadow-blue-200 transition-all">1</button>
                            <button class="w-10 h-10 rounded-xl border border-slate-200 flex items-center justify-center text-slate-400 hover:bg-white transition-all"><i class="fa-solid fa-chevron-right"></i></button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:hidden fixed bottom-6 left-6 right-6 bg-bss-dark/95 backdrop-blur-lg rounded-3xl py-4 px-8 flex justify-between items-center shadow-2xl z-50">
                <a href="{{ route('admin.dashboard') }}" class="text-slate-500"><i class="fa-solid fa-house-chimney text-xl"></i></a>
                <button class="text-slate-500"><i class="fa-solid fa-calendar text-xl"></i></button>
                <a href="{{ route('admin.pengumuman.index') }}" class="text-slate-500"><i class="fa-solid fa-bullhorn text-xl"></i></a>
                <a href="{{ route('admin.lo.index') }}" class="text-blue-400"><i class="fa-solid fa-user-shield text-xl"></i></a>
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