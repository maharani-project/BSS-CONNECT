<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BSS Connect - LO Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .bg-bss-dark { background-color: #0f172a; }
        .bg-bss-gradient { background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%); }
        .glass-card { background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); }
        .rounded-custom { border-radius: 2.5rem; }
    </style>
</head>

<body class="bg-slate-50">

<div class="min-h-screen flex">

    <!-- SIDEBAR LO -->
    <aside class="w-72 bg-bss-dark text-slate-400 p-6">
        <h1 class="text-white font-bold text-xl mb-10">BSS CONNECT</h1>

        <nav class="space-y-3">
            <a href="{{ route('lo.dashboard') }}" class="block text-blue-400 font-bold">Dashboard</a>
            <a href="#" class="block hover:text-white">Mahasiswa</a>
            <a href="#" class="block hover:text-white">Jadwal</a>
            <a href="#" class="block hover:text-white">Pengumuman</a>
        </nav>

        <!-- LOGOUT -->
        <form action="{{ route('logout') }}" method="POST" class="mt-10">
            @csrf
            <button class="bg-red-500 text-white px-4 py-2 rounded w-full">
                Logout
            </button>
        </form>
    </aside>

    <!-- MAIN -->
    <main class="flex-1">

        <!-- HEADER -->
        <header class="bg-bss-gradient text-white p-10">
            <h1 class="text-3xl font-bold">
                Halo, LO 👋
            </h1>
            <p class="text-sm opacity-80">
                Dashboard Liaison Officer
            </p>
        </header>

        <!-- CONTENT -->
        <div class="p-10">

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <div class="bg-white p-6 rounded-2xl shadow">
                    <h3 class="font-bold text-gray-700">Mahasiswa Dibimbing</h3>
                    <p class="text-3xl font-bold mt-2">25</p>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow">
                    <h3 class="font-bold text-gray-700">Jadwal Hari Ini</h3>
                    <p class="text-3xl font-bold mt-2">3</p>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow">
                    <h3 class="font-bold text-gray-700">Pengumuman</h3>
                    <p class="text-3xl font-bold mt-2">5</p>
                </div>

            </div>

        </div>

    </main>

</div>

</body>
</html>