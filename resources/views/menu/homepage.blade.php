@section('content')
@include('layouts.navbar')

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Mobile Banking UI</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">
  <!-- Header -->
  <div class="flex justify-between items-center p-4">
    <h1 class="text-xl font-bold text-gray-800">Home Page</h1>
    <div class="relative">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-teal-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405M19 13V5a2 2 0 00-2-2H7a2 2 0 00-2 2v8m14 0a2 2 0 012 2v1a2 2 0 01-2 2H7a2 2 0 01-2-2v-1a2 2 0 012-2m12 0H7" />
      </svg>
      <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs w-4 h-4 flex items-center justify-center rounded-full">1</span>
    </div>
  </div>

  <!-- Card -->
  <div class="px-4">
    <div class="bg-white p-4 rounded-2xl shadow-md max-w-sm mx-auto">
      <p class="text-gray-500 mb-2 font-semibold">My Card</p>
      <div class="relative bg-black p-4 rounded-xl overflow-hidden" style="background: linear-gradient(120deg, #181818 60%, #232323 100%);">
        <!-- Wave effect -->
        <div class="absolute inset-0 z-0" style="background: url('{{ asset('images/wave.png') }}') repeat; opacity: 1.15;"></div>
        <!-- MasterCard Logo -->
        <div class="flex items-center z-10 relative">
          <span class="inline-block w-7 h-7 rounded-full bg-red-600 mr-1" style="box-shadow: 18px 0 0 0 #fbbf24;"></span>
          <span class="ml-8 text-white font-semibold text-base">Master Card</span>
          <!-- Chip -->
          <img src="{{ asset('images/chip.png') }}" alt="chip" class="absolute right-0 top-0 h-12 w-16 object-contain mt-2 mr-2" />
        </div>
        <!-- Card Number -->
        <div class="mt-8 z-10 relative">
          <p class="text-xs text-gray-300 mb-1">Card Number</p>
          <p class="tracking-widest text-xl text-gray-300 font-mono">8050 5040 2030 3020</p>
        </div>
        <!-- Name & Valid Thru -->
        <div class="flex justify-between items-end mt-8 z-10 relative">
          <div>
            <p class="text-xs text-gray-300 mb-1">Jokowi</p>
          </div>
          <div class="text-right">
            <p class="text-xs text-gray-300">Valid Thru</p>
            <p class="text-base text-gray-300">05/28</p>
          </div>
        </div>
      </div>
      <button class="mt-4 w-full bg-cyan-500 hover:bg-cyan-600 text-white font-semibold py-2 rounded-full transition duration-200">View Card Details</button>
    </div>
  </div>

  <!-- Actions -->
  <div class="grid grid-cols-4 gap-4 px-6 py-6 text-center text-sm">
    <div class="flex flex-col items-center">
      <div class="bg-white p-3 rounded-xl shadow">
        <svg class="w-6 h-6 text-purple-600" fill="currentColor" viewBox="0 0 24 24">
          <path d="M2 6a2 2 0 012-2h16a2 2 0 012 2v2H2V6zM2 10h20v8a2 2 0 01-2 2H4a2 2 0 01-2-2v-8z"/>
        </svg>
      </div>
      <span class="mt-2 text-gray-700">Balance</span>
    </div>
    <div class="flex flex-col items-center">
      <div class="bg-white p-3 rounded-xl shadow">
        <svg class="w-6 h-6 text-pink-600" fill="currentColor" viewBox="0 0 24 24">
          <path d="M17 10h4l-6.5 6.5L8 10h4V4h5v6z"/>
        </svg>
      </div>
      <span class="mt-2 text-gray-700">Transfer</span>
    </div>
    <div class="flex flex-col items-center">
      <div class="bg-white p-3 rounded-xl shadow">
        <svg class="w-6 h-6 text-green-500" fill="currentColor" viewBox="0 0 24 24">
          <path d="M12 1C5.935 1 1 5.935 1 12s4.935 11 11 11 11-4.935 11-11S18.065 1 12 1zm1 17.93V18h-2v.93A9.001 9.001 0 013.07 13H4v-2H3.07A9.001 9.001 0 0111 3.07V4h2v-.93A9.001 9.001 0 0120.93 11H20v2h.93A9.001 9.001 0 0113 20.93z"/>
        </svg>
      </div>
      <span class="mt-2 text-gray-700">Pay</span>
    </div>
    <a href="{{ route('loan.customer') }}" class="flex flex-col items-center">
      <div class="bg-white p-3 rounded-xl shadow">
        <svg class="w-6 h-6 text-yellow-500" fill="currentColor" viewBox="0 0 24 24">
          <path d="M12 1L3 5v6c0 5.25 3.75 10.74 9 12 5.25-1.26 9-6.75 9-12V5l-9-4zm0 11h-2v2h2v2h2v-2h2v-2h-2v-2h-2v2z"/>
        </svg>
      </div>
      <span class="mt-2 text-gray-700">Loan</span>
    </a>
    <div class="flex flex-col items-center">
      <div class="bg-white p-3 rounded-xl shadow">
        <svg class="w-6 h-6 text-indigo-700" fill="currentColor" viewBox="0 0 24 24">
          <path d="M4 4h16v2H4V4zm0 4h16v2H4V8zm0 4h10v2H4v-2zm0 4h10v2H4v-2z"/>
        </svg>
      </div>
      <span class="mt-2 text-gray-700">Transactions</span>
    </div>
  </div>
  </div>
</body>
</html>
