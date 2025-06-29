<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>BKC - Notifications</title>
  <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
  <link rel="stylesheet" href="{{ asset('css/notification.css') }}">
  <link rel="stylesheet" href="{{ asset('css/animation.css') }}">
  <script src="//unpkg.com/alpinejs" defer></script>
  @vite('resources/css/app.css')
</head>
<body class="bg-gray-50 font-sans mb-20">
  <!-- Header -->
  <div class="flex px-7 py-8 bg-white mb-5 items-center shadow-sm">
    <a class="mr-3 pop" href="{{ route('nasabah.homepage') }}">
        <img src="{{ asset('images/arrowblue.png') }}" alt="">
    </a>
    <h1 class="font-extrabold text-3xl text-[#13545C]">Notifications</h1>
  </div>
  <!-- Notification List -->
  <div class="notifications px-6">
    @php
      $hasNewNotifications = $notifications->where('status_notifikasi', false)->isNotEmpty();
    @endphp
    @if ($hasNewNotifications)
      <!-- NEW -->
      <div class="bg-[rgb(255,76,76)] w-full h-1 rounded-sm flex justify-center items-center mb-5">
          <div class="bg-[rgb(255,76,76)] w-1/2 h-4 rounded-lg flex justify-center items-center text-white font-semibold">NEW</div>
      </div>
      @foreach ($notifications->sortByDesc('created_at')->where('status_notifikasi', false) as $notification)
        <form action="{{ route('nasabah.notifications') }}" method="POST" class="notification-form">
          @csrf
          <input type="hidden" name="id_notifikasi" value="{{ $notification->id_notifikasi }}">
          <div 
            x-data="{ open: false }"
            class="mb-5 bg-white border border-gray-300 rounded-[27px] px-6 flex items-center transition-all duration-500 ease-in-out overflow-hidden cursor-pointer"
            x-bind:style="open ? 'max-height: 400px;' : 'max-height: 200px;'"
            @click="$el.closest('form').submit()"
          >
            <div class="w-20 h-20 flex items-center">
              <img src="{{ asset('images/loan.png') }}" alt="">
            </div>
            <div class="w-full flex flex-col items-center py-2">
              <div class="flex">
                <div class="flex flex-col">
                  <div class="flex justify-between items-center">
                    <p class="text-[16px] font-semibold">{{ $notification->jenis_notifikasi }}</p>
                    <div class="flex items-center justify-end">
                      <p class="text-right text-[13px]">{{ $notification->formatted_timestamp }}</p>
                      <button type="button"
                        @click.stop="open = !open"
                        class="active:bg-gray-200 ml-2 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" :class="{ 'rotate-90': open }" class="w-5 text-gray-400 transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                      </button>
                    </div>
                  </div>
                  <p class="text-[16px] font-light text-justify"
                    x-text="open ? @js($notification->deskripsi_notifikasi) : @js($notification->truncated_pesan)">
                    {{ $notification->truncated_pesan }}
                  </p>
                </div>
              </div>
            </div>
          </div>
        </form>
      @endforeach
      @if ($notifications->where('status_notifikasi', true)->isNotEmpty())
        <hr class="border-gray-400 rounded-full mb-5">
      @endif
    @endif
    @foreach ($notifications->sortByDesc('created_at')->where('status_notifikasi', true) as $notification)
      <input type="hidden" name="id_notifikasi" value="{{ $notification->id_notifikasi }}">
      <div id="notification" 
      @click="window.location.href='{{ $notification->link_notifikasi }}'" 
      x-data="{ open:false }"
      class="mb-5 bg-gray-100 border border-gray-200 rounded-[27px] px-6 flex items-center transition-all duration-500 ease-in-out overflow-hidden"
      x-bind:style="open ? 'max-height: 400px;' : 'max-height: 200px;'">
        <div class="w-20 h-20 flex items-center">
          <img src="{{ asset('images/loan.png') }}" alt="">
        </div>
        <div class="w-full flex flex-col items-center py-2">
            <div class="flex">
              <div class="flex flex-col">
                  <div class="flex justify-between items-center">
                    <p class="text-[16px] font-semibold">{{ $notification->jenis_notifikasi }}</p>
                    <div class="flex items-center justify-end">
                        <p class="text-right text-[13px]">{{ $notification->formatted_timestamp }}</p>
                        <button @click.stop="open = !open" class="active:bg-gray-200 ml-2 rounded-full" id="toggleButton">
                          <svg xmlns="http://www.w3.org/2000/svg" :class="{ 'rotate-90': open }" class="w-5 text-gray-400 transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                          </svg>
                        </button>
                    </div>
                  </div>
                  <p id="deskripsi_notifikasi" class="text-[16px] font-light text-justify" x-text="open ? @js($notification->deskripsi_notifikasi) : @js($notification->truncated_pesan)">{{ $notification->truncated_pesan }}</p>
              </div>
            </div>
        </div>
      </div>
    @endforeach
  </div>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const submitLink = document.getElementById('notification');
      const Form = document.getElementById('notificationForm');

      if (submitLink && Form) {
        submitLink.addEventListener('click', function(event) {
          // Mencegah perilaku default dari tag <a> (yaitu navigasi)
          event.preventDefault();

          // Submit form
          Form.submit();

          const toggleButton = document.getElementById('toggleButton');
          if (toggleButton) {
              toggleButton.addEventListener('click', function(event) {
                  event.stopPropagation(); // Stop propagation to prevent notificationDiv's click listener
                                          // from firing when the toggle button is clicked.
                  // Alpine.js already handles the 'open' state change.
              });
          }
        });
      });
  </script>
</body>
</html>
