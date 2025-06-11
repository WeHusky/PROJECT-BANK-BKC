@section('content')
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link rel="stylesheet" href="{{ asset('css/myloans.css') }}">
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
<body class="bg-gray-200 font-sans mb-20">
  <!-- Header -->
  <div class="flex px-7 py-8 bg-white mb-5 items-center">
    <a class="mr-3" href="{{ route('nasabah.loans') }}">
        <img src="{{ asset('images/arrowblue.png') }}" alt="">
    </a>
    <h1 class="font-extrabold text-3xl text-[#13545C]">My Loans</h1>
  </div>
 <!-- Menu List -->
 <div class="menu px-6">
  <!-- Loan 1 -->
  <a href="{{ route('nasabah.loan') }}">
    <div class="gradient rounded-[27px] w-full flex items-center py-2 px-6 mb-5 h-30 bg-cover bg-center bg-no-repeat">
      <div class="mr-4">
        <img src="{{ asset('images/loan.png') }}" alt="">
      </div>
      <div class="flex flex-col justify-between w-full">
        <p class="text-[#2e2506] font-black">Loan Application</p>
        <p class="text-[#2e2506] font-normal mb-3">06/06/2025</p>
        <p class="text-[#2e2506] font-normal">Under Review</p>
      </div>
    </div>
  </a>
  <!-- Loan 2 -->
  <a href="{{ route('nasabah.loan2') }}">
    <div class="gradient dateconfirmation rounded-[27px] w-full flex items-center py-2 px-6 mb-5 h-30 bg-cover bg-center bg-no-repeat">
      <div class="mr-4">
        <img src="{{ asset('images/loan.png') }}" alt="">
      </div>
      <div class="flex flex-col justify-between w-full">
        <p class="text-[#2e2506] font-black">Loan Application</p>
        <p class="text-[#2e2506] font-normal mb-3">06/06/2025</p>
        <p class="text-[#2e2506] font-normal">Awaiting Date Confirmation</p>
      </div>
    </div>
  </a>
    <!-- Loan 3 -->
    <a href="{{ route('nasabah.loan3') }}">
      <div class="gradient surveyreview rounded-[27px] w-full flex items-center py-2 px-6 mb-5 h-30 bg-cover bg-center bg-no-repeat">
        <div class="mr-4">
          <img src="{{ asset('images/loan.png') }}" alt="">
        </div>
        <div class="flex flex-col justify-between w-full">
          <p class="text-[#2e2506] font-black">Loan Application</p>
          <p class="text-[#2e2506] font-normal mb-3">06/06/2025</p>
          <p class="text-[#2e2506] font-normal">Survey Under Review</p>
        </div>
      </div>
    </a>
    <!-- Loan 3 -->
    <a href="{{ route('nasabah.loan4') }}">
      <div class="gradient approved rounded-[27px] w-full flex items-center py-2 px-6 mb-5 h-30 bg-cover bg-center bg-no-repeat">
        <div class="mr-4">
          <img src="{{ asset('images/loan.png') }}" alt="">
        </div>
        <div class="flex flex-col justify-between w-full">
          <p class="text-[#2e2506] font-black">Loan Application</p>
          <p class="text-[#2e2506] font-normal mb-3">06/06/2025</p>
          <p class="text-[#2e2506] font-normal">Loan Approved</p>
        </div>
      </div>
    </a>
  
</body>
</html>
