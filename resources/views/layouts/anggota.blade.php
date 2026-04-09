<!DOCTYPE html>
<html>

<head>
    <title>@yield('title', 'Dashboard Anggota')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        poppins: ['Poppins', 'sans-serif']
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-gradient-to-br from-gray-100 to-gray-200 font-poppins">

    <!-- SIDEBAR (FIXED) -->
    <aside class="fixed top-0 left-0 w-64 h-screen bg-[#7b4b2a] text-white flex flex-col justify-between p-5 shadow-2xl">

        <div>

            <!-- LOGO -->
            <div class="text-center font-semibold text-xl mb-10 tracking-wide">
                📚 Perpustakaan
            </div>

            <!-- MENU -->
            <nav class="space-y-3 text-sm">

                <a href="{{ route('anggota.dashboard') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl transition
                    {{ request()->routeIs('anggota.dashboard') ? 'bg-white text-[#7b4b2a] font-semibold shadow' : 'hover:bg-[#a86b45]' }}">
                    🏠 <span>Dashboard</span>
                </a>

                <a href="{{ route('anggota.buku') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl transition
                    {{ request()->routeIs('anggota.buku') ? 'bg-white text-[#7b4b2a] font-semibold shadow' : 'hover:bg-[#a86b45]' }}">
                    📖 <span>Buku</span>
                </a>

                <a href="{{ route('anggota.peminjaman') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl transition
                    {{ request()->routeIs('anggota.peminjaman') ? 'bg-white text-[#7b4b2a] font-semibold shadow' : 'hover:bg-[#a86b45]' }}">
                    📚 <span>Buku Dipinjam</span>
                </a>

                <a href="{{ route('anggota.riwayat') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl transition
                    {{ request()->routeIs('anggota.riwayat') ? 'bg-white text-[#7b4b2a] font-semibold shadow' : 'hover:bg-[#a86b45]' }}">
                    🕒 <span>Riwayat</span>
                </a>

                <a href="{{ route('profile') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl transition
                    {{ request()->routeIs('profile') ? 'bg-white text-[#7b4b2a] font-semibold shadow' : 'hover:bg-[#a86b45]' }}">
                    👤 <span>Profile</span>
                </a>

            </nav>

        </div>

        <!-- LOGOUT -->
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button
                class="w-full bg-red-500 hover:bg-red-600 transition py-2 rounded-xl font-semibold shadow">
                🔌 Logout
            </button>
        </form>

    </aside>

    <!-- MAIN -->
    <main class="ml-64 p-6 min-h-screen">

        <!-- TOPBAR -->
        <div class="flex justify-between items-center mb-8">

            <div>
                <h1 class="text-2xl font-semibold text-gray-700">
                    @yield('title')
                </h1>
                <p class="text-sm text-gray-500">
                    Selamat datang di perpustakaan 📚
                </p>
            </div>

            <div class="flex items-center gap-4">

                <!-- Notif -->
                <div class="bg-white p-3 rounded-full shadow hover:scale-105 transition cursor-pointer">
                    🔔
                </div>

                <!-- USER -->
                <div class="flex items-center gap-3 bg-white px-4 py-2 rounded-xl shadow">
                    <div class="w-8 h-8 bg-[#7b4b2a] text-white flex items-center justify-center rounded-full text-sm">
                        {{ strtoupper(substr(auth()->user()->name,0,1)) }}
                    </div>
                    <span class="text-sm font-semibold text-gray-700">
                        {{ auth()->user()->name }}
                    </span>
                </div>

            </div>

        </div>

        <!-- CONTENT (KOSONG / YIELD) -->
        <div class="bg-white p-6 rounded-2xl shadow-md">
            @yield('content')
        </div>

    </main>

</body>

</html>
