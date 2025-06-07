@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bank BKC</title>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link rel="stylesheet" href="{{ asset('css/warna.css') }}">
    @vite('resources/css/app.css')
    <style>
        .action-btn {
            z-index: 1;
            position: relative;
            font-size: inherit;
            font-family: inherit;
            color: white;
            outline: none;
            border: none;
            background: none;
            cursor: pointer;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .icon-hover {
            background-color: white;
            padding: 1em;
            border-radius: 0.75rem;
            width: 75px;
            height: 75px;
            position: relative;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .icon-hover::after {
            content: '';
            position: absolute;
            top: -50%;
            bottom: -50%;
            width: 1.25em;
            background-color: hsla(0, 100%, 100%, 9.2);
            transform: translate3d(-525%, 0, 0) rotate(35deg);
            z-index: 1;
        }

        .icon-hover:hover::after {
            transition: transform 0.45s ease-in-out;
            transform: translate3d(200%, 0, 0) rotate(35deg);
        }

        .icon-hover img {
            position: relative;
            z-index: 1;
        }
    </style>
</head>
<body class="bg-[#29BCCF] font-sans h-screen">
    <!-- Header -->
    <div class="flex px-7 py-8 bg-white items-center">
        <button class="mr-3" onclick="window.history.back()">
            <img src="{{ asset('images/arrowblue.png') }}" alt="">
        </button>
        <h1 class="font-extrabold text-3xl text-[#13545C]">Account Settings</h1>
    </div>
    <!-- Main Container -->
    <img class="w-screen" src="{{ asset('images/city.jpg') }}" alt="">
    <div class="bg-gray-200 px-7 w-full h-auto">
        <!-- Identity Section -->
        <div class="bg-white rounded-[69px] w-full shadow-sm py-10 transform -translate-y-12 px-7 mb-5">
            <form action="POST">
                <div class="mb-4">
                    <h1 class="text-center text-xl text-[#13545C] mb-4 font-bold">Identity <button id="identityeditbutton"><img src="{{ asset('images/pencil-svgrepo-com.svg') }}" alt="" class="w-4"></button></h1>
                    <hr class="rounded bg-gray-400">
                </div>
                <div class="mb-3">
                    <label class="block mb-2 text-sm font-normal text-[#13545C]" for="NIK">NIK</label>
                    <input name="NIK" id="NIK" class="bg-gray-50 border border-[#29BCCF] text-gray-900 text-sm rounded-[30px] w-full identity" type="text" value="" required disabled>
                </div>                
                <div class="mb-3">
                    <label class="block mb-2 text-sm font-normal text-[#13545C]" for="fullname">Full Name</label>
                    <input name="fullname" id="fullname" class="bg-gray-50 border border-[#29BCCF] text-gray-900 text-sm rounded-[30px] w-full identity" type="text" value="" required disabled>
                </div>
                <div class="mb-3">
                    <label class="block mb-2 text-sm font-normal text-[#13545C]" for="ttl">Birth Date</label>
                    <input name="ttl" id="ttl" class="bg-gray-50 border border-[#29BCCF] text-gray-900 text-sm rounded-[30px] w-full identity" type="date" value="" required disabled>
                </div>
                <div class="mb-3">
                    <label class="block mb-2 text-sm font-normal text-[#13545C]" for="address">Address</label>
                    <input name="address" id="address" class="bg-gray-50 border border-[#29BCCF] text-gray-900 text-sm rounded-[30px] w-full identity" type="text" value="" required disabled>
                </div>
                <div class="mb-3">
                    <label for="gender" class="block mb-2 text-sm font-normal text-[#13545C]">Gender</label>
                    <select name="gender" id="gender" class="bg-gray-50 border border-[#29BCCF] text-gray-900 text-sm rounded-[30px] w-full identity" disabled>
                        <option value="" selected>Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="marriage" class="block mb-2 text-sm font-normal text-[#13545C]">Marriage</label>
                    <select name="marriage" id="marriage" class="bg-gray-50 border border-[#29BCCF] text-gray-900 text-sm rounded-[30px] w-full identity" disabled>
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
            </form>
            <form action="POST" class="mt-10">
                <div class="mb-4">
                    <h1 class="text-center text-xl text-[#13545C] mb-4 font-bold">Security <button id="securityeditbutton"><img src="{{ asset('images/pencil-svgrepo-com.svg') }}" alt="" class="w-4"></button></h1>
                    <hr class="rounded bg-gray-400">
                </div>
                <div class="mb-3">
                    <label class="block mb-2 text-sm font-normal text-[#13545C]" for="Email">Email Address</label>
                    <input id="email" class="bg-gray-50 border border-[#29BCCF] text-gray-900 text-sm rounded-[30px] w-full security" type="email" value="" required disabled>
                </div>
                <div class="mb-3">
                    <label class="block mb-2 text-sm font-normal text-[#13545C]" for="number">Phone Number</label>
                    <input id="number" class="bg-gray-50 border border-[#29BCCF] text-gray-900 text-sm rounded-[30px] w-full security" type="text" value="" required disabled>
                </div>
                <div class="mb-3">
                    <label class="block mb-2 text-sm font-normal text-[#13545C]" for="password">Password</label>
                    <input id="password" class="bg-gray-50 border border-[#29BCCF] text-gray-900 text-sm rounded-[30px] w-full security" type="password" value="" required disabled>
                </div>
            </form>            
            <form action="POST" class="mt-10">
                <div class="mb-4">
                    <h1 class="text-center text-xl text-[#13545C] mb-4 font-bold">Financial <button id="financialeditbutton"><img src="{{ asset('images/pencil-svgrepo-com.svg') }}" alt="" class="w-4"></button></h1>
                    <hr class="rounded bg-gray-400">
                </div>
                <div class="mb-3">
                    <label for="job" class="block mb-2 text-sm font-normal text-[#13545C]">Job</label>
                    <select name="job" name="job" id="job" class="bg-gray-50 border border-[#29BCCF] text-gray-900 text-sm rounded-[30px] w-full financial" disabled>
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
                <div class="mb-3">
                    <label for="income" class="block mb-2 text-sm font-normal text-[#13545C]">Income Range</label>
                    <select name="income" name="income" id="income" class="bg-gray-50 border border-[#29BCCF] text-gray-900 text-sm rounded-[30px] w-full financial" disabled>
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
                <div class="mb-3">
                    <label for="financialdependents" class="block mb-2 text-sm font-normal text-[#13545C]">Financial Dependents</label>
                    <input type="number" id="financialdependents" class="bg-gray-50 border border-[#29BCCF] text-gray-900 text-sm rounded-[30px] w-full financial" min="0" value="1" required disabled/>
                </div>
            </form>
        </div>
    </div> <!-- END Main Container -->
    <script>
        const identity = document.querySelectorAll("input.identity");
        const security = document.querySelectorAll("input.security");
        const financial = document.querySelectorAll("input.financial");
        const identityeditbutton = document.getElementById("identityeditbutton");
        const securityeditbutton = document.getElementById("securityeditbutton");
        const financialeditbutton = document.getElementById("financialeditbutton");

        function toggleDisabledByClass(className) {
            // Pilih input, select, textarea yang punya class tersebut
            const elements = document.querySelectorAll(`input.${className}, select.${className}, textarea.${className}`);
            elements.forEach(el => {
            el.disabled = !el.disabled;
            });

            // Cek status disabled salah satu elemen (anggap semua elemen statusnya sama)
            const isEnabled = !elements[0].disabled;

            // Tambahkan atau hapus class 'red' pada tombol sesuai status enable/disable
            if(isEnabled) {
                button.classList.add('red');
            } else {
                button.classList.remove('red');
        }
        identityeditbutton.addEventListener('click', (e) => {
            e.preventDefault();
            toggleDisabledByClass('identity');
        });
        securityeditbutton.addEventListener('click', (e) => {
            e.preventDefault();
            toggleDisabledByClass('security');
        });
        financialeditbutton.addEventListener('click', (e) => {
            e.preventDefault();
            toggleDisabledByClass('financial');
        });
    </script>
</body>
</html>
