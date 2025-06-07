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
  <div class="flex px-7 py-8 bg-white items-center">
    <a class="mr-3" href="{{ route('nasabah.myloans') }}">
        <img src="{{ asset('images/arrowblue.png') }}" alt="">
    </a>
    <h1 class="font-extrabold text-3xl text-[#13545C]">My Loans</h1>
  </div>
  <!-- Upper Body -->
  <div class="w-full h-auto bg-[#FFECAD] flex flex-col px-7 py-8 mb-5">
    <div class="flex items-center mb-3">
      <img src="{{ asset('images/loan.png') }}" class="mr-3 h-8 w-10" alt="">
      <h2 class="font-medium">Your Loan Application is Under Review</h2>
    </div>
    <p class="font-extralight text-justify">Don’t worry, this will not be taking too long, we’re doing as soon as possible and don’t forget to turn on app notification to get loan application result earlier. Thank you for your understanding!</p>
  </div>
  <!--Lower Body-->
  <div class="px-7">
    <h2 class="text-[#29BBCF] font-semibold mb-3">Loan Information</h2>
    <div class="bg-white flex flex-col outline outline-1 outline-[#29BBCF] px-4 py-4 rounded-xl mb-7">
      <div class="flex justify-between mb-3">
        <p>Loan ID</p>
        <p>#01</p>
      </div>
      <div class="flex justify-between mb-3">
        <p>Loan Amount</p>
        <p>Rp 1.000.000</p>
      </div>
      <div class="flex justify-between mb-3">
        <p>Loan Period (Month)</p>
        <p>Rp 1.000.000</p>
      </div>
      <div class="flex justify-between">
        <p>Apply Date</p>
        <p>03/03/2025</p>
      </div>
    </div>
    <button class="text-white bg-[#ff6666] text-center w-full p-3 rounded-xl font-semibold">Cancel Loan Application</a>
  </div>
</body>
</html>