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
  
  @if ($pengajuan_kredit->status_pengajuankredit == 'Under Review')
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
      <div class="bg-white flex flex-col border border-[#29BBCF] px-4 py-4 rounded-xl mb-7">
        <div class="flex justify-between mb-3">
          <p>Loan ID</p>
          <p>{{ '#'.$pengajuan_kredit->id_pengajuankredit }}</p>
        </div>
        <div class="flex justify-between mb-3">
          <p>Loan Amount</p>
          <p>Rp {{ number_format($pengajuan_kredit->nominal_pengajuankredit, 0, ',','.') }}</p>
        </div>
        <div class="flex justify-between mb-3">
          <p>Loan Period (Month)</p>
          <p>{{ $pengajuan_kredit->tenor }}</p>
        </div>
        <div class="flex justify-between">
          <p>Apply Date</p>
          <p>{{ $pengajuan_kredit->tanggal_pengajuankredit->format('d-m-Y') }}</p>
        </div>
      </div>
      <button class="text-white bg-[#ff6666] text-center w-full p-3 rounded-xl font-semibold">Cancel Loan Application</a>
    </div>    
  @elseif ($pengajuan_kredit->status_pengajuankredit == 'Awaiting Date Confirmation')
    <!-- Upper Body -->
    <div class="w-full h-auto bg-[#F0FFAD] flex flex-col px-7 py-8 mb-5">
      <div class="flex items-center mb-3">
        <img src="{{ asset('images/loan.png') }}" class="mr-3 h-8 w-10 [filter:brightness(0)_saturate(100%)_invert(85%)_sepia(59%)_saturate(1338%)_hue-rotate(328deg)_brightness(98%)_contrast(106%)]" alt="">
        <h2 class="font-medium">Awaiting Date Confirmation</h2>
      </div>
      <p class="font-extralight text-justify">Your loan requires a survey date confirmation. Please select an available date for the on-spot verification to proceed with your loan application.</p>
    </div>
    <!--Lower Body-->
    <div class="px-7 mb-5">
      <h2 class="text-[#29BBCF] font-semibold mb-3">Loan Information</h2>
      <div class="bg-white flex flex-col outline outline-1 outline-[#29BBCF] px-4 py-4 rounded-xl mb-7">
        <div class="flex justify-between mb-3">
          <p>Loan ID</p>
          <p>{{ '#'.$pengajuan_kredit->id_pengajuankredit }}</p>
        </div>
        <div class="flex justify-between mb-3">
          <p>Loan Amount</p>
          <p>Rp {{ number_format($pengajuan_kredit->nominal_pengajuankredit, 0, ',','.') }}</p>
        </div>
        <div class="flex justify-between mb-3">
          <p>Loan Period (Month)</p>
          <p>{{ $pengajuan_kredit->tenor }}</p>
        </div>
        <div class="flex justify-between">
          <p>Apply Date</p>
          <p>{{ $pengajuan_kredit->tanggal_pengajuankredit->format('d-m-Y') }}</p>
        </div>
      </div>
    </div>
    <div class="px-7">
      <h2 class="text-[#29BBCF] font-semibold mb-3">Survey Date</h2>
      <div class="bg-white flex flex-col outline outline-1 outline-[#29BBCF] px-4 py-4 rounded-xl mb-7">
        <div class="flex justify-between">
          <form action="" class="w-full">
            <div class="mb-5">
              <input placeholder="Select a date for the on-spot survey" type="date" id="surveydate" class="bg-gray-50 border border-[#D4D6D9] text-gray-900 text-sm rounded-[13px] focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required/>
            </div>
            <button type="button" class=" text-white bg-[#29BBCF] hover:bg-[#1f9cb4] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-[13px] text-sm w-full sm:w-auto px-5 py-2.5 text-center transition-colors duration-300">Confirm</button>
          </form>
        </div>
      </div>
    </div>
  @elseif ($pengajuan_kredit->status_pengajuankredit == 'Survey Under Review')
    <!-- Upper Body -->
    <div class="w-full h-auto bg-[#F0FFAD] flex flex-col px-7 py-8 mb-5">
      <div class="flex items-center mb-3">
        <img src="{{ asset('images/loan.png') }}" class="mr-3 h-8 w-10 [filter:brightness(0)_saturate(100%)_invert(85%)_sepia(59%)_saturate(1338%)_hue-rotate(328deg)_brightness(98%)_contrast(106%)]" alt="">
        <h2 class="font-medium">Survey Completed – Under Review</h2>
      </div>
      <p class="font-extralight text-justify">Your survey has been completed. We are now reviewing your loan application.</p>
    </div>
    <!--Lower Body-->
    <div class="px-7">
      <h2 class="text-[#29BBCF] font-semibold mb-3">Loan Information</h2>
      <div class="bg-white flex flex-col outline outline-1 outline-[#29BBCF] px-4 py-4 rounded-xl mb-7">
        <div class="flex justify-between mb-3">
          <p>Loan ID</p>
          <p>{{ '#'.$pengajuan_kredit->id_pengajuankredit }}</p>
        </div>
        <div class="flex justify-between mb-3">
          <p>Loan Amount</p>
          <p>{{ number_format($pengajuan_kredit->nominal_pengajuankredit, 0, ',','.') }}</p>
        </div>
        <div class="flex justify-between mb-3">
          <p>Loan Period (Month)</p>
          <p>{{ $pengajuan_kredit->tenor }}</p>
        </div>
        <div class="flex justify-between mb-3">
          <p>Apply Date</p>
          <p>{{ $pengajuan_kredit->tanggal_pengajuankredit->format('d-m-Y') }}</p>
        </div>
        <div class="flex justify-between mb-3">
          <p>Survey Date</p>
          <p>28/03/2025</p>
        </div>
        <button id="surveyresultbutton" class="text-white bg-[#29BBCF] text-center w-full p-3 rounded-xl font-semibold">View Survey Result</button>
        <script>
          const viewsurveyresultbutton = document.getElementById('surveyresultbutton');
          viewsurveyresultbutton.addEventListener('click', () => {
            window.location.href = '{{  route('nasabah.viewsurveyresult') }}';
          });
        </script>
      </div>
    </div>
  @elseif ($pengajuan_kredit->status_pengajuankredit == 'Loan Approved')
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
          <p>{{ '#'.$pengajuan_kredit->id_pengajuankredit }}</p>
        </div>
        <div class="flex justify-between mb-3">
          <p>Loan Amount</p>
          <p>{{ number_format($pengajuan_kredit->nominal_pengajuankredit, 0, ',','.') }}</p>
        </div>
        <div class="flex justify-between mb-3">
          <p>Loan Period (Month)</p>
          <p>{{ $pengajuan_kredit->tenor }}</p>
        </div>
        <div class="flex justify-between mb-3">
          <p>Apply Date</p>
          <p>{{ $pengajuan_kredit->tanggal_pengajuankredit->format('d-m-Y') }}</p>
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
  @endif
</body>
</html>