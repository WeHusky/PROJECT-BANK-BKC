@section('content')
@include('komponen.sidebar')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">

<head>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="{{ asset('css/general.css') }}">
    <link rel="stylesheet" href="{{ asset('css/card.css') }}">
    <script src="https://kit.fontawesome.com/bdb0f9e3e2.js" crossorigin="anonymous"></script>
</head>

<style>
    .main-content {
        position: relative;
        z-index: 5;
    }

    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }

    .button {
        background-color: #4f52ba;
        color: white;
        border: none;
        padding: 10px 15px;
        cursor: pointer;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    .button:hover {
        background-color: #3e4a9a;
    }

    .card {
        border: 1px solid #ddd;
        border-radius: 5px;
        margin-bottom: 20px;
        overflow: hidden;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .card-body {
        padding: 15px;
    }

    .card-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 15px;
        background-color: #f7f7f7;
    }

    .hidden {
        display: none; /* Sembunyikan elemen */
    }

    .header {
        position: relative; /* Pastikan header memiliki posisi relatif */
        z-index: 1; /* Z-index lebih rendah dari modal */
    }
</style>

<div class="main">
    <div class="container">
        <div class="header">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                <h1 style="color: #4f52ba; font-size: 20px;">Dasbor</h1>

                <button class="add-button" onclick="openAddPendaftaranModal()">Daftar</button>
            </div>

            <div class="welcome-banner" style="background-color: #f4f5ff; padding: 20px; border-radius: 10px; display: flex; align-items: center; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                <img src="{{ asset('img/avatars/1.png') }}" alt="Foto Profil" style="width: 80px; height: 80px; border-radius: 50%; margin-right: 15px; border: 2px solid #4f52ba;">

            </div>
        </div>


        <div class="card-grid">
            <div class="card-counter device-icon">
                <i class="fa-solid fa-city"></i>

                <div class="count-name">Region</div>
            </div>
            <div class="card-counter pop-icon">
                <i class="fa-solid fa-building"></i>

                <div class="count-name">POP</div>
            </div>
            <div class="card-counter facility-icon">
                <i class="fa-solid fa-building-user"></i>

                <div class="count-name">POC</div>
            </div>
            <div class="card-counter rack-icon">
                <i class="fas fa-server"></i>

                <div class="count-name">Rack POP</div>
            </div>
            <div class="card-counter rack-icon">
                <i class="fas fa-server"></i>

                <div class="count-name">Rack POC</div>
            </div>
            <div class="card-counter device-icon">
                <i class="fas fa-laptop"></i>

                <div class="count-name">Perangkat</div>
            </div>
            <div class="card-counter facility-icon">
                <i class="fas fa-tools"></i>

                <div class="count-name">Fasilitas</div>
            </div>
            <div class="card-counter">
                <i class="fas fa-ruler-combined"></i>

                <div class="count-name">Alat Ukur</div>
            </div>
            <div class="card-counter">
                <i class="fas fa-circle-nodes"></i>

                <div class="count-name">Jaringan</div>
            </div>
        </div>
    </div>
</div>



<script>



</script>


