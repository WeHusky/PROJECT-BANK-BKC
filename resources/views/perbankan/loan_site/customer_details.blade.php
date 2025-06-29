@section('content')
@include('layouts.sidebar')

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View Details</title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  @vite('resources/css/app.css')
  <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
  <style>
    body {
      margin: 0;
      padding: 20px;
    }
    .container {
      background: #fff;
      border-radius: 10px;
      padding: 40px;
      max-width: 100%;
      margin: auto;
      min-height: auto;
    }
    h2 {
      margin-bottom: 20px;
      color:#333B69;
    }
    .tabs {
      display: flex;
      border-bottom: 2px solid #eee;
      margin-bottom: 60px;
      gap:40px;
      position: relative;
    }
    .tab {
      margin-right: 20px;
      padding-bottom: 10px;
      cursor: pointer;
      font-weight: bold;
      color: #888;
      position: relative;
    }
    .tab {
    position: relative;
    padding: 10px 20px;
    cursor: pointer;
    color: #333;

    }

    .tab:not(.active):hover {
        color: #29BBCF;
    }

    /* Garis bawah */
    .tab:before {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: #29BBCF;
        transform: scaleY(0);
        transform-origin: bottom;
        border-radius: 6px;
    }

    /* Muncul dari bawah ke atas saat hover */
    .tab:not(.active):hover:before {
        transform: scaleY(1);
        transition: transform 0.6s ease;

    }

    /* Aktif tab */
    .tab.active {
        color: #29BBCF;
        border-bottom: 3px solid #29BBCF;
        border-radius: 6px;
    }

    /* Aktif: garis hover mati */
    .tab.active:before {
        transform: scaleY(0);
    }

    .form-group {
      display: flex;
      gap: 20px;
      margin-bottom: 20px;
    }
    .form-control {
      flex: 1;
      display: flex;
      flex-direction: column;
    }
    label {
      margin-bottom: 5px;
      font-size: 14px;
      color: #555;
    }
    input, select {
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 6px;
      background: #f0f0f0;
      /* HAPUS BARIS INI: pointer-events: none; */
    }

    /* Tambahkan aturan baru ini untuk elemen yang benar-benar disabled */
    input[disabled], select[disabled] {
      pointer-events: none; /* Terapkan hanya untuk elemen dengan atribut 'disabled' */
      opacity: 0.7; /* Opsional: tambahkan efek visual disabled */
    }

    .full-width {
      width: 100%;
    }
    .button {
      margin-top: 30px;
      text-align: right;
    }
    .button button {
      background: blue;
      color: white;
      border: none;
      padding: 12px 25px;
      border-radius: 8px;
      font-size: 16px;
      cursor: pointer;
    }
    .back-button {
      display: inline-flex;
      align-items: center;
      background: #f0f0f0;
      color: #333;
      border: none;
      padding: 10px 20px;
      border-radius: 8px;
      font-size: 16px;
      text-decoration: none;
      font-weight: 500;
      gap: 8px;
      transition: background 0.3s ease, color 0.3s ease;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    }
    .back-button:hover {
      background: #ddd;
      color: black;
    }
    .back-button i {
      font-size: 20px;
    }
    .button-group {
      margin-top: 10px;
      padding: 0 0px;
    }

    .tab-content {
      display: none;
      opacity: 0;
      transition: opacity 0.5s ease;
    }

    .tab-content.active {
      display: block;
      opacity: 1;
    }

    /* Modal Styles */
    .modal {
      position: fixed;
      z-index: 999;
      padding-top: 100px;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0,0,0,0.5);
      display:      none;
    }
    .modal-content {
      background-color: #fff;
      margin: auto;
      padding: 20px;
      border-radius: 10px;
      width: 400px;
      text-align: center;
      box-shadow: 0 5px 10px rgba(0,0,0,0.2);
    }
    .modal-content h3 {
      margin-bottom: 20px;
    }
    .modal-buttons {
      display: flex;
      justify-content: space-between;
      margin-top: 20px;
    }
    .modal-buttons button {
      padding: 10px 10px;
      border: none;
      border-radius: 6px;
      font-size: 14px;
      cursor: pointer;
    }
    .modal-buttons .confirm {
      background-color: blue;
      color: white;
    }
    .modal-buttons .cancel {
      background-color: #ccc;
    }

    .bi-check-card {
      background: #fff;
      padding: 2rem;
      border-radius: 1rem;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
      width: 350px;
      text-align: center;
    }

    .profile img {
      border-radius: 50%;
      width: 100px;
      height: 100px;
    }

    .profile h2 {
      margin: 1rem 0 0.5rem;
    }

    .role {
      background: #eef2f7;
      padding: 0.3rem 1rem;
      border-radius: 999px;
      font-size: 0.8rem;
      color: #555;
    }

    .stats {
      display: flex;
      justify-content: space-around;
      margin: 1.5rem 0;
    }

    .stats div {
      text-align: center;
    }

    .icon {
      margin-bottom: 0.5rem;
    }

    .stats div h3 {
      margin: 0.3rem 0;
      color: #333;
    }

    .stats div p {
      margin: 0;
      font-size: 0.9rem;
      color: #666;
    }

    .bi-check-details {
      text-align: left;
      margin-bottom: 1.5rem;
    }

    .bi-check-details p {
      margin: 0.5rem 0;
      font-size: 0.9rem;
      color: #555;
    }

    .actions {
      display: flex;
      justify-content: space-around;
    }

    .actions .edit, .actions .suspend {
      padding: 0.5rem 1.5rem;
      border: none;
      border-radius: 999px;
      cursor: pointer;
      font-weight: bold;
    }

    .actions .edit {
      background: #6c63ff;
      color: white;
    }

    .actions .suspend {
      background: #ff6b6b;
      color: white;
    }
  </style>
