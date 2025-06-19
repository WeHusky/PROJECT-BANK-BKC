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
        <div class="body bg-white rounded-tl-[45px] rounded-tr-[45px] w-screen h-auto px-7 mb-10">
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-5" role="alert">
                    <strong class="font-bold">Oops! Ada kesalahan:</strong>
                    <ul class="mt-2 list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form class="w-full max-w-full mx-auto pt-10" method="POST" action="{{ route('nasabah.register') }}">
                @csrf
                <div class="mb-5">
                        <label for="NIK" class="block mb-2 text-sm font-normal text-[#13545C]">NIK</label>
                        <input name="nik_nasabah" type="text" id="NIK" class="bg-gray-50 border border-[#29BBCF] text-gray-900 text-sm rounded-[30px] focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-0" placeholder="Enter as stated on your ID card" required />
                </div>
                <div class="mb-5">
                    <label for="fullname" class="block mb-2 text-sm font-normal text-[#13545C]">Full Name</label>
                    <input name="nama_nasabah" type="text" id="fullname" class="bg-gray-50 border border-[#29BBCF] text-gray-900 text-sm rounded-[30px] focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-0" placeholder="John Doe" required />
                </div>
                <div class="mb-5">
                    <label for="ttl" class="block mb-2 text-sm font-normal text-[#13545C]">Birthdate</label>
                    <input name="tanggallahir_nasabah" type="date" id="ttl" class="bg-gray-50 border border-[#29BBCF] text-gray-900 text-sm rounded-[30px] focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-0" required />
                </div>
                <div class="mb-5">
                    <label for="kecamatan" class="block mb-2 text-sm font-normal text-[#13545C]">Sub-district</label>
                    <select name="kecamatan_nasabah" id="kecamatan" class="bg-gray-50 border border-[#29BBCF] text-gray-900 text-sm rounded-[30px] focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                        <option value="" disabled selected>Enter as stated on your ID card</option>
                        <optgroup label="Cirebon Utara">
                            <option value="Gunung Jati - Cirebon Utara">Gunung Jati</option>
                            <option value="Kapetakan - Cirebon Utara">Kapetakan</option>
                            <option value="Suranenggala - Cirebon Utara">Suranenggala</option>
                            <option value="Plered - Cirebon Utara">Plered</option>
                            <option value="Mundu - Cirebon Utara">Mundu</option>
                            <option value="Astanajapura - Cirebon Utara">Astanajapura</option>
                            <option value="Gebang - Cirebon Utara">Gebang</option>
                        </optgroup>

                        <optgroup label="Cirebon Timur">
                            <option value="Losari - Cirebon Timur">Losari</option>
                            <option value="Pabedilan - Cirebon Timur">Pabedilan</option>
                            <option value="Babakan - Cirebon Timur">Babakan</option>
                            <option value="Waled - Cirebon Timur">Waled</option>
                            <option value="Ciledug - Cirebon Timur">Ciledug</option>
                            <option value="Pasaleman - Cirebon Timur">Pasaleman</option>
                            <option value="Pangenan - Cirebon Timur">Pangenan</option>
                        </optgroup>

                        <optgroup label="Cirebon Barat">
                            <option value="Susukan - Cirebon Barat">Susukan</option>
                            <option value="Gegesik - Cirebon Barat">Gegesik</option>
                            <option value="Kaliwedi - Cirebon Barat">Kaliwedi</option>
                            <option value="Arjawinangun - Cirebon Barat">Arjawinangun</option>
                        </optgroup>

                        <optgroup label="Cirebon Selatan">
                            <option value="Beber - Cirebon Selatan">Beber</option>
                            <option value="Greged - Cirebon Selatan">Greged</option>
                            <option value="Talun - Cirebon Selatan">Talun</option>
                            <option value="Sumber - Cirebon Selatan">Sumber</option>
                            <option value="Dukupuntang - Cirebon Selatan">Dukupuntang</option>
                        </optgroup>

                        <optgroup label="Cirebon Tengah / Sekitar Kota">
                            <option value="Kedawung - Cirebon Tengah">Kedawung</option>
                            <option value="Weru - Cirebon Tengah">Weru</option>
                            <option value="Klangenan - Cirebon Tengah">Klangenan</option>
                            <option value="Jamblang - Cirebon Tengah">Jamblang</option>
                        </optgroup>

                        <optgroup label="Kota Cirebon">
                            <option value="Harjamukti - Kota Cirebon">Harjamukti</option>
                            <option value="Lemahwungkuk - Kota Cirebon">Lemahwungkuk</option>
                            <option value="Kejaksan - Kota Cirebon">Kejaksan</option>
                            <option value="Pekalipan - Kota Cirebon">Pekalipan</option>
                            <option value="Kesambi - Kota Cirebon">Kesambi</option>
                        </optgroup>
                    </select>
                </div>
                <div class="mb-5">
                    <label for="address" class="block mb-2 text-sm font-normal text-[#13545C]">Address</label>
                    <input name="alamat_nasabah" type="text" id="address" class="bg-gray-50 border border-[#29BBCF] text-gray-900 text-sm rounded-[30px] focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-0" placeholder="Enter as stated on your ID card required"/>
                </div>
                <div class="mb-5">
                    <label for="gender" class="block mb-2 text-sm font-normal text-[#13545C]">Gender</label>
                    <select name="gender_nasabah" id="gender" class="bg-gray-50 border border-[#29BBCF] text-gray-900 text-sm rounded-[30px] focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-0">
                        <option value="" selected>Pick your gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                <div class="mb-5">
                    <label for="job" class="block mb-2 text-sm font-normal text-[#13545C]">Job</label>
                    <select name="pekerjaan_nasabah" id="job" class="bg-gray-50 border border-[#29BBCF] text-gray-900 text-sm rounded-[30px] focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-0">
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
                    <select name="penghasilan_nasabah" id="income" class="bg-gray-50 border border-[#29BBCF] text-gray-900 text-sm rounded-[30px] focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-0">
                        <option value="<1jt">Less than Rp1 million</option>
                        <option value="1-3jt">Rp1 million - Rp3 million</option>
                        <option value="3-5jt">Rp3 million - Rp5 million</option>
                        <option value="5-10jt">Rp5 million - Rp10 million</option>
                        <option value="10-20jt">Rp10 million - Rp20 million</option>
                        <option value="20-50jt">Rp20 million - Rp50 million</option>
                        <option value=">50jt">More than Rp50 million</option>
                        <option value="No Income" selected>No income</option>
                    </select>
                </div>
                <div class="mb-5">
                    <label for="marriage" class="block mb-2 text-sm font-normal text-[#13545C]">Marriage Status</label>
                    <select name="statuskawin_nasabah" id="marriage" class="bg-gray-50 border border-[#29BBCF] text-gray-900 text-sm rounded-[30px] focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-0">
                        <option value="Single" selected>Single</option>
                        <option value="Married">Married</option>
                    </select>
                </div>
                <div class="mb-5">
                    <label for="financialdependents" class="block mb-2 text-sm font-normal text-[#13545C]">Financial Dependents</label>
                    <input name="tanggungan_nasabah" type="number" id="financialdependents" class="bg-gray-50 border border-[#29BBCF] text-gray-900 text-sm rounded-[30px] focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-0" min="0" placeholder="Number of financial dependents" required />
                </div>
                <div class="mb-5">
                    <label for="email" class="block mb-2 text-sm font-normal text-[#13545C]">Email Address</label>
                    <input name="email_akun" type="email" id="email" class="bg-gray-50 border border-[#29BBCF] text-gray-900 text-sm rounded-[30px] focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-0" placeholder="name@email.com" required />
                </div>
                <div class="mb-5">
                    <label for="username" class="block mb-2 text-sm font-normal text-[#13545C]">Username</label>
                    <input name="username_akun" type="text" id="username" class="bg-gray-50 border border-[#29BBCF] text-gray-900 text-sm rounded-[30px] focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-0" placeholder="Username" required />
                </div>
                <div class="mb-5">
                    <label for="number" class="block mb-2 text-sm font-normal text-[#13545C]">Phone Number</label>
                    <input name="nohp_nasabah" type="tel" id="address" class="bg-gray-50 border border-[#29BBCF] text-gray-900 text-sm rounded-[30px] focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-0" placeholder="08xxxxxxxxxxx" required />
                </div>
                <div class="mb-5">
                    <label for="password" class="block mb-2 text-sm font-normal text-[#13545C]">Password</label>
                    <input name="password_akun" type="password" id="password" class="bg-gray-50 border border-[#29BBCF] text-gray-900 text-sm rounded-[30px] focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-0" placeholder="Password" required />
                </div>
                <div class="mb-5">
                    <label for="password" class="block mb-2 text-sm font-normal text-[#13545C]">Confirm Password</label>
                    <input name="password_akun_confirmation" type="password" id="password" class="bg-gray-50 border border-[#29BBCF] text-gray-900 text-sm rounded-[30px] focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-0" placeholder="Password" required />
                </div>
                <button type="submit" class="mt-3 text-white bg-[#29BBCF] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-[13px] text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
            </form>
        </div>
    </div>
</body>
</html>