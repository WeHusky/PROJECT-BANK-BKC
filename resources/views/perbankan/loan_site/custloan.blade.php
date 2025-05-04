@section('content')
@include('layouts.navbar')
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>

<div class="bg-gray-100 min-h-screen pt-4 px-4 pb-28">
  <!-- Header -->
  <div class="flex items-center space-x-2 mb-6">
  <a href="{{ route('nasabah.homepage') }}" class="text-cyan-600">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
      </svg>
    </a>
    <h1 class="text-2xl font-bold text-gray-800">Loan</h1>
  </div>

  <!-- Menu Cards -->
  <div class="space-y-4">
    <!-- Loan Application -->
    <a href="/loan/application" class="flex items-center bg-white rounded-2xl px-4 py-3 shadow-sm hover:shadow-md transition">
      <img src="/images/loan-application.png" alt="Loan App" class="w-12 h-12 mr-4">
      <span class="text-gray-800 font-semibold flex-1">Loan Application</span>
      <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
      </svg>
    </a>

    <!-- My Loans -->
    <a href="/loan/my" class="flex items-center bg-white rounded-2xl px-4 py-3 shadow-sm hover:shadow-md transition">
      <img src="/images/my-loans.png" alt="My Loans" class="w-12 h-12 mr-4">
      <span class="text-gray-800 font-semibold flex-1">My Loans</span>
      <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
      </svg>
    </a>
  </div>
</div>




</body>
</html>