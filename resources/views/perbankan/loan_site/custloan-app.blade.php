<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank BKC - Loan Application</title>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link rel="stylesheet" href="{{ asset('css/loanappbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custloanapp.css') }}">
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-200 font-sans min-h-screen pb-20">
    <!-- Header -->
    <div class="flex px-7 py-8 bg-white mb-5 items-center sticky top-0 z-10 shadow-sm">
        <button class="mr-3" id="backButton">
            <img src="{{ asset('images/arrowblue.png') }}" alt="">
        </button>
        <h1 class="font-extrabold text-3xl text-[#13545C]">Loan Application</h1>
    </div>

    <!-- Step Indicator -->
    <div class="flex flex-col justify-center items-center px-7">
        <p id="stepText" class="text-[#13545C] font-medium">Step 1 of 2</p>
        <div class="w-full flex gap-2 mt-5">
            <div id="step1Indicator" class="loader w-1/2 h-3 rounded-lg step-indicator"></div>
            <div id="step2Indicator" class="bg-white w-1/2 h-3 rounded-lg step-indicator"></div>
        </div>
    </div>

    <!-- Step 1 Form - Personal Information -->
    <form id="step1Form" class="form-step active w-full px-7 mt-5">
        <div class="mb-5">
            <label for="NIK" class="block mb-2 text-sm font-normal text-[#13545C]">NIK</label>
            <input name="nik_nasabah" type="text" id="NIK" class="bg-gray-50 border border-[#D4D6D9] text-gray-900 text-sm rounded-[13px] focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="{{ $nasabahData->nik_nasabah ?? '' }}" disabled/>
        </div>
        <div class="mb-5">
            <label for="fullname" class="block mb-2 text-sm font-normal text-[#13545C]">Full Name</label>
            <input name="nama_nasabah" type="text" id="fullname" class="bg-gray-50 border border-[#D4D6D9] text-gray-900 text-sm rounded-[13px] focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="{{ $nasabahData->nama_nasabah ?? '' }}" disabled/>
        </div>
        <div class="mb-5">
            <label for="ttl" class="block mb-2 text-sm font-normal text-[#13545C]">Birthdate</label>
            <input name="tanggallahir_nasabah" type="date" id="ttl" class="bg-gray-50 border border-[#D4D6D9] text-gray-900 text-sm rounded-[13px] focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="{{ $nasabahData->tanggallahir_nasabah->format('Y-m-d') ?? '' }}" disabled />
        </div>
        <div class="mb-5">
            <label for="gender" class="block mb-2 text-sm font-normal text-[#13545C]">Gender</label>
            <select name="gender_nasabah" id="gender" class="bg-gray-50 border border-[#D4D6D9] text-gray-900 text-sm rounded-[13px] focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" disabled>
                <option value="Male" {{ ($nasabahData->gender_nasabah ?? '') == 'Male' ? 'selected' : '' }}>Male</option>
                <option value="Female" {{ ($nasabahData->gender_nasabah ?? '') == 'Female' ? 'selected' : '' }}>Female</option>
            </select>
        </div>
        <div class="mb-5">
            <label for="job" class="block mb-2 text-sm font-normal text-[#13545C]">Job</label>
            <input name="pekerjaan_nasabah" type="job" id="job" class="bg-gray-50 border border-[#D4D6D9] text-gray-900 text-sm rounded-[13px] focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="{{ $nasabahData->pekerjaan_nasabah ?? '' }}" disabled />
        </div>
        <div class="mb-5">
            <label for="income" class="block mb-2 text-sm font-normal text-[#13545C]">Income Range</label>
            <input name="penghasilan_nasabah" type="income" id="income" class="bg-gray-50 border border-[#D4D6D9] text-gray-900 text-sm rounded-[13px] focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="{{ $nasabahData->penghasilan_nasabah ?? '' }}" disabled />
        </div>
        <div class="mb-5">
            <label for="marriage" class="block mb-2 text-sm font-normal text-[#13545C]">Marriage Status</label>
            <select name="statuskawin_nasabah" id="marriage" class="bg-gray-50 border border-[#D4D6D9] text-gray-900 text-sm rounded-[13px] focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" disabled>
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
            <input name="tanggungan_nasabah" type="number" id="financialdependents" class="bg-gray-50 border border-[#D4D6D9] text-gray-900 text-sm rounded-[13px] focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" min="0" value="{{ $nasabahData->tanggungan_nasabah ?? '' }}" disabled/>
        </div>
        <div class="mb-5">
            <label for="address" class="block mb-2 text-sm font-normal text-[#13545C]">Address</label>
            <input name="alamat_nasabah" type="text" id="address" class="bg-gray-50 border border-[#D4D6D9] text-gray-900 text-sm rounded-[13px] focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="{{ $nasabahData->alamat_nasabah ?? ''}}" disabled/>
        </div>
        <div class="mb-5">
            <label for="number" class="block mb-2 text-sm font-normal text-[#13545C]">Phone Number</label>
            <input name="nohp_nasabah" type="tel" id="number" class="bg-gray-50 border border-[#D4D6D9] text-gray-900 text-sm rounded-[13px] focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="{{ $nasabahData->nohp_nasabah ?? ''}}" disabled/>
        </div>
        <button type="button" id="nextButton" class="mt-3 text-white bg-[#29BBCF] hover:bg-[#1f9cb4] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-[13px] text-sm w-full sm:w-auto px-5 py-2.5 text-center transition-colors duration-300">Confirm</button>
    </form>

    <!-- Step 2 Form - Loan Details -->
    <form id="step2Form" class="form-step w-full px-7 mt-5" method="POST" action="{{ route('nasabah.loan.application') }}">
        @csrf
        <div class="bg-white rounded-md outline outline-1 outline-[#29BBCF] w-full h-auto flex flex-col items-center justify-center p-3 mb-5">
            <p class="text-[#555555] font-medium mb-3">Loan Limit</p>
            <h1 class="text-[#3F455D] font-semibold text-3xl">Rp 250.000.000</h1>
        </div>
        <div class="bg-white rounded-md outline outline-1 outline-[#29BBCF] w-full h-auto flex flex-col p-3 mb-5">
            <p class="text-[#555555] font-medium mb-1">Loan Amount</p>
            <h1 id="loanamount" class="text-[#3F455D] font-semibold text-xl mb-6">Rp 120.000.000</h1>
            <input name="nominal_pengajuankredit" id="loanrange" type="range" min="1000000" max="250000000" step="1000000" value="120000000" class="w-full h-2">
            <div class="flex justify-between mt-2">
                <p class="text-[#9299B5] text-xs">1.000.000</p>
                <p class="text-[#9299B5] text-xs">250.000.000</p>
            </div>
        </div>
        <div class="bg-white rounded-md outline outline-1 outline-[#29BBCF] w-full h-auto flex flex-col p-3 mb-5">
            <p class="text-[#555555] font-medium mb-1">Loan Period</p>
            <h1 id="loanperiod" class="text-[#3F455D] font-semibold text-xl mb-6">12 Months</h1>
            <input name="tenor" id="loanperiodrange" type="range" min="2" max="18" value="12" class="w-full h-2">
            <div class="flex justify-between mt-2">
                <p class="text-[#9299B5] text-xs">2 Months</p>
                <p class="text-[#9299B5] text-xs">18 Months</p>
            </div>
        </div>
        <button type="submit" class="mt-3 text-white bg-[#29BBCF] hover:bg-[#1f9cb4] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-[13px] text-sm w-full sm:w-auto px-5 py-2.5 text-center transition-colors duration-300">Apply Loan</button>
    </form>

    <script>
        // Navigation between steps
        let step = 1
        const step1Form = document.getElementById('step1Form');
        const step2Form = document.getElementById('step2Form');
        const nextButton = document.getElementById('nextButton');
        const backButton = document.getElementById('backButton');
        const stepText = document.getElementById('stepText');
        const step1Indicator = document.getElementById('step1Indicator');
        const step2Indicator = document.getElementById('step2Indicator');

        nextButton.addEventListener('click', () => {
            step = 2
            step1Form.classList.remove('active');
            step2Form.classList.add('active');
            stepText.textContent = 'Step 2 of 2';
            step1Indicator.classList.remove('loader');
            step1Indicator.classList.add('bg-[#5FEE8F]');
            step2Indicator.classList.remove('bg-white');
            step2Indicator.classList.add('loader');
        });

        backButton.addEventListener('click', () => {
            step = 1
            if (step2Form.classList.contains('active')) {
                step2Form.classList.remove('active');
                step1Form.classList.add('active');
                stepText.textContent = 'Step 1 of 2';
                step1Indicator.classList.remove('bg-white');
                step1Indicator.classList.add('loader');
                step2Indicator.classList.remove('loader');
                step2Indicator.classList.add('bg-white');
            } else {
                // If on step 1, back button would go to previous page
                window.location.href = '{{  route('nasabah.loans') }}';
            }
        });

        

        // Range slider functionality for loan amount
        const loanSlider = document.getElementById("loanrange");
        const loanAmountLabel = document.getElementById("loanamount");

        function formatRupiah(val) {
            return 'Rp ' + new Intl.NumberFormat('id-ID').format(val);
        }

        function updateLoanSliderStyle() {
            const val = +loanSlider.value;
            const min = +loanSlider.min;
            const max = +loanSlider.max;
            const percent = ((val - min) / (max - min)) * 100;

            loanSlider.style.background = `linear-gradient(to right, #06b6d4 0%, #06b6d4 ${percent}%, #e5e7eb ${percent}%, #e5e7eb 100%)`;
            loanAmountLabel.innerText = formatRupiah(val);
        }

        loanSlider.addEventListener("input", updateLoanSliderStyle);
        updateLoanSliderStyle();

        // Range slider functionality for loan period
        const periodSlider = document.getElementById("loanperiodrange");
        const periodLabel = document.getElementById("loanperiod");

        function formatPeriod(val) {
            return `${val} Month${val > 1 ? 's' : ''}`;
        }

        function updatePeriodSliderStyle() {
            const val = +periodSlider.value;
            const min = +periodSlider.min;
            const max = +periodSlider.max;
            const percent = ((val - min) / (max - min)) * 100;

            periodSlider.style.background = `linear-gradient(to right, #06b6d4 0%, #06b6d4 ${percent}%, #e5e7eb ${percent}%, #e5e7eb 100%)`;
            periodLabel.innerText = formatPeriod(val);
        }

        periodSlider.addEventListener("input", updatePeriodSliderStyle);
        updatePeriodSliderStyle();
    </script>
</body>
</html>