</head>
<body>
  <div class="main" style="gap: 20px; flex-direction: column;">
    <!-- Button to open BI Check Report Modal -->
    <!-- Removed the top BI Check Report button as requested -->
    <!-- <button id="openBiCheckModal" style="margin-bottom: 20px; padding: 10px 20px; background-color: #6c63ff; color: white; border: none; border-radius: 8px; cursor: pointer;">BI Check Report</button> -->

    <!-- BI Check Report Modal -->
    <div id="biCheckModal" class="modal" style="display: none;">
      <div class="modal-content" style="width: 450px; max-width: 90%;">
        <h2>BI Checking Report</h2>

        <div class="form-group">
          <label>ID BI Check</label>
          <input type="text" value="#N1994" disabled>
        </div>

        <div class="form-group">
          <label>Skor Kredit</label>
          <input type="text" value="5" disabled style="border-color: lightgreen;">
        </div>

        <div class="form-group">
          <label>History</label>
          <input type="text" value="Lunas" disabled>
        </div>

        <div class="form-group">
          <label>Status Kelayakan</label>
          <input type="text" value="Layak" disabled>
        </div>

        <div style="margin-top: 20px;">
          <button id="closeBiCheckModal" class="cancel" style="background-color: #ccc; color: black; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer;">Close</button>
        </div>
      </div>
    </div>

    <div class="container shadow-sm" style="flex: 1;">
      <div class="tabs">
        <div class="tab active" data-tab="profil">Profile</div>
        <div class="tab" data-tab="detail">Loan Details</div>
        <div class="tab" data-tab="survey">Survey</div>
      </div>

      <!-- Konten Profil -->
      <div id="profil" class="tab-content active">
        <!-- isi form Profil di sini -->
        <div class="form-group">
          <div class="form-control">
            <label>Full Name</label>
            <input type="text" class="border-0 border-b border-b-[#29BBCF] p-0 pb-1" value="{{ $nasabah->nama_nasabah }}" disabled>
          </div>
          <div class="form-control">
            <label>NIK</label>
            <input type="text" class="border-0 border-b border-b-[#29BBCF] p-0 pb-1" value="{{ $nasabah->nik_nasabah }}" disabled>
          </div>
        </div>
        <div class="form-group">
          <div class="form-control">
            <label>Birthdate</label>
            <input type="text" class="border-0 border-b border-b-[#29BBCF] p-0 pb-1" value="{{ \Carbon\Carbon::parse($nasabah->tanggallahir_nasabah)->translatedFormat('d F Y') }}" disabled>
          </div>
          <div class="form-control">
            <label>Phone Number</label>
            <input type="text" class="border-0 border-b border-b-[#29BBCF] p-0 pb-1" value="{{$nasabah->nohp_nasabah}}" disabled>
          </div>
        </div>
        <div class="form-group">
          <div class="form-control">
            <label>Job</label>
            <input type="text" class="border-0 border-b border-b-[#29BBCF] p-0 pb-1" value="{{$nasabah->pekerjaan_nasabah}}" disabled>
          </div>
          <div class="form-control">
            <label>Income</label>
            <input type="text" class="border-0 border-b border-b-[#29BBCF] p-0 pb-1" value="{{$nasabah->penghasilan_nasabah}}" disabled>
          </div>
        </div>
        <div class="form-group">
          <div class="form-control">
            <label>Financial Dependents</label>
            <input type="text" class="border-0 border-b border-b-[#29BBCF] p-0 pb-1" value="{{$nasabah->tanggungan_nasabah}}" disabled>
          </div>
          <div class="form-control">
            <label>Marriage Status</label>
            <input type="text" class="border-0 border-b border-b-[#29BBCF] p-0 pb-1" value="{{$nasabah->statuskawin_nasabah}}" disabled>
          </div>
        </div>
        <div class="form-group">
          <div class="form-control full-width">
            <label>Address</label>
            <input type="text" class="border-0 border-b border-b-[#29BBCF] p-0 pb-1" value="{{$nasabah->alamat_nasabah}}" disabled>
          </div>
        </div>
        <div class="flex justify-end" style="margin-top: 0px;">
          <button id="openModal" class="border border-[#29BBCF] bg-transparent hover:bg-[#29BBCF] rounded-3xl text-[#29BBCF] hover:text-white font-semibold py-2 px-5 shadow transition-colors duration-200">BI-Check</button>
        </div>
      </div>

      <!-- Konten Detail Pinjaman -->
      <div id="detail" class="tab-content">
        <div class="form-group">
          <div class="form-control">
            <label>Loan ID</label>
            <input type="text" class="border-0 border-b border-b-[#29BBCF] p-0 pb-1" value="{{ $loan->id_pengajuankredit }}" disabled>
          </div>
          <div class="form-control">
            <label>Customer ID</label>
            <input type="text" class="border-0 border-b border-b-[#29BBCF] p-0 pb-1" value="{{ $nasabah->id_nasabah }}" disabled>
          </div>
        </div>
        <div class="form-group">
          <div class="form-control">
            <label>Full Name</label>
            <input type="text" class="border-0 border-b border-b-[#29BBCF] p-0 pb-1" value="{{ $nasabah->nama_nasabah }}" disabled>
          </div>
          <div class="form-control">
            <label>Nominal</label>
            <input type="text" class="border-0 border-b border-b-[#29BBCF] p-0 pb-1" value="{{ number_format($loan->nominal_pengajuankredit, 0, ',', '.') }}" disabled>
          </div>
        </div>
        <div class="form-group">
          <div class="form-control">
            <label>Category</label>
            <input type="text" class="border-0 border-b border-b-[#29BBCF] p-0 pb-1" value="{{ $loan->kategori_pengajuankredit }}" disabled>
          </div>
          <div class="form-control">
            <label>Loan Application Date</label>
            <input type="text" class="border-0 border-b border-b-[#29BBCF] p-0 pb-1" value="{{ \Carbon\Carbon::parse($loan->tanggal_pengajuankredit)->format('d/m/Y') }}" disabled>
          </div>
        </div>
        <div class="form-group">
          <div class="form-control">
            <label>Address</label>
            <input type="text" class="border-0 border-b border-b-[#29BBCF] p-0 pb-1" value="{{ $nasabah->alamat_nasabah }}" disabled>
          </div>
          <form action="{{ route('loans.statusupdate',['id' => $loan->id_pengajuankredit]) }}" method="POST" id="statusUpdate">
          @csrf
          <div class="form-control">
            <label>Status</label>
            <select onchange="this.form.submit()" name="status_pengajuankredit" class="border-0 border-b border-b-[#29BBCF] p-0 pb-1 bg-transparent rounded-none">
              <option value="Under Review" {{ $loan->status_pengajuankredit == 'Under Review' ? 'selected' : '' }}>Under Review</option>
              <option value="Loan Cancelled" {{ $loan->status_pengajuankredit == 'Loan Called' ? 'selected' : '' }}>Loan Cancelled</option>
              <option value="Awaiting Date Confirmation" {{ $loan->status_pengajuankredit == 'Awaiting Date Confirmation' ? 'selected' : '' }}>Awaiting Date Confirmation</option>
              <option value="Survey Scheduled" {{ $loan->status_pengajuankredit == 'Survey Scheduled' ? 'selected' : '' }}>Survey Scheduled</option>
              <option value="Survey Under Review" {{ $loan->status_pengajuankredit == 'Survey Under Review' ? 'selected' : '' }}>Survey Under Review</option>
              <option value="Loan Approved" {{ $loan->status_pengajuankredit == 'Loan Approved' ? 'selected' : '' }}>Loan Approved</option>
              <option value="Loan Rejected" {{ $loan->status_pengajuankredit == 'Loan Rejected' ? 'selected' : '' }}>Loan Rejected</option>
            </select>
          </div>
          </form>
        </div>
        <div class="form-group">
          <div class="form-control">
            <label>Disbursement Confirmation Status</label>
            <input type="text" class="border-0 border-b border-b-[#29BBCF] p-0 pb-1" value="{{ $loan->konfirmasi_pengajuankredit }}" disabled>
          </div>
        </div>
      </div>

      <!-- Konten Survey -->
      <div id="survey" class="tab-content">
        <!-- isi form Survey di sini -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <!-- ID Survey -->
          <div class="flex flex-col">
            <label>Survey ID</label>
            <input type="text" value="{{ $survei->id_survei }}" disabled class="border-0 border-b border-b-[#29BBCF] p-0 pb-1"/>
          </div>
          <!-- ID Nasabah -->
          <div class="flex flex-col">
            <label>Customer ID</label>
            <input type="text" value="{{ $nasabah->id_nasabah }}" disabled class="border-0 border-b border-b-[#29BBCF] p-0 pb-1"/>
          </div>
          <!-- Kondisi Rumah -->
          <div class="flex flex-col">
            <label>House Condition</label>
            <button type="button" class="flex items-center justify-between border border-[#29BBCF] px-4 py-3 focus:outline-none rounded-3xl bg-transparent">
              Select a File
              <span class="material-icons text-gray-400">chevron_right</span>
            </button>
          </div>
          <!-- Kondisi Ekonomi -->
          <div class="flex flex-col">
            <label>Financial Condition</label>
            <select
              class="border border-[#29BBCF] px-4 py-3 focus:outline-none rounded-3xl bg-transparent">
              <option selected>Choose Financial Condition</option>
              <option value="stable">Stable</option>
              <option value="growing">Growing</option>
              <option value="declining">Declining</option>
              <option value="unpredictable">Unpredictable</option>
              <option value="critical">Critical</option>
            </select>
          </div>
          <!-- Alasan Peminjaman (textarea) -->
          <div class="flex flex-col col-span-1 md:col-span-2">
            <label>Reason for Loan Application</label>
            <textarea rows="4"
              class="border border-[#29BBCF] rounded-xl p-2"></textarea>
          </div>
        </div>
      </div>
    </div>

    <!-- Loan Approval Card -->
    <div class="loan-approval-card shadow-sm" style="background: #fff; padding: 20px; border-radius: 10px; margin-top: 20px;">
      <h3>Loan Approval</h3>
      <p style="background-color: #ffeb3b; padding: 10px; border-radius: 5px;">
        Are you sure you want to approve this loan? Once approved, the loan will be processed and cannot be undone. Please confirm your decision.
      </p>
      <div style="margin-top: 10px;">
        <input type="checkbox" id="confirmApproval">
        <label for="confirmApproval">I confirm the loan approval</label>
      </div>
      <div style="margin-top: 20px;">
        <button class="confirm" id="confirmLoanApproval" style="background-color: #6c63ff; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer;">Approve Loan</button>
        <button class="cancel" id="cancelLoanApproval" style="background-color: #ccc; color: black; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer;">Cancel</button>
      </div>
    </div>
    <div class="button-group" style="display: flex; justify-content: space-between; align-items: center; margin-top: 10px;">
      <a href="{{ route('loans') }}" class="back-button">
        <i class="material-icons">arrow_back</i> Kembali
      </a>
    </div>
  </div>
  <!-- Modal -->
  <!-- <div id="confirmationModal" class="modal">
    <div class="modal-content">
      <h3>Apakah Anda yakin ingin menyetujui?</h3>
      <div class="modal-buttons">
        <button class="confirm" id="confirmApprove">Ya, Setujui</button>
        <button class="cancel" id="cancelModal">Batal</button>
      </div>
    </div>
  </div> -->

  <script>
    const reportModal = document.getElementById('biCheckModal');
    const openReportModalBtn = document.getElementById('openModal');
    const closeModalBtn = document.getElementById('closeBiCheckModal');

    openReportModalBtn.onclick = function() {
      reportModal.style.display = 'block';
    }

    closeModalBtn.onclick = function() {
      reportModal.style.display = 'none';
    }

    window.onclick = function(event) {
      if (event.target == reportModal) {
        reportModal.style.display = 'none';
      }
    }

    const tabs = document.querySelectorAll('.tab');
    const tabContents = document.querySelectorAll('.tab-content');

    tabs.forEach(tab => {
      tab.addEventListener('click', () => {
        // Remove active class from all tabs
        tabs.forEach(t => t.classList.remove('active'));
        tab.classList.add('active');

        // Hide all tab contents
        tabContents.forEach(content => content.classList.remove('active'));

        // Show the content corresponding to the clicked tab
        const selectedTab = tab.getAttribute('data-tab');
        document.getElementById(selectedTab).classList.add('active');
      });
    });
  </script>
</body>
</html>
