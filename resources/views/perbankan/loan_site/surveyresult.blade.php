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
  <div class="flex px-7 py-8 bg-white items-center mb-8">
    <button id="backButton" class="mr-3">
        <img src="{{ asset('images/arrowblue.png') }}" alt="">
    </button>
    <h1 class="font-extrabold text-3xl text-[#13545C]">My Loans</h1>
  </div>
  <div class="px-7">
    <h2 class="text-[#29BBCF] font-semibold mb-3">Survey Result</h2>
    <div class="bg-white flex flex-col outline outline-1 outline-[#29BBCF] px-4 py-4 rounded-xl mb-7">
      <div class="flex justify-between mb-3">
        <p>Survey Date</p>
        <p>{{ $survei->tanggal_survei->format('d/m/Y') }}</p>
      </div>
      <div class="flex justify-between mb-3">
        <p>House Condition</p>
        <a href=""><img class="w-4" alt="" src="{{ asset('images/download-button-svgrepo-com.svg') }}" alt=""></a>
      </div>
      <div class="flex justify-between mb-3">
        <p>Economy Condition</p>
        <p>{{ $survei->kondisi_ekonomi }}</p>
      </div>
        <div class="flex flex-col justify-between mb-3">
        <p class="mb-2">Reason</p>
        <textarea 
          name="alasan" 
          rows="4"
          class="w-full px-4 py-2 border border-gray-300 rounded-md" disabled
        >{{ $survei->alasan_peminjaman }}
        </textarea>
      </div>
    <script>
      const backButton = document.getElementById('backButton');
      backButton.addEventListener('click', () => {
        window.history.back();
      });
    </script>
  </div>
</body>
</html>