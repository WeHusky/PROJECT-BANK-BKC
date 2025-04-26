@section('content')
@include('komponen.sidebar')

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Details</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <style>
    body {
      font-family: 'Roboto', sans-serif;
      margin: 0;
      padding: 20px;
    }
    .container {
      background: #fff;
      border-radius: 10px;
      padding: 30px;
      max-width: 100%;
      margin: auto;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
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
    }
    .tab {
      margin-right: 20px;
      padding-bottom: 10px;
      cursor: pointer;
      font-weight: bold;
      color: #888;
    }
    .tab.active {
      border-bottom: 2px solid blue;
      color: blue;
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
      pointer-events: none;
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
      display: none;
      position: fixed;
      z-index: 999;
      padding-top: 100px;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0,0,0,0.5);
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
    </style>
</head>
<body>
    <div class="main">
    <h2>Customer Details</h2>
    <div class="container">

    <div class="tabs">
        <div class="tab active" data-tab="profil">Profil</div>
        <div class="tab" data-tab="detail">Detail Pinjaman</div>
        <div class="tab" data-tab="survey">Survey</div>
    </div>

    <!-- Konten Profil -->
    <div id="profil" class="tab-content active">
        <!-- isi form Profil di sini -->
        <div class="form-group">
            <div class="form-control">
                <label>Nama</label>
                <input type="text" value="Wahyu" disabled>
            </div>
            <div class="form-control">
                <label>NIK</label>
                <input type="text" value="1738456132048560183" disabled>
            </div>
        </div>
        <div class="form-group">
            <div class="form-control">
                <label>Tanggal Lahir</label>
                <input type="text" value="25 January 1990" disabled>
            </div>
            <div class="form-control">
                <label>No HP</label>
                <input type="text" value="09845098132" disabled>
            </div>
        </div>
        <div class="form-group">
            <div class="form-control">
                <label>Pekerjaan</label>
                <input type="text" value="Petani Bitcoin" disabled>
            </div>
            <div class="form-control">
                <label>Penghasilan</label>
                <input type="text" value="300.000.000" disabled>
            </div>
        </div>
        <div class="form-group">
            <div class="form-control">
                <label>Tanggungan</label>
                <select disabled>
                    <option selected>7</option>
                </select>
            </div>
            <div class="form-control">
                <label>Status Kawin</label>
                <input type="text" value="09845098132" disabled>
            </div>
        </div>
        <div class="form-group">
            <div class="form-control full-width">
                <label>Alamat</label>
                <input type="text" value="Tambakbayan" disabled>
            </div>
        </div>
    </div>

    <!-- Konten Detail Pinjaman -->
    <div id="detail" class="tab-content">
        <!-- isi form Detail Pinjaman di sini -->
        <div class="form-group">
            <div class="form-control">
                <label>ID Kredit</label>
                <input type="text" value="#N1994" disabled>
            </div>
            <div class="form-control">
                <label>ID Nasabah</label>
                <input type="text" value="#01" disabled>
            </div>
        </div>
        <div class="form-group">
            <div class="form-control">
                <label>Nominal</label>
                <input type="text" value="20.000.000" disabled>
            </div>
            <div class="form-control">
                <label>Kategori</label>
                <select>
                    <option value="Cabang" selected>Cabang</option>
                    <option value="Pusat">Pusat</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="form-control">
                <label>Tanggal Pinjaman</label>
                <input type="text" value="25 January 1990" disabled>
            </div>
            <div class="form-control">
                <label>Alamat</label>
                <input type="text" value="Tambakbayan" disabled>
            </div>
        </div>
        <div class="form-group">
            <div class="form-control">
                <label>Status</label>
                <select>
                    <option value="Pengecekan" selected>Pengecekan</option>
                    <option value="Disetujui">Disetujui</option>
                    <option value="Ditolak">Ditolak</option>
                </select>
            </div>
            <div class="form-control">
                <label>Konfirmasi</label>
                <input type="text" value="Zero" disabled>
            </div>
        </div>
    </div>

    <!-- Konten Survey -->
    <div id="survey" class="tab-content">
        <!-- isi form Survey di sini -->
    </div>

    </div>
    <div class="button-group" style="display: flex; justify-content: space-between; align-items: center; margin-top: 10px;">
        <a href="{{ route('loans') }}" class="back-button">
            <i class="material-icons">arrow_back</i> Kembali
        </a>
        <div class="button" style="margin-top: 0px;">
            <button id="openModal">Setujui</button>
        </div>
    </div>
    <!-- Modal -->
    <div id="confirmationModal" class="modal">
        <div class="modal-content">
            <h3>Apakah Anda yakin ingin menyetujui?</h3>
            <div class="modal-buttons">
                <button class="confirm" id="confirmApprove">Ya, Setujui</button>
                <button class="cancel" id="cancelModal">Batal</button>
            </div>
        </div>
    </div>

    </div>

    <script>
        const modal = document.getElementById('confirmationModal');
        const openModalBtn = document.getElementById('openModal');
        const cancelBtn = document.getElementById('cancelModal');
        const confirmBtn = document.getElementById('confirmApprove');

        openModalBtn.onclick = function() {
            modal.style.display = 'block';
        }

        cancelBtn.onclick = function() {
            modal.style.display = 'none';
        }

        confirmBtn.onclick = function() {
            modal.style.display = 'none';
            alert('Disetujui!');
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = 'none';
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
