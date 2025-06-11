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
        <div class="bg-white rounded-[20px] w-full shadow-sm py-10 transform -translate-y-12 px-7 mb-5">
            <form action="{{ route('nasabah.update', $nasabah->id_nasabah) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <h1 class="text-center text-xl text-[#13545C] mb-4 font-bold">Identity</h1>
                    <hr class="rounded bg-gray-400">
                </div>
                <div class="mb-3">
                    <label class="block mb-2 text-sm font-normal text-[#13545C]" for="NIK">NIK</label>
                    <input name="nik_nasabah" id="NIK" class="bg-gray-50 border border-[#29BCCF] text-gray-900 text-sm rounded-[30px] w-full identity" type="text" value="{{ $nasabah->nik_nasabah }}" readonly disabled>
                </div>
                <div class="mb-3">
                    <label class="block mb-2 text-sm font-normal text-[#13545C]" for="fullname">Full Name</label>
                    <input name="nama_nasabah" id="fullname" class="bg-gray-50 border border-[#29BCCF] text-gray-900 text-sm rounded-[30px] w-full identity" type="text" value="{{ $nasabah->nama_nasabah }}" required disabled>
                </div>
                <div class="mb-3">
                    <label class="block mb-2 text-sm font-normal text-[#13545C]">Birth Date</label>
                    <span class="block bg-gray-50 border border-[#29BCCF] text-gray-900 text-sm rounded-[30px] w-full px-3 py-2">
                        {{ $nasabah->tanggallahir_nasabah ? $nasabah->tanggallahir_nasabah->format('d F Y') : '' }}
                    </span>
                </div>
                <div class="mb-3">
                    <label class="block mb-2 text-sm font-normal text-[#13545C]" for="address">Address</label>
                    <input name="alamat_nasabah" id="address" class="bg-gray-50 border border-[#29BCCF] text-gray-900 text-sm rounded-[30px] w-full identity" type="text" value="{{ $nasabah->alamat_nasabah }}" required disabled>
                </div>
                <div class="mb-3">
                    <label for="gender" class="block mb-2 text-sm font-normal text-[#13545C]">Gender</label>
                    <input name="gender_nasabah" id="gender" class="bg-gray-50 border border-[#29BCCF] text-gray-900 text-sm rounded-[30px] w-full identity" type="text" value="{{ $nasabah->gender_nasabah }}" required disabled>
                </div>
                <div class="mb-3">
                    <label for="marriage" class="block mb-2 text-sm font-normal text-[#13545C]">Marriage</label>
                    <select name="statuskawin_nasabah" id="marriage" class="bg-gray-50 border border-[#29BCCF] text-gray-900 text-sm rounded-[30px] w-full identity" required disabled>
                        <option value="{{ $nasabah->statuskawin_nasabah }}">Single</option>
                        <option value="married">Married</option>
                        <option value="divorced">Divorced</option>
                        <option value="widowed">Widowed</option>
                        <option value="separated">Separated</option>
                        <option value="in-a-relationship">In a Relationship</option>
                        <option value="engaged">Engaged</option>
                        <option value="domestic-partnership">Domestic Partnership</option>
                    </select>
                </div>
                <div class="mb-4 mt-10">
                    <h1 class="text-center text-xl text-[#13545C] mb-4 font-bold">Security</h1>
                    <hr class="rounded bg-gray-400">
                </div>
                <div class="mb-3">
                    <label class="block mb-2 text-sm font-normal text-[#13545C]" for="Email">Email Address</label>
                    <input id="email" class="bg-gray-50 border border-[#29BCCF] text-gray-900 text-sm rounded-[30px] w-full security" type="email" value="{{ $nasabah->akun->email_akun }}"readonly disabled>
                </div>
                <div class="mb-3">
                    <label class="block mb-2 text-sm font-normal text-[#13545C]" for="number">Phone Number</label>
                    <input name="nohp_nasabah" id="number" class="bg-gray-50 border border-[#29BCCF] text-gray-900 text-sm rounded-[30px] w-full security" type="text" value="{{ $nasabah->nohp_nasabah }}" required disabled>
                </div>
                <div class="mb-3">
                    <label class="block mb-2 text-sm font-normal text-[#13545C]" for="password">Password</label>
                    <input id="password" class="bg-gray-50 border border-[#29BCCF] text-gray-900 text-sm rounded-[30px] w-full security" type="password" value="********" readonly disabled>
                </div>
                <div class="mb-4 mt-10">
                    <h1 class="text-center text-xl text-[#13545C] mb-4 font-bold">Financial</h1>
                    <hr class="rounded bg-gray-400">
                </div>
                <div class="mb-3">
                    <label for="job" class="block mb-2 text-sm font-normal text-[#13545C]">Job</label>
                    <select name="pekerjaan_nasabah" id="job" value="{{ $nasabah->pekerjaan_nasabah }}" class="bg-gray-50 border border-[#29BCCF] text-gray-900 text-sm rounded-[30px] w-full financial" required disabled>
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
                        <option value="Unemployed">Unemployed</option>
                        <span>{{ $nasabah->pekerjaan_nasabah }}</span>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="income" class="block mb-2 text-sm font-normal text-[#13545C]">Income Range</label>
                    <select name="penghasilan_nasabah" value="{{ $nasabah->penghasilan_nasabah }}" id="income" class="bg-gray-50 border border-[#29BCCF] text-gray-900 text-sm rounded-[30px] w-full financial" required disabled>
                        <option value="<1jt">Less than Rp1 million</option>
                        <option value="1-3jt">Rp1 million - Rp3 million</option>
                        <option value="3-5jt">Rp3 million - Rp5 million</option>
                        <option value="5-10jt">Rp5 million - Rp10 million</option>
                        <option value="10-20jt">Rp10 million - Rp20 million</option>
                        <option value="20-50jt">Rp20 million - Rp50 million</option>
                        <option value=">50jt">More than Rp50 million</option>
                        <option value="no-income">No income</option>
                        <span>{{ $nasabah->penghasilan_nasabah }}</span>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="financialdependents" class="block mb-2 text-sm font-normal text-[#13545C]">Financial Dependents</label>
                    <input type="number" name="tanggungan_nasabah" value="{{ $nasabah->tanggungan_nasabah }}" id="financialdependents" class="bg-gray-50 border border-[#29BCCF] text-gray-900 text-sm rounded-[30px] w-full financial" min="0" value="1" required disabled
                </div>
                <div class="flex justify-center mt-8 gap-4">
                    <button type="button" id="editAllBtn" class="bg-[#29BCCF] hover:bg-[#70d6ff] text-white font-semibold py-2 px-6 rounded-xl transition">Edit</button>
                    <button type="submit" id="saveBtn" class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-6 rounded-xl transition hidden">Save</button>
                </div>
            </form>
        </div>
    </div> <!-- END Main Container -->
    <script>
        function toggleAllEdit() {
    const allInputs = document.querySelectorAll('input, select, textarea');
    allInputs.forEach(el => {
        el.removeAttribute('readonly');
        el.removeAttribute('disabled');
    });
}


        function toggleAllEdit() {
            const allInputs = document.querySelectorAll('input, select, textarea');
            allInputs.forEach(el => {
                el.disabled = false;
            });
        }

        const editBtn = document.getElementById('editAllBtn');
        const saveBtn = document.getElementById('saveBtn');

        editBtn.addEventListener('click', function() {
            toggleAllEdit();
            saveBtn.classList.remove('hidden');
            editBtn.classList.add('hidden');
        });
    </script>
</body>
</html>
