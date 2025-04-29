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
    <div class="loan-list">
    <table>
        <!-- Row 1 -->
        <tr>
        <td><img src="{{ asset('images/loanicon.png') }}" class="icon" alt="Icon"></td>
        <td>
            <span class="peminjaman-label font-medium" style="text-align: right;">Loan</span>
        </td>
        <td>
            <span class="label font-medium">Name</span>
            <span class="value font-normal">Lord Iron</span>
        </td>
        <td>
            <span class="label font-medium">Loan Amount</span>
            <span class="value font-normal">20.000.000</span>
        </td>
        <td><a href="{{ route('loans.show', ['id' => 1]) }}" class="view-button">View Details</a></td>
        </tr>

                <!-- Row 1 -->
        <tr>
        <td><img src="{{ asset('images/loanicon.png') }}" class="icon" alt="Icon"></td>
        <td>
            <span class="peminjaman-label font-medium" style="text-align: right;">Loan</span>
        </td>
        <td>
            <span class="label font-medium">Name</span>
            <span class="value font-normal">Lord Iron</span>
        </td>
        <td>
            <span class="label font-medium">Loan Amount</span>
            <span class="value font-normal">20.000.000</span>
        </td>
        <td><a href="{{ route('loans.show', ['id' => 1]) }}" class="view-button">View Details</a></td>
        </tr>

                <!-- Row 1 -->
        <tr>
        <td><img src="{{ asset('images/loanicon.png') }}" class="icon" alt="Icon"></td>
        <td>
            <span class="peminjaman-label font-medium" style="text-align: right;">Loan</span>
        </td>
        <td>
            <span class="label font-medium">Name</span>
            <span class="value font-normal">Lord Iron</span>
        </td>
        <td>
            <span class="label font-medium">Loan Amount</span>
            <span class="value font-normal">20.000.000</span>
        </td>
        <td><a href="{{ route('loans.show', ['id' => 1]) }}" class="view-button">View Details</a></td>
        </tr>
    </table>
    </div>
</div>
<script>
  function parseToNumber(str) {
    return parseInt(str.replace(/\./g, '')) || 0;
  }

  function formatRupiah(number) {
    return "Rp. " + (number / 1000000).toFixed(0) + "JT";
  }

  function updateTotalLoans() {
    const amounts = document.querySelectorAll('.value');
    let total = 0;

    amounts.forEach((el) => {
      if (el.previousElementSibling && el.previousElementSibling.textContent.trim() === 'Loan Amount') {
        total += parseToNumber(el.textContent);
      }
    });

    document.getElementById('totalLoans').textContent = formatRupiah(total);
  }

  // Jalankan fungsi saat halaman selesai dimuat
  document.addEventListener('DOMContentLoaded', updateTotalLoans);
</script>

</body>
</html>

