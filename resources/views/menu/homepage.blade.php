@section('content')
@include('layouts.navbar')

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Bank BKC</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
  @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 font-sans mb-20">
  <!-- Header -->
  <div class="flex justify-between items-center px-7 py-8 bg-white mb-5">
    <h1 class="font-extrabold text-3xl text-[#13545C]">Home Page</h1>
    <div class="relative">
      <a href="{{ route('nasabah.notifications') }}"> 
        <img class="w-6" src="{{ asset('images/bell.png') }}" alt="">
        <span class="absolute -bottom-1 -right-1 bg-red-500 text-white text-xs w-4 h-4 flex items-center justify-center rounded-full">1</span>
      </a>
    </div>
  </div>

  <!-- Card -->
  <div class="px-7">
    <div class="bg-white p-4 rounded-[27px]">
      <p class="text-[#13545C] mb-2 font-semibold">My Card</p>
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
      <button class="mt-4 w-full bg-[#29BBCF] hover:bg-cyan-600 text-white font-semibold py-2 rounded-full transition duration-200">View Card Details</button>
    </div>
  </div>

  <!-- Actions -->
  <div class="grid grid-cols-4 gap-2 px-7 py-6 text-center text-sm">
    <div class="flex flex-col items-center">
      <div class="bg-white p-3 rounded-xl w-[75px] h-[75px] flex justify-center items-center">
        <img src="{{ asset('images/balance.png') }}" alt="">
      </div>
      <span class="mt-2 text-[#13545C] font-light">Balance</span>
    </div>
    <div class="flex flex-col items-center">
      <div class="bg-white p-3 rounded-xl w-[75px] h-[75px] flex justify-center items-center">
        <img src="{{ asset('images/transfer.png') }}" alt="">
      </div>
      <span class="mt-2 text-[#13545C] font-light">Transfer</span>
    </div>
    <div class="flex flex-col items-center">
      <div class="bg-white p-3 rounded-xl w-[75px] h-[75px] flex justify-center items-center">
        <img src="{{ asset('images/pay.png') }}" alt="">
      </div>
      <span class="mt-2 text-[#13545C] font-light">Pay</span>
    </div>
    <a href="{{ route('loan.customer') }}" class="flex flex-col items-center">
      <div class="bg-white p-3 rounded-xl w-[75px] h-[75px] flex justify-center items-center">
        <img src="{{ asset('images/loan.png') }}" alt="">
      </div>
      <span class="mt-2 text-[#13545C] font-light">Loan</span>
    </a>
    <div class="flex flex-col items-center">
      <div class="bg-white p-3 rounded-xl w-[75px] h-[75px] flex justify-center items-center">
        <img src="{{ asset('images/transaction.png') }}" alt="">
      </div>
      <span class="mt-2 text-[#13545C] font-light">Transactions</span>
    </div>
  </div>
</body>
</html>
