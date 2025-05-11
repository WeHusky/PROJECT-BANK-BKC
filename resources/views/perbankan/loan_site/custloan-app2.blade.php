@section('content')
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank BKC</title>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link rel="stylesheet" href="{{ asset('css/rangeslider.css') }}">
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 font-sans mb-20">
  <!-- Header -->
  <div class="flex px-7 py-8 bg-white mb-5 items-center">
    <a class="mr-3" href="{{ route('nasabah.loan') }}">
        <img src="{{ asset('images/arrowblue.png') }}" alt="">
    </a>
    <h1 class="font-extrabold text-3xl text-[#13545C]">Loan Application</h1>
  </div>
 <!-- Form -->
  <div class="flex flex-col justify-center items-center px-7">
    <p class="text-[#13545C] font-medium">Step 2 of 2</p>
    <div class="w-full flex gap-2 mt-5">
        <div class="bg-[#5FEE8F] w-1/2 h-3 rounded-lg"></div>
        <div class="bg-[#5FEE8F] w-1/2 h-3 rounded-lg"></div>
    </div>
  </div>
  <form action="POST" class="w-full px-7 mt-5">
    <div class="bg-white rounded-md outline outline-1 outline-[#29BBCF] outline- w-full h-auto flex flex-col items-center justify-center p-3 mb-5">
        <p class="text-[#555555] font-medium mb-3">Loan Limit</p>
        <h1 class="text-[#3F455D] font-semibold text-3xl">Rp 250.000.000</h1>
    </div>
    <div class="bg-white rounded-md outline outline-1 outline-[#29BBCF] outline- w-full h-auto flex flex-col  p-3 mb-5">
        <p class="text-[#555555] font-medium mb-1">Loan Amount</p>
        <h1 id="loanamount" class="text-[#3F455D] font-semibold text-xl mb-6">Rp 120.000.000</h1>
        <input id="loanrange" type="range" min="1000000" max="250000000" step="1000000" value="1000000" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-[#29BBCF] mb-3">
        <div class="flex justify-between">
            <p class="text-[#9299B5]">1.000.000</p>
            <p class="text-[#9299B5]">250.000.000</p>
        </div>
        <script>
            const slider = document.getElementById("loanrange");
            const label = document.getElementById("loanamount");
          
            function formatRupiah(val) {
              return new Intl.NumberFormat("id-ID").format(val);
            }
          
            function updateSliderStyle() {
              const val = +slider.value;
              const min = +slider.min;
              const max = +slider.max;
              const percent = ((val - min) / (max - min)) * 100;
          
              slider.style.background = `linear-gradient(to right, #06b6d4 0%, #06b6d4 ${percent}%, #e5e7eb ${percent}%, #e5e7eb 100%)`;
              label.innerText = formatRupiah(val);
            }
          
            slider.addEventListener("input", updateSliderStyle);
            updateSliderStyle();
          </script>
    </div>

    <div class="bg-white rounded-md outline outline-1 outline-[#29BBCF] w-full h-auto flex flex-col  p-3 mb-5">
        <p class="text-[#555555] font-medium mb-1">Loan Period</p>
        <h1 id="loanperiod" class="text-[#3F455D] font-semibold text-xl mb-6">12 Months</h1>
        <input id="loanperiodrange" type="range" min="2" max="18" value="2" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer mb-3">
        <div class="flex justify-between">
            <p class="text-[#9299B5]">2 Months</p>
            <p class="text-[#9299B5]">18 Months</p>
        </div>
        <script>
            const sliderLoanPeriod = document.getElementById("loanperiodrange");
            const labelLoanPeriod = document.getElementById("loanperiod");
        
            function formatBulan(val) {
              return `${val} Months`;
            }
        
            function updateSliderStyle2() {
              const val = +sliderLoanPeriod.value;
              const min = +sliderLoanPeriod.min;
              const max = +sliderLoanPeriod.max;
              const percent = ((val - min) / (max - min)) * 100;
        
              sliderLoanPeriod.style.background = `linear-gradient(to right, #06b6d4 0%, #06b6d4 ${percent}%, #e5e7eb ${percent}%, #e5e7eb 100%)`;
              labelLoanPeriod.innerText = formatBulan(val);
            }
        
            sliderLoanPeriod.addEventListener("input", updateSliderStyle2);
            updateSliderStyle2();
        </script>
    </div>
    <button type="submit" class="mt-3 text-white bg-[#29BBCF] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-[13px] text-sm w-full sm:w-auto px-5 py-2.5 text-center">Apply Loan</button>
  </form>
</body>
</html>