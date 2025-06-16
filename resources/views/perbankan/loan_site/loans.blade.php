@section('content')
@include('layouts.sidebar')

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Loan Table</title>

  <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
  @vite('resources/css/app.css')
  <style>
    body {
      padding: 40px;
    }

    h2{
        color:#333B69;
    }

    .loan-list {
      max-width: none;
      width: 100%;
      margin: auto;
      margin-top: 0%;
    }

    table {
      width: 100%;
      border-collapse: separate;
      border-spacing: 0 10px; /* jarak antar row */
    }

    tr {
      background-color: white;
      border-radius: 20px;
    }

    td {
      padding: 10px;
      vertical-align: middle;
    }


    .icon {
      width: 60px;
      height: 60px;
      background-color: #FFE0EB;
      padding: 12px;
      border-radius: 20px;
    }
    .peminjaman-label {
      font-size: 13px;
      color: #232323;
      text-align: left;
    }

    .label {
      font-size: 13px;
      color: #232323;
      display: block;
    }

    .value {
      font-size: 13px;
      color: #718EBF;
    }

    .view-button {
      padding: 8px 18px;
      font-size: 14px;
      color: #2e5bff;
      border: 2px solid #2e5bff;
      border-radius: 50px;
      text-decoration: none;
      font-weight: 500;
      transition: 0.3s;
      white-space: nowrap;
    }

    .view-button:hover {
      background-color: #2e5bff;
      color: white;
    }

    /* biar sudut bulat di tr keliatan */
    tr td:first-child {
      border-top-left-radius: 12px;
      border-bottom-left-radius: 12px;

    }

    tr td:last-child {
      border-top-right-radius: 12px;
      border-bottom-right-radius: 12px;
    }

    td:last-child {
    text-align: right;
    }

    td {
    padding-left: 20px;
    padding-right: 30px;
    }
  </style>
</head>
<body>
<div class="main">
    <!-- Summary Card -->
<div style="display: flex; gap: 20px; margin-bottom: 30px;">
  <div style="display: flex; align-items: center; background: white; padding: 20px 20px; border-radius: 25px;">
    <div style="background-color: #FFE0EB;border-radius: 50%; padding: 10px; margin-right: 16px;">
    <img src="images/customerloanicon.png" alt="icon" style="width: 30px; height: 30px;">
    </div>
    <div>
      <div style="font-size: 13px; color: #718EBF;">Customer Loans</div>
      <div id="totalLoans" style="font-size: 18px; font-weight: bold;">Rp. 0</div>
    </div>
  </div>
</div>

    <h2 class="font-semibold text-[22px]" style="text-align: left; margin-bottom: 20px;">Active Loans Overview</h2>
    <div class="loan-list space-y-4">
    @foreach($loans as $loan)
    <div class="bg-white rounded-2xl shadow-md p-4 flex items-center justify-between gap-4 hover:shadow-lg transition-shadow">
        <div class="flex items-center gap-4">
            <img src="{{ asset('images/loanicon.png') }}" class="w-10 h-10" alt="Icon">

            <div>
                <p class="text-sm text-gray-500 font-medium">Loan</p>
                <p class="text-base font-semibold text-[#13545C]">{{ $loan->nasabah->nama_nasabah ?? '-' }}</p>
            </div>
        </div>

        <div class="text-right">
            <p class="text-sm text-gray-500 font-medium">Loan Amount</p>
            <p class="text-lg font-bold text-[#29BBCF]">Rp {{ number_format($loan->nominal_pengajuankredit, 0, ',', '.') }}</p>
        </div>

        <div>
            <a href="{{ route('loans.show', ['id' => $loan->id_pengajuankredit]) }}"
               class="bg-[#29BBCF] hover:bg-[#218fa4] text-white text-sm font-medium py-2 px-4 rounded-full transition-colors">
                View Details
            </a>
        </div>
    </div>
    @endforeach
</div>


<script>
  function parseToNumber(str) {
    return parseInt(str.replace(/\./g, '')) || 0;
  }

  function formatRupiah(number) {
    return "Rp. " + (number / 1000000).toFixed(0) + "JT";
  }

  function updateTotalLoans() {
    const amounts = document.querySelectorAll('.text-lg.font-bold.text-\\[\\#29BBCF\\]');
    let total = 0;

    amounts.forEach((el) => {
      const amountText = el.textContent.replace('Rp ', '').replace(/\./g, '');
      total += parseInt(amountText) || 0;
    });

    document.getElementById('totalLoans').textContent = formatRupiah(total);
  }

  // Jalankan fungsi saat halaman selesai dimuat
  document.addEventListener('DOMContentLoaded', updateTotalLoans);
</script>

</body>
</html>
