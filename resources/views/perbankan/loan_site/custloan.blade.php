@section('content')
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 font-sans mb-20">
  <!-- Header -->
  <div class="flex px-7 py-8 bg-white mb-5 items-center">
    <a class="mr-3" href="{{ route('nasabah.homepage') }}">
        <img src="{{ asset('images/arrowblue.png') }}" alt="">
    </a>
    <h1 class="font-extrabold text-3xl text-[#13545C]">Loans</h1>
  </div>
 <!-- Menu List -->
 <div class="menu px-6">
  <!-- Notification 1 -->
  <a href="{{ route('nasabah.loan.application') }}">
    <div class="bg-white rounded-[27px] w-full flex items-center py-2 px-6 mb-5">
      <div class="w-20 h-20 flex items-center mr-6">
          <img src="{{ asset('images/myloans.png') }}" class="w-full" alt="loanapp">
      </div>
      <div class="flex justify-between items-center w-full">
        <h1 class="text-black font-semibold">Loan Application</h1>
        <img src="{{ asset('images/arrowblue.png') }}" class="w-5 h-5 transform scale-x-[-1]" alt="arrow">
      </div>
    </div>
  </a>
  <a href="">
    <div class="bg-white rounded-[27px] w-full flex items-center py-2 px-6 mb-5">
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
