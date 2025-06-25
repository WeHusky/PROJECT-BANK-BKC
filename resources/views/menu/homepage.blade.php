@section('content')
@include('layouts.navbar')

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Bank BKC</title>
  <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
  @vite('resources/css/app.css')
  <style>
    .action-btn {
      z-index: 1;
      position: relative;
      font-size: inherit;
      font-family: inherit;
      color: white;
      outline: none;
      border: none;
      background: none; /* remove background if hover is only for icon */
      cursor: pointer;
      display: flex;
      flex-direction: column;
      align-items: center;
      text-align: center;
    }

    /* Style for icon container */
    .icon-hover {
      background-color: white;
      padding: 1em;
      border-radius: 0.75rem;
      width: 75px;
      height: 75px;
      position: relative;
      overflow: hidden;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    /* Hover effect only inside the icon */
    .icon-hover::after {
      content: '';
      position: absolute;
      top: -50%;
      bottom: -50%;
      width: 1.25em;
      background-color: hsla(0, 100%, 100%, 9.2);
      transform: translate3d(-525%, 0, 0) rotate(35deg);
      z-index: 1;
    }

    .icon-hover:hover::after {
      transition: transform 0.45s ease-in-out;
      transform: translate3d(200%, 0, 0) rotate(35deg);
    }

    .icon-hover img {
      position: relative;
      z-index: 1;
    }
  </style>
</head>
<body class="bg-gradient-to-tr from-[#F9FAFB] to-[#E0F2F1] font-sans text-gray-800 mb-20">
  <!-- Header -->
  <div class="flex justify-between items-center px-7 py-8 bg-white mb-5 shadow-sm">
    <h1 class="font-extrabold text-3xl text-[#13545C]">Home Page</h1>
    <div class="relative">
      <a href="{{ route('nasabah.notifications') }}">
        <img class="w-6" src="{{ asset('images/bell.png') }}" alt="">
        @php
          $hasNotifications = $notifications->where('status_notifikasi', false)->count()
        @endphp
        @if ($hasNotifications > 0)
          <span id="notif-badge" class="absolute -bottom-1 -right-1 bg-red-500 text-white text-xs w-4 h-4 flex items-center justify-center rounded-full">{{ $hasNotifications }}</span>
        @endif
      </a>
    </div>
  </div>

    <!-- Card -->
    <div class="px-7 w-full md:max-w-sm mx-auto">
        <div class="bg-white p-4 rounded-[17px] border-gray-200 border">
        <p class="text-[#13545C] mb-2 font-semibold">My Card</p>
        <div class="creditcard-container">
        <div class="relative rounded-[12px] overflow-hidden w-full h-[170px] text-white font-sans shadow-lg"
            @if($nasabah->card_type == 'classic')
                style="background: radial-gradient(circle at center, #0f172a 8%, rgb(80, 80, 80) 57%, #000000 90%);"
            @elseif($nasabah->card_type == 'gold')
                style="background: radial-gradient(circle at center, rgb(212, 151, 20) 8%, rgb(14, 117, 65) 57%, rgb(11, 81, 187) 90%);"
            @elseif($nasabah->card_type == 'red')
                style="background: radial-gradient(circle at center, #0f172a 8%, rgb(187, 28, 28) 57%, #000000 90%);"
            @else
                style="background: radial-gradient(circle at center, #0f172a 8%, rgb(80, 80, 80) 57%, #000000 90%);"
            @endif
        >
            <!-- Background wave -->
            <div class="absolute inset-0 z-0 opacity-100"
                style="background-image: url('{{ asset('images/wave.png') }}'); background-size: 200%; background-position: center;">
            </div>

            <!-- Konten utama kartu -->
            <div class="relative z-10 p-4 flex flex-col justify-between h-full">
                <!-- Baris atas: Logo + Chip -->
                <div class="flex justify-between items-start">
                    <div class="flex items-center">
                        <span class="inline-block w-6 h-6 rounded-full bg-red-600 mr-1" style="box-shadow: 14px 0 0 0 #fbbf24;"></span>
                        <span class="ml-6 text-white font-semibold text-sm">Master Card</span>
                    </div>
                    <img src="{{ asset('images/chip.png') }}" alt="chip" class="h-6 w-10 object-contain" />
                </div>

                <!-- Nomor kartu -->
                <div class="mt-4">
                    <p class="text-xs text-gray-300 mb-1">Card Number</p>
                    <p class="tracking-widest text-base text-gray-100 font-mono break-words">
                        {{ $nasabah->rekening_nasabah }}
                    </p>
                </div>

                <!-- Baris bawah: Nama & Exp -->
                <div class="flex justify-between items-end">
                    <div>
                        <p class="text-sm text-gray-100 font-medium">{{ $nasabah->nama_nasabah }}</p>
                    </div>
                    <div class="text-right">
                        <p class="text-xs text-gray-300 mb-1">Valid Thru</p>
                        <p class="text-sm text-gray-100 font-semibold">05/28</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


        <button class="mt-4 w-full bg-[#29BBCF] hover:bg-cyan-600 text-white font-semibold py-2 rounded-full transition duration-200">View Card Details</button>
      </div>
    </div>
  </div>

  <!-- Actions -->
  <div class="grid grid-cols-2 gap-4 px-7 py-6 text-center text-sm w-full md:max-w-sm mx-auto">
    <button type="button" class="action-btn" onclick="window.location.href='{{ route('nasabah.balance') }}'">
      <div class="bg-violet-100 p-3 rounded-2xl w-[75px] h-[75px] flex justify-center items-center shadow-sm hover:shadow-md">
        <img src="{{ asset('images/balance.png') }}" alt="Balance">
      </div>
      <span class="mt-2 text-gray-700 font-semibold">Balance</span>
    </button>
    <button type="button" class="action-btn" onclick="window.location.href='{{ route('nasabah.loans') }}'">
      <div class="bg-amber-100 p-3 rounded-2xl w-[75px] h-[75px] flex justify-center items-center shadow-sm hover:shadow-md">
        <img src="{{ asset('images/loan.png') }}" alt="Loan">
      </div>
      <span class="mt-2 text-gray-700 font-semibold">Loan</span>
    </button>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/pusher-js@7.2.0/dist/web/pusher.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/laravel-echo@1.15.0/dist/echo.iife.js"></script>
  <script>
    // Ambil userId dari backend (pastikan variabel ini diisi dari controller)
    const userId = @json($nasabah->id_akun);

    window.Echo = new window.Echo({
        broadcaster: 'pusher',
        key: '{{ env('PUSHER_APP_KEY') }}',
        cluster: '{{ env('PUSHER_APP_CLUSTER') }}',
        forceTLS: true
    });

    window.Echo.private('user.' + userId)
        .listen('NewNotification', (e) => {
            // Tambah badge notifikasi
            let badge = document.getElementById('notif-badge');
            if (badge) {
                let count = parseInt(badge.innerText) || 0;
                badge.innerText = count + 1;
                badge.style.display = 'flex';
            } else {
                // Jika badge belum ada, buat baru
                let notifLink = document.querySelector('a[href*="notifications"]');
                let span = document.createElement('span');
                span.id = 'notif-badge';
                span.className = 'absolute -bottom-1 -right-1 bg-red-500 text-white text-xs w-4 h-4 flex items-center justify-center rounded-full';
                span.innerText = 1;
                notifLink.appendChild(span);
            }
            // Optional: tampilkan toast/alert
            showToast(e.notification.deskripsi_notifikasi);
        });

    // Toast sederhana
    function showToast(msg) {
        let toast = document.getElementById('realtime-toast');
        if (!toast) {
            toast = document.createElement('div');
            toast.id = 'realtime-toast';
            toast.className = 'fixed top-5 right-5 bg-[#29BBCF] text-white px-6 py-3 rounded-xl shadow-lg z-50';
            document.body.appendChild(toast);
        }
        toast.innerText = msg;
        toast.style.display = 'block';
        setTimeout(() => { toast.style.display = 'none'; }, 2500);
    }
  </script>
</body>
</html>
