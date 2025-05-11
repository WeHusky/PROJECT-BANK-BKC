@section('content')
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank BKC</title>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
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
    <p class="text-[#13545C] font-medium">Step 1 of 2</p>
    <div class="w-full flex gap-2 mt-5">
        <div class="bg-[#5FEE8F] w-1/2 h-3 rounded-lg flex-"></div>
        <div class="bg-white w-1/2 h-3 rounded-lg"></div>
    </div>
  </div>
  <form action="POST" class="w-full px-7 mt-5">
    <div class="mb-5">
        <label for="email" class="block mb-2 text-sm font-normal text-[#13545C]">NIK</label>
        <input type="email" id="email" class="bg-gray-50 border border-[#D4D6D9] text-gray-900 text-sm rounded-[13px] focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-0" disabled/>
    </div>
    <div class="mb-5">
        <label for="fullname" class="block mb-2 text-sm font-normal text-[#13545C]">Full Name</label>
        <input type="text" id="fullname" class="bg-gray-50 border border-[#D4D6D9] text-gray-900 text-sm rounded-[13px] focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-0" disabled/>
    </div>
    <div class="mb-5">
        <label for="ttl" class="block mb-2 text-sm font-normal text-[#13545C]">Birthdate</label>
        <input type="date" id="ttl" class="bg-gray-50 border border-[#D4D6D9] text-gray-900 text-sm rounded-[13px] focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-0" disabled />
    </div>
    <div class="mb-5">
        <label for="gender" class="block mb-2 text-sm font-normal text-[#13545C]">Gender</label>
        <select name="gender" id="gender" class="bg-gray-50 border border-[#D4D6D9] text-gray-900 text-sm rounded-[13px] focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-0" disabled>
            <option value="" selected>Gender</option>
        </select>
    </div>
    <div class="mb-5">
        <label for="jobs" class="block mb-2 text-sm font-normal text-[#13545C]">Jobs</label>
        <select name="jobs" id="jobs" class="bg-gray-50 border border-[#D4D6D9] text-gray-900 text-sm rounded-[13px] focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-0" disabled>
            <option value="Unemployed" selected>Job</option>
        </select>
    </div>
    <div class="mb-5">
        <label for="income" class="block mb-2 text-sm font-normal text-[#13545C]">Income Range</label>
        <select name="income" id="income" class="bg-gray-50 border border-[#D4D6D9] text-gray-900 text-sm rounded-[13px] focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-0" disabled>
            <option value="no-income" selected>Income Range</option>
        </select>
    </div>
    <div class="mb-5">
        <label for="marriage" class="block mb-2 text-sm font-normal text-[#13545C]">Marriage Status</label>
        <select name="marriage" id="marriage" class="bg-gray-50 border border-[#D4D6D9] text-gray-900 text-sm rounded-[13px] focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-0" disabled>
            <option value="single" selected>Single</option>
            <option value="married">Married</option>
            <option value="divorced">Divorced</option>
            <option value="widowed">Widowed</option>
            <option value="separated">Separated</option>
            <option value="in-a-relationship">In a Relationship</option>
            <option value="engaged">Engaged</option>
            <option value="domestic-partnership">Domestic Partnership</option>
        </select>
    </div>
    <div class="mb-5">
        <label for="financialdependents" class="block mb-2 text-sm font-normal text-[#13545C]">Financial Dependents</label>
        <input type="number" id="financialdependents" class="bg-gray-50 border border-[#D4D6D9] text-gray-900 text-sm rounded-[13px] focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-0" min="0" disabled/>
    </div>
    <div class="mb-5">
        <label for="address" class="block mb-2 text-sm font-normal text-[#13545C]">Address</label>
        <input type="text" id="address" class="bg-gray-50 border border-[#D4D6D9] text-gray-900 text-sm rounded-[13px] focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-0" disabled/>
    </div>
    <div class="mb-5">
        <label for="number" class="block mb-2 text-sm font-normal text-[#13545C]">Phone Number</label>
        <input type="tel" id="address" class="bg-gray-50 border border-[#D4D6D9] text-gray-900 text-sm rounded-[13px] focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-0" disabled/>
    </div>
    <button type="submit" class="mt-3 text-white bg-[#29BBCF] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-[13px] text-sm w-full sm:w-auto px-5 py-2.5 text-center">Confirm</button>
  </form>
</body>
</html>