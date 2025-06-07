<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bank BKC</title>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    @vite('resources/css/app.css')
</head>
<body class="bg-[#EFF1F5] max-h-screen flex flex-col">
    <div class="w-full">
        <div class="header flex items-center relative w-full px-7 py-6">
            <a class="absolute left-4 " href="{{ route('nasabah.landingpage') }}"><img class="w-[31px] h-[31px]" src="{{ asset('images/arrowblue.png') }}" alt=""></a>
            <h2 class="font-extrabold text-[#13545C] text-[24px] text-center w-full">Sign Up</h2>
        </div>
        <div class="body bg-white rounded-tl-[45px] rounded-tr-[45px] w-screen h-auto px-7">
            <form class="w-full max-w-full mx-auto pt-10">
            <div class="mb-5">
                    <label for="NIK" class="block mb-2 text-sm font-normal text-[#13545C]">NIK</label>
                    <input type="text" id="NIK" class="bg-gray-50 border border-[#D4D6D9] text-gray-900 text-sm rounded-[13px] focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-0" placeholder="Enter as stated on your ID card" required />
            </div>
            <div class="mb-5">
                <label for="fullname" class="block mb-2 text-sm font-normal text-[#13545C]">Full Name</label>
                <input type="text" id="fullname" class="bg-gray-50 border border-[#D4D6D9] text-gray-900 text-sm rounded-[13px] focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-0" placeholder="John Doe" required />
            </div>
            <div class="mb-5">
                <label for="ttl" class="block mb-2 text-sm font-normal text-[#13545C]">Birthdate</label>
                <input type="date" id="ttl" class="bg-gray-50 border border-[#D4D6D9] text-gray-900 text-sm rounded-[13px] focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-0" required />
            </div>
            <div class="mb-5">
                <label for="gender" class="block mb-2 text-sm font-normal text-[#13545C]">Gender</label>
                <select name="gender" id="gender" class="bg-gray-50 border border-[#D4D6D9] text-gray-900 text-sm rounded-[13px] focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-0">
                    <option value="" selected>Pick your gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
            <div class="mb-5">
                <label for="job" class="block mb-2 text-sm font-normal text-[#13545C]">Job</label>
                <select name="job" id="job" class="bg-gray-50 border border-[#D4D6D9] text-gray-900 text-sm rounded-[13px] focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-0">
                    <option value="Software Engineer">Software Engineer</option>
                    <option value="Doctor">Doctor</option>
                    <option value="Teacher">Teacher</option>
                    <option value="Accountant">Accountant</option>
                    <option value="Mechanic">Mechanic</option>
                    <option value="Nurse">Nurse</option>
                    <option value="Electrician">Electrician</option>
                    <option value="Plumber">Plumber</option>
                    <option value="Designer">Designer</option>
                    <option value="Manager">Manager</option>
                    <option value="Architect">Architect</option>
                    <option value="Artist">Artist</option>
                    <option value="Chef">Chef</option>
                    <option value="Engineer">Engineer</option>
                    <option value="Entrepreneur">Entrepreneur</option>
                    <option value="Lawyer">Lawyer</option>
                    <option value="Pharmacist">Pharmacist</option>
                    <option value="Pilot">Pilot</option>
                    <option value="Scientist">Scientist</option>
                    <option value="Unemployed" selected>Unemployed</option>
                </select>
            </div>
            <div class="mb-5">
                <label for="income" class="block mb-2 text-sm font-normal text-[#13545C]">Income Range</label>
                <select name="income" id="income" class="bg-gray-50 border border-[#D4D6D9] text-gray-900 text-sm rounded-[13px] focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-0">
                    <option value="<1jt">Less than Rp1 million</option>
                    <option value="1-3jt">Rp1 million - Rp3 million</option>
                    <option value="3-5jt">Rp3 million - Rp5 million</option>
                    <option value="5-10jt">Rp5 million - Rp10 million</option>
                    <option value="10-20jt">Rp10 million - Rp20 million</option>
                    <option value="20-50jt">Rp20 million - Rp50 million</option>
                    <option value=">50jt">More than Rp50 million</option>
                    <option value="no-income" selected>No income</option>
                </select>
            </div>
            <div class="mb-5">
                <label for="marriage" class="block mb-2 text-sm font-normal text-[#13545C]">Marriage Status</label>
                <select name="marriage" id="marriage" class="bg-gray-50 border border-[#D4D6D9] text-gray-900 text-sm rounded-[13px] focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-0">
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
                <input type="number" id="financialdependents" class="bg-gray-50 border border-[#D4D6D9] text-gray-900 text-sm rounded-[13px] focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-0" min="0" placeholder="Number of financial dependents" required />
            </div>
            <div class="mb-5">
                <label for="email" class="block mb-2 text-sm font-normal text-[#13545C]">Email Address</label>
                <input type="email" id="email" class="bg-gray-50 border border-[#D4D6D9] text-gray-900 text-sm rounded-[13px] focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-0" placeholder="name@email.com" required />
            </div>
            <div class="mb-5">
                <label for="address" class="block mb-2 text-sm font-normal text-[#13545C]">Address</label>
                <input type="text" id="address" class="bg-gray-50 border border-[#D4D6D9] text-gray-900 text-sm rounded-[13px] focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-0" placeholder="Enter as stated on your ID card" required />
            </div>
            <div class="mb-5">
                <label for="number" class="block mb-2 text-sm font-normal text-[#13545C]">Phone Number</label>
                <input type="tel" id="address" class="bg-gray-50 border border-[#D4D6D9] text-gray-900 text-sm rounded-[13px] focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-0" placeholder="+62xxxxxxxxxxx" required />
            </div>
            <div class="mb-5">
                <label for="password" class="block mb-2 text-sm font-normal text-[#13545C]">Password</label>
                <input type="password" id="password" class="bg-gray-50 border border-[#D4D6D9] text-gray-900 text-sm rounded-[13px] focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-0" placeholder="Password" required />
            </div>
            <div class="mb-5">
                <label for="confirmpassword" class="block mb-2 text-sm font-normal text-[#13545C]">Confirm Password</label>
                <input type="password" id="confirmpassword" class="bg-gray-50 border border-[#D4D6D9] text-gray-900 text-sm rounded-[13px] focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-0" placeholder="Confirm Password" required />
            </div>
            <button type="submit" class="mt-3 text-white bg-[#29BBCF] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-[13px] text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
            </form>
        </div>
    </div>
</body>
</html>