<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'Dashboard Anggota')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
            background: #f5f5f5;
        }

        /* SIDEBAR */
        .sidebar {
            width: 250px;
            background: #7b4b2a;
            color: white;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 20px;
        }

        .logo {
            font-weight: bold;
            font-size: 18px;
            margin-bottom: 30px;
            text-align: center;
        }

        .menu a {
            display: block;
            color: white;
            text-decoration: none;
            padding: 12px;
            margin-bottom: 10px;
            border-radius: 8px;
            transition: 0.3s;
        }

        .menu a:hover {
            background: #a86b45;
        }

        .active {
            background: #a86b45;
        }

        /* Logout */
        .logout-btn {
            background: #ff4d4f;
            border: none;
            color: white;
            cursor: pointer;
            padding: 10px;
            width: 100%;
            border-radius: 8px;
            font-weight: bold;
        }

        .logout-btn:hover {
            background: #e33f3f;
        }

        /* MAIN */
        .main {
            flex: 1;
            padding: 20px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .user {
            font-weight: bold;
        }

    </style>

</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar">

        <div>

            <div class="logo">
                📚 Perpustakaan Digital
            </div>

            <div class="menu">

                <a href="{{ route('anggota.dashboard') }}">
                    🏠 Dashboard
                </a>

                <a href="{{ route('anggota.buku') }}">
                    📖 Buku
                </a>

                <a href="{{ route('anggota.pinjam') }}">
                    📚 Buku Dipinjam
                </a>

                <a href="{{ route('anggota.riwayat') }}">
                    🕒 Riwayat
                </a>

            </div>

        </div>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="logout-btn">
                🔌 Logout
            </button>
        </form>

    </div>

    <!-- Main -->
    <div class="main">

        <div class="topbar">

            <div>
                @yield('title')
            </div>

            <div class="user">
                👤 {{ auth()->user()->name }}
            </div>

        </div>

        @yield('content')

    </div>

</body>

</html>
