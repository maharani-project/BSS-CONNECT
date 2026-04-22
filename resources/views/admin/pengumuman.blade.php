<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BSS Connect - Manajemen Pengumuman</title>
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

                        <a href="{{ route('admin.pengumuman.index') }}" class="flex items-center space-x-4 active-menu p-4 rounded-2xl transition-all group">
                            <i class="fa-solid fa-bullhorn text-lg text-blue-400"></i> 
                            <span class="font-bold text-blue-400">Pengumuman</span>
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
                        <h1 class="text-3xl lg:text-4xl font-extrabold tracking-tight">Pengumuman <span class="text-blue-300">📣</span></h1>
                        <p class="text-blue-100/60 text-sm mt-1 uppercase tracking-widest font-bold">Manajemen Informasi Mahasiswa</p>
                    </div>
                    
                    <button class="bg-white text-blue-700 px-6 py-3 rounded-2xl font-bold text-sm shadow-xl shadow-blue-900/20 hover:scale-105 transition-all flex items-center gap-2">
                        <i class="fa-solid fa-plus"></i>
                        Buat Pengumuman
                    </button>
                </div>
            </header>

            <div class="px-6 lg:px-12 -mt-20 flex-1 overflow-hidden flex flex-col pb-8">
                <div class="glass-card rounded-custom shadow-xl border border-white max-w-7xl mx-auto w-full flex flex-col h-full overflow-hidden">
                    
                    <div class="p-6 border-b border-slate-100 flex flex-col md:flex-row gap-4 justify-between items-center bg-white/50">
                        <div class="relative w-full md:w-96">
                            <i class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                            <input type="text" id="searchInput" placeholder="Cari judul pengumuman..." 
                                class="w-full pl-12 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all text-sm">
                        </div>
                        <div class="flex gap-3">
                            <select class="bg-slate-50 border border-slate-200 rounded-xl px-4 py-2 text-xs font-bold text-slate-600 focus:outline-none cursor-pointer hover:bg-slate-100 transition-all">
                                <option>Semua Kategori</option>
                                <option>Penting</option>
                                <option>Akademik</option>
                                <option>Kegiatan</option>
                            </select>
                        </div>
                    </div>

                    <div class="flex-1 overflow-y-auto px-6 py-4">
                        <table class="w-full text-left border-separate border-spacing-y-3">
                            <thead>
                                <tr class="text-slate-400 text-[10px] uppercase tracking-[0.15em] font-black">
                                    <th class="px-6 py-3">Konten Pengumuman</th>
                                    <th class="px-6 py-3">Kategori</th>
                                    <th class="px-6 py-3">Tanggal</th>
                                    <th class="px-6 py-3">Status</th>
                                    <th class="px-6 py-3 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="announcementTable">
                                <tr class="group hover:-translate-y-1 transition-all duration-300">
                                    <td class="px-6 py-4 bg-white first:rounded-l-3xl border-y border-l border-slate-50 shadow-sm group-hover:shadow-md group-hover:border-blue-100 transition-all">
                                        <div class="flex flex-col">
                                            <span class="font-bold text-slate-800 text-sm group-hover:text-blue-600 transition-colors">Panduan Atribut PKKMB BSS 2026</span>
                                            <span class="text-[11px] text-slate-400 mt-1"><i class="fa-solid fa-user-pen mr-1"></i> Admin Kemahasiswaan</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 bg-white border-y border-slate-50 shadow-sm group-hover:shadow-md transition-all">
                                        <span class="px-3 py-1 bg-rose-50 text-rose-600 text-[10px] font-bold rounded-lg uppercase tracking-wider">Penting</span>
                                    </td>
                                    <td class="px-6 py-4 bg-white border-y border-slate-50 shadow-sm group-hover:shadow-md transition-all">
                                        <span class="text-xs text-slate-600 font-semibold italic">21 April 2026</span>
                                    </td>
                                    <td class="px-6 py-4 bg-white border-y border-slate-50 shadow-sm group-hover:shadow-md transition-all">
                                        <span class="flex items-center text-emerald-600 text-[10px] font-black uppercase tracking-widest">
                                            <span class="w-2 h-2 bg-emerald-500 rounded-full mr-2 animate-pulse"></span>
                                            Published
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 bg-white last:rounded-r-3xl border-y border-r border-slate-50 shadow-sm group-hover:shadow-md transition-all text-center">
                                        <div class="flex justify-center gap-2">
                                            <button class="w-8 h-8 rounded-lg bg-amber-50 text-amber-600 hover:bg-amber-500 hover:text-white transition-all shadow-sm"><i class="fa-solid fa-pen text-[10px]"></i></button>
                                            <button class="w-8 h-8 rounded-lg bg-rose-50 text-rose-600 hover:bg-rose-500 hover:text-white transition-all shadow-sm"><i class="fa-solid fa-trash text-[10px]"></i></button>
                                        </div>
                                    </td>
                                </tr>

                                <tr class="group hover:-translate-y-1 transition-all duration-300">
                                    <td class="px-6 py-4 bg-white first:rounded-l-3xl border-y border-l border-slate-50 shadow-sm group-hover:shadow-md transition-all">
                                        <div class="flex flex-col">
                                            <span class="font-bold text-slate-800 text-sm group-hover:text-blue-600">Jadwal Pengambilan Almamater Gelombang 2</span>
                                            <span class="text-[11px] text-slate-400 mt-1"><i class="fa-solid fa-user-pen mr-1"></i> Logistik BSS</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 bg-white border-y border-slate-50 shadow-sm group-hover:shadow-md">
                                        <span class="px-3 py-1 bg-blue-50 text-blue-600 text-[10px] font-bold rounded-lg uppercase tracking-wider">Kegiatan</span>
                                    </td>
                                    <td class="px-6 py-4 bg-white border-y border-slate-50 shadow-sm group-hover:shadow-md">
                                        <span class="text-xs text-slate-600 font-semibold italic">18 April 2026</span>
                                    </td>
                                    <td class="px-6 py-4 bg-white border-y border-slate-50 shadow-sm group-hover:shadow-md">
                                        <span class="flex items-center text-slate-400 text-[10px] font-black uppercase tracking-widest">
                                            <span class="w-2 h-2 bg-slate-300 rounded-full mr-2"></span>
                                            Draft
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 bg-white last:rounded-r-3xl border-y border-r border-slate-50 shadow-sm group-hover:shadow-md text-center">
                                        <div class="flex justify-center gap-2">
                                            <button class="w-8 h-8 rounded-lg bg-amber-50 text-amber-600 hover:bg-amber-500 hover:text-white transition-all shadow-sm"><i class="fa-solid fa-pen text-[10px]"></i></button>
                                            <button class="w-8 h-8 rounded-lg bg-rose-50 text-rose-600 hover:bg-rose-500 hover:text-white transition-all shadow-sm"><i class="fa-solid fa-trash text-[10px]"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="p-6 border-t border-slate-100 flex justify-between items-center bg-slate-50/50">
                        <p class="text-[10px] font-extrabold text-slate-500 uppercase tracking-widest">Showing 2 Announcements</p>
                        <div class="flex gap-2">
                            <button class="p-2 w-10 h-10 rounded-xl border border-slate-200 text-slate-400 hover:bg-white transition-all flex items-center justify-center"><i class="fa-solid fa-chevron-left text-xs"></i></button>
                            <button class="w-10 h-10 rounded-xl bg-blue-600 text-white font-bold text-xs shadow-lg shadow-blue-200">1</button>
                            <button class="p-2 w-10 h-10 rounded-xl border border-slate-200 text-slate-400 hover:bg-white transition-all flex items-center justify-center"><i class="fa-solid fa-chevron-right text-xs"></i></button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:hidden fixed bottom-6 left-6 right-6 bg-bss-dark/95 backdrop-blur-lg rounded-3xl py-4 px-8 flex justify-between items-center shadow-2xl z-50">
                <a href="{{ route('admin.dashboard') }}" class="text-slate-500"><i class="fa-solid fa-house-chimney text-xl"></i></a>
                <button class="text-slate-500"><i class="fa-solid fa-calendar text-xl"></i></button>
       <a href="{{ route('admin.pengumuman.index') }}" class="text-blue-400"><i class="fa-solid fa-bullhorn text-xl"></i></a>
                <a href="{{ route('admin.mahasiswa.index') }}" class="text-slate-500"><i class="fa-solid fa-user text-xl"></i></a>
            </div>
        </main>
    </div>

    <script>
        // Real-time Date
        const now = new Date();
        const options = { weekday: 'long', day: '2-digit', month: 'long', year: 'numeric' };
        document.getElementById('currentDate').innerText = now.toLocaleDateString('id-ID', options);

        // Simple Search Filter
        document.getElementById('searchInput').addEventListener('keyup', function(e) {
            let text = e.target.value.toLowerCase();
            let rows = document.querySelectorAll('#announcementTable tr');
            
            rows.forEach(row => {
                let title = row.querySelector('.font-bold').innerText.toLowerCase();
                if(title.includes(text)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>
</body>
</html>