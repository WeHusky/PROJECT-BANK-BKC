<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BKC - Loan Application</title>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link rel="stylesheet" href="{{ asset('css/animation.css') }}">
    <script src="//unpkg.com/alpinejs" defer></script>
    @vite('resources/css/app.css')
    <style>
        body {
            background: linear-gradient(to bottom right, #f0fdfa, #e0f7fa);
            font-family: 'Inter', sans-serif;
        }
        .form-step {
            display: none;
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.4s ease, transform 0.4s ease;
        }
        .form-step.active {
            display: block;
            opacity: 1;
            transform: translateY(0);
        }
        .step-indicator {
            transition: all 0.3s ease-in-out;
        }
        .loader {
            background: linear-gradient(to right, #0ea5e9, #06b6d4);
            animation: progress 1s ease-out forwards;
        }
        @keyframes progress {
            from { width: 0; }
            to { width: 100%; }
        }
        #toast {
            position: fixed;
            top: 1rem;
            right: 1rem;
            background-color: #29BBCF;
            color: white;
            padding: 0.75rem 1.25rem;
            border-radius: 0.5rem;
            box-shadow: 0 4px 10px rgba(0,0,0,0.15);
            z-index: 50;
            display: none;
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen pb-32">
    <div id="toast">Proceeding to Step 2</div>
    <div class="sticky top-0 z-10 bg-white shadow-sm px-7 py-8 flex items-center gap-3">
        <button id="backButton">
            <img src="{{ asset('images/arrowblue.png') }}" alt="Back" class="pop">
        </button>
        <h1 class="text-3xl font-extrabold text-[#13545C]">Loan Application</h1>
    </div>
    <div class="text-center mt-6">
        <p id="stepText" class="text-lg text-[#13545C] font-medium">Step 1 of 2</p>
        <div class="flex justify-center gap-2 px-10 mt-3">
            <div id="step1Indicator" class="loader w-1/2 h-3 rounded-full"></div>
            <div id="step2Indicator" class="bg-white w-1/2 h-3 rounded-full border border-gray-300"></div>
        </div>
    </div>
    <div x-data="{ showSkeleton: true, showToast: false, toastMsg: '', loading: false }" x-init="setTimeout(() => showSkeleton = false, 1000)" class="relative">
        <div x-show="showToast" x-transition class="fixed top-5 right-5 bg-[#29BBCF] text-white px-6 py-3 rounded-xl shadow-lg z-50">
            <span x-text="toastMsg"></span>
        </div>
        <div class="px-4">
            <form id="step1Form" class="form-step active w-full px-5 mt-6 bg-white py-6 rounded-2xl shadow-md">
                @foreach ([
                    'NIK' => 'nik_nasabah',
                    'Full Name' => 'nama_nasabah',
                    'Birthdate' => 'tanggallahir_nasabah',
                    'Gender' => 'gender_nasabah',
                    'Job' => 'pekerjaan_nasabah',
                    'Income Range' => 'penghasilan_nasabah',
                    'Marriage Status' => 'statuskawin_nasabah',
                    'Financial Dependents' => 'tanggungan_nasabah',
                    'Sub-district' => 'kecamatan_nasabah',
                    'Address' => 'alamat_nasabah',
                    'Phone Number' => 'nohp_nasabah',
                ] as $label => $name)
                    <div class="mb-4">
                        <label for="{{ $name }}" class="block mb-1 text-sm font-medium text-[#13545C]">{{ $label }}</label>
                        <input type="text" id="{{ $name }}" name="{{ $name }}"
                            class="bg-gray-100 border border-[#29BBCF] text-gray-900 text-sm rounded-xl block w-full p-2.5"
                            value="@if($name === 'tanggallahir_nasabah' && !empty($nasabahData->$name)){{ \Carbon\Carbon::parse($nasabahData->$name)->format('d/m/Y') }}@else{{ $nasabahData->$name ?? '' }}@endif"
                            disabled>
                    </div>
                @endforeach
                <button type="button" id="nextButton" class="mt-6 w-full bg-[#29BBCF] hover:bg-[#189ab2] text-white font-semibold py-2.5 rounded-xl transition duration-200">Confirm</button>
            </form>
        </div>
        <form id="step2Form" class="form-step w-full px-6 mt-6" method="POST" action="{{ route('nasabah.loan.application') }}"
            x-on:submit.prevent="loading = true; $nextTick(() => $el.submit());">
            @csrf
            <div class="bg-white rounded-2xl shadow-md p-5 mb-4 text-center">
                <p class="text-gray-500 font-medium">Loan Limit</p>
                <h1 class="text-3xl font-semibold text-gray-800 mt-1">Rp 250.000.000</h1>
            </div>
            <div class="bg-white rounded-2xl shadow-md p-5 mb-4">
                <p class="text-gray-500 font-medium mb-1">Loan Amount</p>
                <h1 id="loanamount" class="text-xl font-semibold text-gray-800 mb-2">Rp 120.000.000</h1>
                <input name="nominal_pengajuankredit" id="loanrange" type="range" min="1000000" max="250000000" step="1000000" value="120000000" class="w-full">
                <div class="flex justify-between text-xs text-gray-400 mt-1">
                    <span>1.000.000</span><span>250.000.000</span>
                </div>
            </div>
            <div class="bg-white rounded-2xl shadow-md p-5 mb-4">
                <p class="text-gray-500 font-medium mb-1">Loan Period</p>
                <h1 id="loanperiod" class="text-xl font-semibold text-gray-800 mb-2">12 Months</h1>
                <input name="tenor" id="loanperiodrange" type="range" min="2" max="18" value="12" class="w-full">
                <div class="flex justify-between text-xs text-gray-400 mt-1">
                    <span>2 Months</span><span>18 Months</span>
                </div>
            </div>
            <div class="bg-white rounded-2xl shadow-md p-5 mb-4 text-center">
                <p class="text-gray-500 font-medium">Estimated Monthly Installment</p>
                <h1 id="monthlyInstallment" class="text-xl font-semibold text-gray-800 mt-1">Rp 0</h1>
                <p class="text-sm text-gray-400 mt-1">*Including estimated 2,5% interest per annum</p>
            </div>
            <div class="bg-white rounded-2xl shadow-md p-5 mb-6">
                <h2 class="text-lg font-semibold text-[#13545C] mb-4">Previous Loan Applications</h2>
                <template x-if="showSkeleton">
                    <ul class="divide-y divide-gray-200 animate-pulse">
                        <template x-for="i in 3" :key="i">
                            <li class="py-2 flex justify-between text-sm">
                                <span class="bg-gray-200 rounded w-32 h-4 block"></span>
                                <span class="bg-gray-200 rounded w-16 h-4 block"></span>
                            </li>
                        </template>
                    </ul>
                </template>
                <ul class="divide-y divide-gray-200" x-show="!showSkeleton">
                    @forelse($historyPengajuan as $pengajuan)
                        <li class="py-2 flex justify-between text-sm text-gray-700 transition hover:bg-[#f0f4f8] rounded-lg cursor-pointer">
                            <span>{{ $pengajuan->tanggal_pengajuankredit->format('d M Y') }} - Rp {{ number_format($pengajuan->nominal_pengajuankredit, 0, ',', '.') }}</span>
                            @php
                                $statusColor = match($pengajuan->status_pengajuankredit) {
                                    'Approved' => 'text-green-600',
                                    'Rejected' => 'text-red-500',
                                    'Under Review' => 'text-blue-500',
                                    'Awaiting Date Confirmation' => 'text-yellow-500',
                                    'Cancelled' => 'text-pink-500',
                                    default => 'text-gray-500'
                                };
                            @endphp
                            <span class="{{ $statusColor }} font-medium">{{ $pengajuan->status_pengajuankredit }}</span>
                        </li>
                    @empty
                        <li class="py-2 text-sm text-gray-400">No loan application history available.</li>
                    @endforelse
                </ul>
            </div>
            <div x-data="{ open: false, selected: null }" class="relative w-full mb-5">
                <div @click="open = !open" class="cursor-pointer bg-white rounded-xl shadow-md p-4 flex justify-between items-center">
                    <div class="flex items-center space-x-3">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/0/04/Mastercard-logo.png" alt="Mastercard" class="w-8 h-5 object-contain" />
                        <span x-text="selected ?? 'Select Bank Account'" class="text-gray-700 font-medium"></span>
                    </div>
                    <svg :class="{ 'rotate-90': open }" class="h-5 w-5 text-gray-400 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </div>
                <div x-show="open" x-transition class="absolute z-10 bg-white border border-gray-200 rounded-xl w-full mt-1 shadow-lg max-h-60 overflow-y-auto">
                    <label class="flex items-center px-4 py-3 hover:bg-gray-100 cursor-pointer">
                        <input type="radio" name="rekening_nasabah" value="{{ $nasabahData->rekening_nasabah }}" x-model="selected" class="form-radio text-[#29BBCF] mr-2" required>
                        <span class="text-gray-800 text-sm">{{ $nasabahData->rekening_nasabah }}</span>
                    </label>
                </div>
            </div>
            <button type="submit"
                class="w-full bg-[#29BBCF] hover:bg-[#189ab2] text-white font-semibold py-2.5 rounded-xl transition duration-200 flex items-center justify-center gap-2">
                Apply Loan
            </button>
        </form>
    </div>
    <script>
        const step1Form = document.getElementById('step1Form');
        const step2Form = document.getElementById('step2Form');
        const nextButton = document.getElementById('nextButton');
        const backButton = document.getElementById('backButton');
        const stepText = document.getElementById('stepText');
        const step1Indicator = document.getElementById('step1Indicator');
        const step2Indicator = document.getElementById('step2Indicator');
        const toast = document.getElementById('toast');

        nextButton.addEventListener('click', () => {
            step1Form.classList.remove('active');
            step2Form.classList.add('active');
            stepText.textContent = 'Step 2 of 2';
            step1Indicator.classList.remove('loader');
            step1Indicator.classList.add('bg-[#5FEE8F]');
            step2Indicator.classList.remove('bg-white');
            step2Indicator.classList.add('loader');
            step2Form.scrollIntoView({ behavior: 'smooth' });
        });

        backButton.addEventListener('click', () => {
            if (step2Form.classList.contains('active')) {
                step2Form.classList.remove('active');
                step1Form.classList.add('active');
                stepText.textContent = 'Step 1 of 2';
                step1Indicator.classList.remove('bg-[#5FEE8F]');
                step1Indicator.classList.add('loader');
                step2Indicator.classList.remove('loader');
                step2Indicator.classList.add('bg-white');
            } else {
                window.location.href = '{{ route('nasabah.loans') }}';
            }
        });

        const loanSlider = document.getElementById("loanrange");
        const loanAmountLabel = document.getElementById("loanamount");
        const periodSlider = document.getElementById("loanperiodrange");
        const periodLabel = document.getElementById("loanperiod");
        const monthlyInstallment = document.getElementById("monthlyInstallment");

        function updateInstallment() {
            const principal = parseInt(loanSlider.value);
            const months = parseInt(periodSlider.value);
            const interestRate = 0.025;
            const totalInterest = principal * interestRate * (months / 12);
            const monthlyPayment = (principal + totalInterest) / months;

            loanAmountLabel.innerText = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(principal);
            periodLabel.innerText = `${months} Month${months > 1 ? 's' : ''}`;
            monthlyInstallment.innerText = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(Math.round(monthlyPayment));
        }

        loanSlider.addEventListener("input", updateInstallment);
        periodSlider.addEventListener("input", updateInstallment);
        updateInstallment();

        document.addEventListener('alpine:init', () => {
            Alpine.data('loanForm', () => ({
                showSkeleton: true,
                showToast: false,
                toastMsg: '',
                loading: false,
                showSuccess(msg) {
                    this.toastMsg = msg;
                    this.showToast = true;
                    setTimeout(() => this.showToast = false, 25000);
                }
            }));
        });

        function showSuccess(msg) {
            document.querySelector('[x-data]').__x.$data.showToast = true;
            document.querySelector('[x-data]').__x.$data.toastMsg = msg;
            setTimeout(() => {
                document.querySelector('[x-data]').__x.$data.showToast = false;
            }, 2500);
        }
    </script>
</body>
</html>