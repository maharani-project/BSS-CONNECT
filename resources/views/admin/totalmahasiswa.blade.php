<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa - BSS Connect</title>
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

        .custom-table thead tr { background-color: #f8fafc; border-bottom: 2px solid #e2e8f0; }
        .custom-table tbody tr { transition: all 0.2s; border-bottom: 1px solid #f1f5f9; }
        .custom-table tbody tr:hover { background-color: #f1f5f9; transform: scale(1.002); }
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
                            <i class="fa-solid fa-grid-2 text-lg opacity-60 group-hover:opacity-100 group-hover:text-blue-400"></i> 
                            <span class="font-medium">Dashboard</span>
                        </a>
                        
                        <a href="{{ route('admin.jadwal.index') }}" class="flex items-center space-x-4 p-4 rounded-2xl hover:bg-slate-800/50 hover:text-slate-100 transition-all group">
                            <i class="fa-solid fa-calendar-check text-lg opacity-60 group-hover:opacity-100 group-hover:text-blue-400"></i> 
                            <span class="font-medium">Jadwal Acara</span>
                        </a>

                        <a href="{{ route('admin.pengumuman.index') }}" class="flex items-center space-x-4 p-4 rounded-2xl hover:bg-slate-800/50 hover:text-slate-100 transition-all group">
                            <i class="fa-solid fa-bullhorn text-lg opacity-60 group-hover:opacity-100 group-hover:text-blue-400"></i> 
                            <span class="font-medium">Pengumuman</span>
                        </a>

                        <a href="{{ route('admin.mahasiswa.index') }}" class="flex items-center space-x-4 bg-gradient-to-r from-blue-600/20 to-transparent text-blue-400 p-4 rounded-2xl border-l-4 border-blue-500 shadow-sm transition-all group">
                            <i class="fa-solid fa-users-gear text-lg"></i> 
                            <span class="font-bold">Daftar Mahasiswa</span>
                        </a>

                        <a href="{{ route('admin.lo.index') }}" class="flex items-center space-x-4 p-4 rounded-2xl hover:bg-slate-800/50 hover:text-slate-100 transition-all group">
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
            <header class="bg-bss-gradient pt-10 pb-28 px-6 lg:px-12 text-white">
                <div class="max-w-7xl mx-auto flex flex-col md:flex-row md:items-center justify-between gap-4">
                    <div>
                        <h1 class="text-3xl font-extrabold tracking-tight">Daftar Mahasiswa</h1>
                        <p class="text-blue-100/60 text-sm mt-1 uppercase tracking-widest font-bold">Manajemen Peserta BSS Connect</p>
                    </div>
                    
                    <div class="relative group">
                        <i class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-blue-300 group-focus-within:text-white transition-colors"></i>
                        <input type="text" placeholder="Cari Nama atau NIM..." 
                               class="bg-white/10 border border-white/20 text-white placeholder:text-blue-200/50 rounded-2xl py-3 pl-12 pr-6 w-full md:w-80 focus:outline-none focus:ring-2 focus:ring-white/30 backdrop-blur-md transition-all">
                    </div>
                </div>
            </header>

            <div class="px-6 lg:px-12 -mt-16 flex-1 overflow-hidden flex flex-col">
                <div class="glass-card rounded-custom shadow-xl border border-white flex flex-col max-w-7xl mx-auto w-full mb-6 overflow-hidden">
                    
                    <div class="p-6 border-b border-slate-100 flex flex-wrap items-center justify-between gap-4">
                        <div class="flex items-center gap-2">
                            <span class="bg-blue-100 text-blue-600 px-4 py-1.5 rounded-full text-xs font-bold">Total: {{ count($list_user) }} Mahasiswa</span>
                        </div>
                        <div class="flex gap-3">
                            <button class="bg-slate-100 hover:bg-slate-200 text-slate-700 px-4 py-2.5 rounded-xl text-sm font-bold transition-all flex items-center gap-2">
                                <i class="fa-solid fa-filter"></i> Filter
                            </button>
                            <button class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-xl text-sm font-bold shadow-lg shadow-blue-500/30 transition-all flex items-center gap-2">
                                <i class="fa-solid fa-plus"></i> Tambah Mahasiswa
                            </button>
                        </div>
                    </div>

                    <div class="flex-1 overflow-auto">
                        <table class="w-full text-left custom-table border-collapse">
                            <thead class="sticky top-0 z-10">
                                <tr>
                                    <th class="px-6 py-4 text-xs uppercase font-black text-slate-500 tracking-wider">Mahasiswa</th>
                                    <th class="px-6 py-4 text-xs uppercase font-black text-slate-500 tracking-wider">NIM</th>
                                    <th class="px-6 py-4 text-xs uppercase font-black text-slate-500 tracking-wider">Program Studi</th>
                                    <th class="px-6 py-4 text-xs uppercase font-black text-slate-500 tracking-wider">Status</th>
                                    <th class="px-6 py-4 text-xs uppercase font-black text-slate-500 tracking-wider text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-slate-700">
                                @foreach($list_user as $user)
                                <tr>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <div class="w-10 h-10 rounded-xl bg-blue-100 flex items-center justify-center text-blue-600 font-bold">
                                                {{ substr($user->name, 0, 2) }}
                                            </div>
                                            <div>
                                                <p class="font-bold text-slate-800">{{ $user->name }}</p>
                                                <p class="text-[10px] text-slate-400 font-medium">{{ $user->email }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 font-semibold text-sm">{{ $user->nim ?? '-' }}</td>
                                    <td class="px-6 py-4 text-sm">{{ $user->prodi ?? '-' }}</td>
                                    <td class="px-6 py-4">
                                        <span class="px-3 py-1 bg-emerald-100 text-emerald-600 text-[10px] font-black rounded-full uppercase">Aktif</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex justify-center gap-2">
                                            <button class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-600 hover:text-white transition-all">
                                                <i class="fa-solid fa-pen-to-square text-xs"></i>
                                            </button>
                                            <button class="w-8 h-8 rounded-lg bg-rose-50 text-rose-600 hover:bg-rose-600 hover:text-white transition-all">
                                                <i class="fa-solid fa-trash text-xs"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="lg:hidden fixed bottom-6 left-6 right-6 bg-bss-dark/95 backdrop-blur-lg rounded-3xl py-4 px-8 flex justify-between items-center shadow-2xl z-50">
                <a href="{{ route('admin.dashboard') }}" class="text-slate-500"><i class="fa-solid fa-house-chimney text-xl"></i></a>
                <button class="text-slate-500 hover:text-white"><i class="fa-solid fa-calendar text-xl"></i></button>
                <button class="text-slate-500 hover:text-white"><i class="fa-solid fa-bell text-xl"></i></button>
                <a href="{{ route('admin.mahasiswa.index') }}" class="text-blue-400"><i class="fa-solid fa-user text-xl"></i></a>
            </div>
        </main>
    </div>

</body>
</html>