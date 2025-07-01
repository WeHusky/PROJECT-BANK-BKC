@section('content')
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link rel="stylesheet" href="{{ asset('css/animation.css') }}">
    @vite('resources/css/app.css')
    <style>
      .menu{
        animation: fadeIn 0.5s ease;
      }
      @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
      }
    </style>
</head>
<body class="bg-white-100 font-sans mb-20">
  <!-- Header -->
  <div class="flex px-7 py-8 bg-white items-center mb-5 shadow-sm">
    <button class="mr-3 pop" onclick="window.history.back()">
        <img src="{{ asset('images/arrowblue.png') }}" alt="">
    </button>
    <h1 class="font-extrabold text-3xl text-[#13545C]">Balance</h1>
  </div>

  <!-- Main Content -->
  <div class="px-7">
    <div class="bg-gradient-to-t from-[#32b1c2] to-[#29BBCF] border-md border-[#29BBCF] px-4 pb-8 pt-4 rounded-xl shadow-md">
      <h1 class="text-lg text-white font-bold">Current Balance</h1>
      <div class="flex items-center">
        <p class="text-white text-3xl mr-3">Rp {{ number_format($nasabah->saldo_nasabah, 0, '.', '.') }}</p>
        <button class="bg-white w-8 h-8 shadow-md rounded-full flex items-center justify-center">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="[filter: brightness(0) saturate(100%) invert(62%) sepia(62%) saturate(7061%) hue-rotate(335deg) brightness(102%) contrast(101%)]">
            <path d="M15 12c0 1.654-1.346 3-3 3s-3-1.346-3-3 1.346-3 3-3 3 1.346 3 3zm9-.449s-4.252 8.449-11.985 8.449c-7.18 0-12.015-8.449-12.015-8.449s4.446-7.551 12.015-7.551c7.694 0 11.985 7.551 11.985 7.551zm-7 .449c0-2.757-2.243-5-5-5s-5 2.243-5 5 2.243 5 5 5 5-2.243 5-5z"/>
          </svg>
        </button>
      </div>
      
    </div>
  </div>
</body>
</html>