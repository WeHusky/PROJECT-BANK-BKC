@section('content')
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BKC - Loans Menu</title>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
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
<body class="bg-white font-sans mb-20">
  <!-- Header -->
  <div class="flex px-7 py-8 bg-white mb-5 items-center shadow-sm">
    <a class="mr-3" href="{{ route('nasabah.homepage') }}">
        <img src="{{ asset('images/arrowblue.png') }}" alt="">
    </a>
    <h1 class="font-extrabold text-3xl text-[#13545C]">Loans</h1>
  </div>
 <!-- Menu List -->
 <div class="menu px-6">
  <!-- Notification 1 -->
  <a href="{{ route('nasabah.loan.application') }}">
    <div class="bg-[#d6faff] rounded-[27px] w-full flex items-center py-2 px-6 mb-5">
      <div class="w-20 h-20 flex items-center mr-6">
          <img src="{{ asset('images/myloans.png') }}" class="w-full" alt="loanapp">
      </div>
      <div class="flex justify-between items-center w-full">
        <h1 class="text-black font-semibold">Loan Application</h1>
        <img src="{{ asset('images/arrowblue.png') }}" class="w-5 h-5 transform scale-x-[-1]" alt="arrow">
      </div>
    </div>
  </a>
  <a href="{{ route('nasabah.myloans') }}">
    <div class="bg-[#d6faff] rounded-[27px] w-full flex items-center py-2 px-6 mb-5">
      <div class="w-20 h-20 flex items-center mr-6">
          <img src="{{ asset('images/loanapp.png') }}" class="w-full" alt="loanapp">
      </div>
      <div class="flex justify-between items-center w-full">
        <h1 class="text-black font-semibold">My Loans</h1>
        <img src="{{ asset('images/arrowblue.png') }}" class="w-5 h-5 transform scale-x-[-1]" alt="arrow">
      </div>
    </div>
  </a>
</body>
</html>
