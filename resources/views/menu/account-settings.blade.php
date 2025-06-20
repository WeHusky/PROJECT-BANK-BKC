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
    <div class="bg-gray-200 px-4 w-full h-auto">
        <!-- Identity Section -->
        <div class="bg-white rounded-[20px] w-full shadow-sm py-10 transform -translate-y-12 px-7 mb-5">
            <form action="{{ route('nasabah.update', $nasabah->id_nasabah) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <h1 class="text-md text-black mb-1 font-bold">Identity</h1>
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
                    <label class="block mb-2 text-sm font-normal text-[#13545C]">Address</label>
                    <input name="alamat_nasabah" type="text" class="block bg-gray-50 border border-[#29BCCF] text-gray-900 text-sm rounded-[30px] w-full px-3 py-2" value="{{ $nasabah->alamat_nasabah }}" disabled>
                </div>                
                <div class="mb-3">
                    <label class="block mb-2 text-sm font-normal text-[#13545C]" for="kecamatann">Sub-district</label>
                    <select name="kecamatan_nasabah" id="kecamatan" class="bg-gray-50 border border-[#29BCCF] text-gray-900 text-sm rounded-[30px] w-full identity" required disabled>
                        <optgroup label="Cirebon Utara">
                            <option value="Gunung Jati - Cirebon Utara" {{ $nasabah->kecamatan_nasabah == 'Gunung Jati - Cirebon Utara' ? 'selected' : '' }}>Gunung Jati</option>
                            <option value="Kapetakan - Cirebon Utara" {{ $nasabah->kecamatan_nasabah == 'Kapetakan - Cirebon Utara' ? 'selected' : '' }}>Kapetakan</option>
                            <option value="Suranenggala - Cirebon Utara" {{ $nasabah->kecamatan_nasabah == 'Suranenggala - Cirebon Utara' ? 'selected' : '' }}>Suranenggala</option>
                            <option value="Plered - Cirebon Utara" {{ $nasabah->kecamatan_nasabah == 'Plered - Cirebon Utara' ? 'selected' : '' }}>Plered</option>
                            <option value="Mundu - Cirebon Utara" {{ $nasabah->kecamatan_nasabah == 'Mundu - Cirebon Utara' ? 'selected' : '' }}>Mundu</option>
                            <option value="Astanajapura - Cirebon Utara" {{ $nasabah->kecamatan_nasabah == 'Astanajapura - Cirebon Utara' ? 'selected' : '' }}>Astanajapura</option>
                            <option value="Gebang - Cirebon Utara" {{ $nasabah->kecamatan_nasabah == 'Gebang - Cirebon Utara' ? 'selected' : '' }}>Gebang</option>
                        </optgroup>

                        <optgroup label="Cirebon Timur">
                            <option value="Losari - Cirebon Timur" {{ $nasabah->kecamatan_nasabah == 'Losari - Cirebon Timur' ? 'selected' : '' }}>Losari</option>
                            <option value="Pabedilan - Cirebon Timur" {{ $nasabah->kecamatan_nasabah == 'Pabedilan - Cirebon Timur' ? 'selected' : '' }}>Pabedilan</option>
                            <option value="Babakan - Cirebon Timur" {{ $nasabah->kecamatan_nasabah == 'Babakan - Cirebon Timur' ? 'selected' : '' }}>Babakan</option>
                            <option value="Waled - Cirebon Timur" {{ $nasabah->kecamatan_nasabah == 'Waled - Cirebon Timur' ? 'selected' : '' }}>Waled</option>
                            <option value="Ciledug - Cirebon Timur" {{ $nasabah->kecamatan_nasabah == 'Ciledug - Cirebon Timur' ? 'selected' : '' }}>Ciledug</option>
                            <option value="Pasaleman - Cirebon Timur" {{ $nasabah->kecamatan_nasabah == 'Pasaleman - Cirebon Timur' ? 'selected' : '' }}>Pasaleman</option>
                            <option value="Pangenan - Cirebon Timur" {{ $nasabah->kecamatan_nasabah == 'Pangenan - Cirebon Timur' ? 'selected' : '' }}>Pangenan</option>
                        </optgroup>

                        <optgroup label="Cirebon Barat">
                            <option value="Susukan - Cirebon Barat" {{ $nasabah->kecamatan_nasabah == 'Susukan - Cirebon Barat' ? 'selected' : '' }}>Susukan</option>
                            <option value="Gegesik - Cirebon Barat" {{ $nasabah->kecamatan_nasabah == 'Gegesik - Cirebon Barat' ? 'selected' : '' }}>Gegesik</option>
                            <option value="Kaliwedi - Cirebon Barat" {{ $nasabah->kecamatan_nasabah == 'Kaliwedi - Cirebon Barat' ? 'selected' : '' }}>Kaliwedi</option>
                            <option value="Arjawinangun - Cirebon Barat" {{ $nasabah->kecamatan_nasabah == 'Arjawinangun - Cirebon Barat' ? 'selected' : '' }}>Arjawinangun</option>
                        </optgroup>

                        <optgroup label="Cirebon Selatan">
                            <option value="Beber - Cirebon Selatan" {{ $nasabah->kecamatan_nasabah == 'Beber - Cirebon Selatan' ? 'selected' : '' }}>Beber</option>
                            <option value="Greged - Cirebon Selatan" {{ $nasabah->kecamatan_nasabah == 'Greged - Cirebon Selatan' ? 'selected' : '' }}>Greged</option>
                            <option value="Talun - Cirebon Selatan" {{ $nasabah->kecamatan_nasabah == 'Talun - Cirebon Selatan' ? 'selected' : '' }}>Talun</option>
                            <option value="Sumber - Cirebon Selatan" {{ $nasabah->kecamatan_nasabah == 'Sumber - Cirebon Selatan' ? 'selected' : '' }}>Sumber</option>
                            <option value="Dukupuntang - Cirebon Selatan" {{ $nasabah->kecamatan_nasabah == 'Dukupuntang - Cirebon Selatan' ? 'selected' : '' }}>Dukupuntang</option>
                        </optgroup>

                        <optgroup label="Cirebon Tengah / Sekitar Kota">
                            <option value="Kedawung - Cirebon Tengah" {{ $nasabah->kecamatan_nasabah == 'Kedawung - Cirebon Tengah' ? 'selected' : '' }}>Kedawung</option>
                            <option value="Weru - Cirebon Tengah" {{ $nasabah->kecamatan_nasabah == 'Weru - Cirebon Tengah' ? 'selected' : '' }}>Weru</option>
                            <option value="Klangenan - Cirebon Tengah" {{ $nasabah->kecamatan_nasabah == 'Klangenan - Cirebon Tengah' ? 'selected' : '' }}>Klangenan</option>
                            <option value="Jamblang - Cirebon Tengah" {{ $nasabah->kecamatan_nasabah == 'Jamblang - Cirebon Tengah' ? 'selected' : '' }}>Jamblang</option>
                        </optgroup>

                        <optgroup label="Kota Cirebon">
                            <option value="Harjamukti - Kota Cirebon" {{ $nasabah->kecamatan_nasabah == 'Harjamukti - Kota Cirebon' ? 'selected' : '' }}>Harjamukti</option>
                            <option value="Lemahwungkuk - Kota Cirebon" {{ $nasabah->kecamatan_nasabah == 'Lemahwungkuk - Kota Cirebon' ? 'selected' : '' }}>Lemahwungkuk</option>
                            <option value="Kejaksan - Kota Cirebon" {{ $nasabah->kecamatan_nasabah == 'Kejaksan - Kota Cirebon' ? 'selected' : '' }}>Kejaksan</option>
                            <option value="Pekalipan - Kota Cirebon" {{ $nasabah->kecamatan_nasabah == 'Pekalipan - Kota Cirebon' ? 'selected' : '' }}>Pekalipan</option>
                            <option value="Kesambi - Kota Cirebon" {{ $nasabah->kecamatan_nasabah == 'Kesambi - Kota Cirebon' ? 'selected' : '' }}>Kesambi</option>
                        </optgroup>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="gender" class="block mb-2 text-sm font-normal text-[#13545C]">Gender</label>
                    <select name="gender_nasabah" id="gender" class="bg-gray-50 border border-[#29BCCF] text-gray-900 text-sm rounded-[30px] w-full identity" required disabled>
                        <option value="male" {{ $nasabah->gender_nasabah == 'male' ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ $nasabah->gender_nasabah == 'female' ? 'selected' : '' }}>Female</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="marriage" class="block mb-2 text-sm font-normal text-[#13545C]">Marriage</label>
                    <select name="statuskawin_nasabah" id="marriage" class="bg-gray-50 border border-[#29BCCF] text-gray-900 text-sm rounded-[30px] w-full identity" required disabled>
                        <option value="single" {{ $nasabah->statuskawin_nasabah == 'single' ? 'selected' : '' }}>Single</option>
                        <option value="married" {{ $nasabah->statuskawin_nasabah == 'married' ? 'selected' : '' }}>Married</option>
                        <option value="divorced" {{ $nasabah->statuskawin_nasabah == 'divorced' ? 'selected' : '' }}>Divorced</option>
                        <option value="widowed" {{ $nasabah->statuskawin_nasabah == 'widowed' ? 'selected' : '' }}>Widowed</option>
                        <option value="separated" {{ $nasabah->statuskawin_nasabah == 'separated' ? 'selected' : '' }}>Separated</option>
                        <option value="in-a-relationship" {{ $nasabah->statuskawin_nasabah == 'in-a-relationship' ? 'selected' : '' }}>In a Relationship</option>
                        <option value="engaged" {{ $nasabah->statuskawin_nasabah == 'engaged' ? 'selected' : '' }}>Engaged</option>
                        <option value="domestic-partnership" {{ $nasabah->statuskawin_nasabah == 'domestic-partnership' ? 'selected' : '' }}>Domestic Partnership</option>
                    </select>
                </div>
                <div class="mb-4 mt-10">
                    <h1 class="text-md text-black mb-1 font-bold">Security</h1>
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
                    <h1 class="text-md text-black mb-1 font-bold">Financial</h1>
                    <hr class="rounded bg-gray-400">
                </div>
                <div class="mb-3">
                    <label for="job" class="block mb-2 text-sm font-normal text-[#13545C]">Job</label>
                    <select name="pekerjaan_nasabah" id="job" class="bg-gray-50 border border-[#29BCCF] text-gray-900 text-sm rounded-[30px] w-full financial" required disabled>
                        <option value="Software Engineer" {{ $nasabah->pekerjaan_nasabah == 'Software Engineer' ? 'selected' : '' }}>Software Engineer</option>
                        <option value="Doctor" {{ $nasabah->pekerjaan_nasabah == 'Doctor' ? 'selected' : '' }}>Doctor</option>
                        <option value="Teacher" {{ $nasabah->pekerjaan_nasabah == 'Teacher' ? 'selected' : '' }}>Teacher</option>
                        <option value="Accountant" {{ $nasabah->pekerjaan_nasabah == 'Accountant' ? 'selected' : '' }}>Accountant</option>
                        <option value="Mechanic" {{ $nasabah->pekerjaan_nasabah == 'Mechanic' ? 'selected' : '' }}>Mechanic</option>
                        <option value="Nurse" {{ $nasabah->pekerjaan_nasabah == 'Nurse' ? 'selected' : '' }}>Nurse</option>
                        <option value="Electrician" {{ $nasabah->pekerjaan_nasabah == 'Electrician' ? 'selected' : '' }}>Electrician</option>
                        <option value="Plumber" {{ $nasabah->pekerjaan_nasabah == 'Plumber' ? 'selected' : '' }}>Plumber</option>
                        <option value="Designer" {{ $nasabah->pekerjaan_nasabah == 'Designer' ? 'selected' : '' }}>Designer</option>
                        <option value="Manager" {{ $nasabah->pekerjaan_nasabah == 'Manager' ? 'selected' : '' }}>Manager</option>
                        <option value="Architect" {{ $nasabah->pekerjaan_nasabah == 'Architect' ? 'selected' : '' }}>Architect</option>
                        <option value="Artist" {{ $nasabah->pekerjaan_nasabah == 'Artist' ? 'selected' : '' }}>Artist</option>
                        <option value="Chef" {{ $nasabah->pekerjaan_nasabah == 'Chef' ? 'selected' : '' }}>Chef</option>
                        <option value="Engineer" {{ $nasabah->pekerjaan_nasabah == 'Engineer' ? 'selected' : '' }}>Engineer</option>
                        <option value="Entrepreneur" {{ $nasabah->pekerjaan_nasabah == 'Entrepreneur' ? 'selected' : '' }}>Entrepreneur</option>
                        <option value="Lawyer" {{ $nasabah->pekerjaan_nasabah == 'Lawyer' ? 'selected' : '' }}>Lawyer</option>
                        <option value="Pharmacist" {{ $nasabah->pekerjaan_nasabah == 'Pharmacist' ? 'selected' : '' }}>Pharmacist</option>
                        <option value="Pilot" {{ $nasabah->pekerjaan_nasabah == 'Pilot' ? 'selected' : '' }}>Pilot</option>
                        <option value="Scientist" {{ $nasabah->pekerjaan_nasabah == 'Scientist' ? 'selected' : '' }}>Scientist</option>
                        <option value="Unemployed" {{ $nasabah->pekerjaan_nasabah == 'Unemployed' ? 'selected' : '' }}>Unemployed</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="income" class="block mb-2 text-sm font-normal text-[#13545C]">Income Range</label>
                    <select name="penghasilan_nasabah" id="income" class="bg-gray-50 border border-[#29BCCF] text-gray-900 text-sm rounded-[30px] w-full financial" required disabled>
                        <option value="<1jt" {{ $nasabah->penghasilan_nasabah == '<1jt' ? 'selected' : '' }}>Less than Rp1 million</option>
                        <option value="1-3jt" {{ $nasabah->penghasilan_nasabah == '1-3jt' ? 'selected' : '' }}>Rp1 million - Rp3 million</option>
                        <option value="3-5jt" {{ $nasabah->penghasilan_nasabah == '3-5jt' ? 'selected' : '' }}>Rp3 million - Rp5 million</option>
                        <option value="5-10jt" {{ $nasabah->penghasilan_nasabah == '5-10jt' ? 'selected' : '' }}>Rp5 million - Rp10 million</option>
                        <option value="10-20jt" {{ $nasabah->penghasilan_nasabah == '10-20jt' ? 'selected' : '' }}>Rp10 million - Rp20 million</option>
                    </select>

                </div>
                <div class="mb-3">
                    <label for="financialdependents" class="block mb-2 text-sm font-normal text-[#13545C]">Financial Dependents</label>
                    <input type="number" name="tanggungan_nasabah" value="{{ $nasabah->tanggungan_nasabah }}" id="financialdependents" class="bg-gray-50 border border-[#29BCCF] text-gray-900 text-sm rounded-[30px] w-full financial" min="0" value="1" required disabled>
                </div>
                <div class="flex justify-center mt-8 gap-4">
                    <button type="button" id="editAllBtn" class="bg-[#29BCCF] hover:bg-[#70d6ff] text-white font-semibold py-2 px-6 rounded-xl transition">Edit</button>
                    <button type="button" id="saveBtn" class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-6 rounded-xl transition hidden">Save</button>
                </div>
            </form>
        </div>
        <!-- Confirmation Modal -->
        <div id="confirmationModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full z-50 flex items-center justify-center transition-opacity duration-900 ease-in-out">
            <div class="relative mx-auto p-5 border w-96 shadow-lg rounded-md bg-white transform transition-all duration-300 ease-in-out scale-95 opacity-0" id="modalContent">
                <div class="mt-3 text-center">
                    <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-[#29BCCF]">
                        <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-lg leading-6 font-medium text-gray-900 mt-4">Confirm Changes</h3>
                    <div class="mt-2 px-7 py-3">
                        <p class="text-sm text-gray-500">
                            Are you sure you want to save these changes to your account?
                        </p>
                    </div>
                    <div class="flex justify-center gap-4 mt-4">
                        <button id="cancelBtn" class="px-4 py-2 bg-gray-300 text-gray-700 text-base font-medium rounded-md shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-300">
                            Cancel
                        </button>
                        <button id="confirmSaveBtn" class="px-4 py-2 bg-green-600 text-white text-base font-medium rounded-md shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                            Save Changes
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- END Main Container -->
    <script>
        function toggleAllEdit() {
            const allInputs = document.querySelectorAll('input, select, textarea');
            allInputs.forEach(el => {
                el.disabled = false;
            });
        }

        const editBtn = document.getElementById('editAllBtn');
        const saveBtn = document.getElementById('saveBtn');
        const confirmationModal = document.getElementById('confirmationModal');
        const modalContent = document.getElementById('modalContent');
        const cancelBtn = document.getElementById('cancelBtn');
        const confirmSaveBtn = document.getElementById('confirmSaveBtn');
        const form = document.querySelector('form');

        editBtn.addEventListener('click', function() {
            toggleAllEdit();
            saveBtn.classList.remove('hidden');
            editBtn.classList.add('hidden');
        });

        saveBtn.addEventListener('click', function() {
            confirmationModal.classList.remove('hidden');
            // Trigger animation
            setTimeout(() => {
                modalContent.classList.remove('scale-95', 'opacity-0');
                modalContent.classList.add('scale-100', 'opacity-100');
            }, 10);
        });

        function hideModal() {
            modalContent.classList.remove('scale-100', 'opacity-100');
            modalContent.classList.add('scale-95', 'opacity-0');
            setTimeout(() => {
                confirmationModal.classList.add('hidden');
            }, 300);
        }

        cancelBtn.addEventListener('click', hideModal);
        confirmSaveBtn.addEventListener('click', function() {
            form.submit();
        });

        // Close modal when clicking outside
        window.addEventListener('click', function(event) {
            if (event.target === confirmationModal) {
                hideModal();
            }
        });
    </script>
</body>
</html>
