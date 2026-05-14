{{-- resources/views/lo/profile/activity.blade.php --}}

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>BSS Connect - Aktivitas LO</title>

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

        .activity-card{
            transition:.25s ease;
        }

        .activity-card:hover{
            transform:translateY(-4px);
            box-shadow:0 15px 35px rgba(0,0,0,0.08);
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
                Riwayat Sistem
            </p>

            <h1 class="text-3xl lg:text-4xl font-extrabold">
                Aktivitas Akun
            </h1>

            <p class="tracking-[3px] text-[11px] mt-2 opacity-70 uppercase">
                Activity History
            </p>

        </div>

        <!-- CONTENT -->
        <div class="px-4 lg:px-10 -mt-20 relative z-10">

            <div class="bg-white mobile-card card-shadow p-6 lg:p-8 max-w-6xl mx-auto">

                <!-- TOP PROFILE -->
                <div class="profile-card bg-gradient-to-r from-[#17337a] to-[#1f3f99] rounded-[30px] p-8 text-white mb-8">

                    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">

                        <div class="flex items-center gap-5">

                            <div class="w-28 h-28 rounded-full bg-white/20 p-2 backdrop-blur">

                                <img src="https://api.dicebear.com/7.x/avataaars/svg?seed={{ $user->name }}"
                                     class="w-full h-full rounded-full bg-white object-cover">

                            </div>

                            <div>

                                <h2 class="text-3xl font-extrabold">
                                    Riwayat Aktivitas
                                </h2>

                                <p class="mt-2 text-sm opacity-80">
                                    Semua aktivitas akun LO akan tercatat otomatis
                                </p>

                                <div class="flex items-center gap-2 mt-4">

                                    <span class="bg-white/20 px-4 py-2 rounded-2xl text-xs">
                                        <i class="fa-solid fa-clock-rotate-left mr-1"></i>
                                        Monitoring Aktivitas
                                    </span>

                                    <span class="bg-green-400/20 text-green-100 px-4 py-2 rounded-2xl text-xs">
                                        <i class="fa-solid fa-shield-halved mr-1"></i>
                                        Sistem Aktif
                                    </span>

                                </div>

                            </div>

                        </div>

                        <div class="flex gap-3">

                            <a href="{{ route('lo.profile') }}"
                               class="bg-white text-[#17337a] px-5 py-3 rounded-2xl text-sm font-bold hover:scale-105 transition">

                                <i class="fa-solid fa-user mr-2"></i>
                                Kembali Profil

                            </a>

                        </div>

                    </div>

                </div>

                <!-- ACTIVITY LIST -->
                <div class="space-y-5">

                    @forelse($activities as $activity)

                        <div class="activity-card bg-[#f8fafc] border border-gray-100 rounded-3xl p-5">

                            <div class="flex items-start gap-4">

                                <!-- ICON -->
                                <div class="w-14 h-14 rounded-2xl
                                    @if($activity->type == 'jadwal') bg-blue-100
                                    @elseif($activity->type == 'pengumuman') bg-yellow-100
                                    @elseif($activity->type == 'profile') bg-green-100
                                    @else bg-red-100
                                    @endif
                                    flex items-center justify-center">

                                    @if($activity->type == 'jadwal')
                                        <i class="fa-solid fa-calendar-days text-blue-600 text-xl"></i>

                                    @elseif($activity->type == 'pengumuman')
                                        <i class="fa-solid fa-bullhorn text-yellow-600 text-xl"></i>

                                    @elseif($activity->type == 'profile')
                                        <i class="fa-solid fa-user-pen text-green-600 text-xl"></i>

                                    @else
                                        <i class="fa-solid fa-clock text-red-500 text-xl"></i>
                                    @endif

                                </div>

                                <!-- CONTENT -->
                                <div class="flex-1">

                                    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-2">

                                        <h3 class="font-extrabold text-lg text-gray-800">
                                            {{ $activity->title }}
                                        </h3>

                                        <span class="text-xs bg-[#17337a]/10 text-[#17337a] px-4 py-2 rounded-2xl font-semibold w-fit">

                                            {{ $activity->created_at->diffForHumans() }}

                                        </span>

                                    </div>

                                    <p class="text-sm text-gray-500 mt-2">
                                        {{ $activity->description }}
                                    </p>

                                </div>

                            </div>

                        </div>

                    @empty

                        <div class="bg-[#f8fafc] border border-dashed border-gray-200 rounded-3xl p-10 text-center">

                            <div class="w-20 h-20 rounded-full bg-gray-100 flex items-center justify-center mx-auto mb-5">

                                <i class="fa-solid fa-clock-rotate-left text-3xl text-gray-400"></i>

                            </div>

                            <h3 class="text-2xl font-extrabold text-gray-700">
                                Belum Ada Aktivitas
                            </h3>

                            <p class="text-gray-500 mt-3">
                                Aktivitas akun LO akan muncul di sini
                            </p>

                        </div>

                    @endforelse

                </div>

                <!-- ACTION -->
                <div class="mt-10 flex flex-col lg:flex-row gap-4 justify-center">

                    <a href="{{ route('lo.profile') }}"
                       class="bg-[#17337a] hover:bg-[#12285f] text-white px-6 py-3 rounded-2xl font-semibold text-sm text-center transition">

                        <i class="fa-solid fa-user mr-2"></i>
                        Kembali ke Profil

                    </a>

                    <a href="{{ route('lo.dashboard') }}"
                       class="bg-white border border-gray-200 hover:bg-gray-100 text-gray-700 px-6 py-3 rounded-2xl font-semibold text-sm text-center transition">

                        <i class="fa-solid fa-house mr-2"></i>
                        Dashboard

                    </a>

                </div>

            </div>

        </div>

    </main>

</div>

</body>
</html>