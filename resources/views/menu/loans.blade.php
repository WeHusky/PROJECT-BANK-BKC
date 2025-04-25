@section('content')
@include('komponen.sidebar')

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Loan Table</title>
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Roboto', sans-serif;
      background-color: #dbe3ff;
      padding: 40px;
    }

    .loan-list {
      max-width: none;
      width: 100%;
      margin: auto;
      margin-top: 20%;
    }

    table {
      width: 100%;
      border-collapse: separate;
      border-spacing: 0 20px; /* jarak antar row */
    }

    tr {
      background-color: white;
      border-radius: 12px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    }

    td {
      padding: 20px;
      vertical-align: middle;
    }


    .icon {
      width: 60px;
      height: 60px;
      background-color: #ffe4ec;
      padding: 12px;
      border-radius: 12px;
    }

    .label {
      font-size: 13px;
      color: #9e9e9e;
      font-weight: 500;
      display: block;
    }

    .value {
      font-size: 16px;
      font-weight: bold;
      color: #333;
    }

    .view-button {
      padding: 8px 18px;
      font-size: 14px;
      color: #2e5bff;
      border: 2px solid #2e5bff;
      border-radius: 8px;
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
    <div class="loan-list">
    <table>
        <!-- Row 1 -->
        <tr>
        <td><img src="https://cdn-icons-png.flaticon.com/512/3135/3135789.png" class="icon" alt="Icon"></td>
        <td>
            <span class="peminjaman-label" style="font-weight: bold; text-align: right;">PEMINJAMAN</span>
        </td>
        <td>
            <span class="label">Nama</span>
            <span class="value">Lord Iron</span>
        </td>
        <td>
            <span class="label">Loan Amount</span>
            <span class="value">20.000.000</span>
        </td>
        <td><a href="#" class="view-button">View Details</a></td>
        </tr>

        <!-- Row 2 -->
        <tr>
        <td><img src="https://cdn-icons-png.flaticon.com/512/3135/3135789.png" class="icon" alt="Icon"></td>
        <td>
            <span class="peminjaman-label" style="font-weight: bold;">PEMINJAMAN</span>
        </td>
        <td>
            <span class="label">Nama</span>
            <span class="value">Tony Stark</span>
        </td>
        <td>
            <span class="label">Loan Amount</span>
            <span class="value">50.000.000</span>
        </td>
        <td><a href="#" class="view-button">View Details</a></td>
        </tr>

        <!-- Row 3 -->
        <tr>
        <td><img src="https://cdn-icons-png.flaticon.com/512/3135/3135789.png" class="icon" alt="Icon"></td>
        <td>
            <span class="peminjaman-label" style="font-weight: bold;">PEMINJAMAN</span>
        </td>
        <td>
            <span class="label">Nama</span>
            <span class="value">Tony Stark</span>
        </td>
        <td>
            <span class="label">Loan Amount</span>
            <span class="value">50.000.000</span>
        </td>
        <td><a href="#" class="view-button">View Details</a></td>
        </tr>

        <!-- Row 4 -->
        <tr>
        <td><img src="https://cdn-icons-png.flaticon.com/512/3135/3135789.png" class="icon" alt="Icon"></td>
        <td>
            <span class="peminjaman-label" style="font-weight: bold;">PEMINJAMAN</span>
        </td>
        <td>
            <span class="label">Nama</span>
            <span class="value">Tony Stark</span>
        </td>
        <td>
            <span class="label">Loan Amount</span>
            <span class="value">50.000.000</span>
        </td>
        <td><a href="#" class="view-button">View Details</a></td>
        </tr>
    </table>
    </div>
</div>
</body>
</html>

