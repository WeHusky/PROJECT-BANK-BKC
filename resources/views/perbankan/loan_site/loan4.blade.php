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
    <a id="backButton" class="mr-3" href="{{ route('nasabah.myloans') }}">
        <img src="{{ asset('images/arrowblue.png') }}" alt="">
    </a>
    <h1 class="font-extrabold text-3xl text-[#13545C]">My Loans</h1>
  </div>
  <!-- Upper Body -->
  <div class="w-full h-auto bg-[#ADFFBC] flex flex-col px-7 py-8 mb-5">
    <div class="flex items-center mb-3">
      <img src="{{ asset('images/loan.png') }}" class="mr-3 h-8 w-10 [filter:brightness(0)_saturate(100%)_invert(100%)_sepia(16%)_saturate(7130%)_hue-rotate(57deg)_brightness(92%)_contrast(90%)]" alt="">
      <h2 class="font-medium">Loan Approved</h2>
    </div>
    <p class="font-extralight text-justify">Congratulations! Your loan is approved. Please review and confirm your disbursement details to proceed with the transfer.</p>
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
      <div class="flex justify-between mb-3">
        <p>Survey Date</p>
        <p>28/03/2025</p>
      </div>
      <button id="surveyresultbutton" class="text-white bg-[#29BBCF] text-center w-full p-3 rounded-xl font-semibold">View Survey Result</a>
      <script>
        const viewsurveyresultbutton = document.getElementById('surveyresultbutton');
        viewsurveyresultbutton.addEventListener('click', () => {
          window.location.href = '{{  route('nasabah.viewsurveyresult') }}';
        });
      </script>
    </div>
    <button class="text-white bg-[#29BBCF] text-center w-full p-3 rounded-xl font-semibold">Confirm Disbursement</a>
  </div>
</body>
</html>