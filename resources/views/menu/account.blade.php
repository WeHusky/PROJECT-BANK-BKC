@section('content')
@include('layouts.navbar')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bank BKC - Account</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link rel="stylesheet" href="{{ asset('css/warna.css') }}">
    @vite('resources/css/app.css')
    <style>
        .glass {
            backdrop-filter: blur(16px) saturate(180%);
            -webkit-backdrop-filter: blur(16px) saturate(180%);
            background-color: rgba(255, 255, 255, 0.75);
            border-radius: 1rem;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .transition-card:hover {
            transform: scale(1.01);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
        }

        .icon-hover {
            transition: all 0.3s ease;
        }

        .icon-hover:hover {
            transform: rotate(8deg) scale(1.1);
        }
    </style>
</head>
<body class="bg-gradient-to-tr from-[#E0F7FA] to-[#FFFFFF] min-h-screen font-sans text-gray-800">
    <!-- Header -->
    <header class="bg-white/80 shadow-sm backdrop-blur sticky top-0 z-10 px-7 py-8 flex justify-between items-center">
        <h1 class="text-3xl font-extrabold text-[#13545C]">Account</h1>
    </header>

    <!-- Profile Section -->
    <section class="px-6 py-8">
        <div class="glass p-6 flex items-center space-x-5 shadow-lg">
            <div class="bg-[#29BBCF] min-w-16 min-h-16 max-w-16 max-h-16 rounded-full flex items-center justify-center text-white font-bold text-2xl shadow">
                {{ $nasabah->nama_nasabah[0] }}
            </div>
            <div>
                <p class="text-lg font-semibold text-black">{{ $nasabah->nama_nasabah }}</p>
                <p class="text-sm text-gray-600">{{ '@' . strtolower($user->username_akun) }}</p>
                <p class="text-sm text-gray-600">{{ $nasabah->nohp_nasabah }}</p>
            </div>
        </div>
    </section>

    <!-- Menu Section -->
    <section class="px-6 pb-10">
        <div class="glass shadow-lg divide-y overflow-hidden">
            <a href="{{ route('nasabah.accountsettings') }}" class="flex items-center px-6 py-5 transition-all active:bg-gray-200">
                <img src="{{ asset('images/settings-svgrepo-com.svg')}}" alt="Settings" class="w-6 h-6 mr-4 black stroke-[5] stroke-black">
                <span class="font-medium text-gray-800 text-base">Account Settings</span>
            </a>

            <form action="{{ route('logout') }}" method="POST" class="mb-0">
                @csrf
                <button type="submit" class="w-full flex items-center px-6 py-5 text-left transition-all active:bg-gray-200">
                    <img src="{{ asset('images/log-out-svgrepo-com.svg') }}" alt="Logout" class="w-6 h-6 mr-4 black">
                    <span class="font-medium text-gray-800 text-base">Log Out</span>
                </button>
            </form>
        </div>
    </section>
</body>
</html>
