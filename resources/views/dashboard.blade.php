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
    <script src="https://kit.fontawesome.com/bdb0f9e3e2.js" crossorigin="anonymous"></script>
</head>

<style>
    /* ====== Global Style ====== */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

input, textarea {
    border: 2px solid #ccc;
    outline: none;
    padding: 8px;
    border-radius: 5px;
    width: 100%;
    font-size: 16px;
}

input:focus, textarea:focus {
    border-color: #4f52ba;
    box-shadow: 0 0 5px rgba(79, 82, 186, 0.5);
}

/* ====== Button ====== */
.button, button, .btn-upload, .add-button {
    background-color: #4f52ba;
    color: white;
    border: none;
    padding: 10px 15px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.button:hover, button:hover, .btn-upload:hover, .add-button:hover {
    background-color: #3e4a9a;
}

/* ====== Main Content ====== */
.main-content {
    width: 100%;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
}

/* ====== Card ====== */
.card, .card-counter {
    border: 1px solid #ddd;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
    overflow: hidden;
    padding: 15px;
    text-align: center;
    background-color: white;
}

.card img {
    width: 100%;
    height: 150px;
    object-fit: cover;
}

.card-footer {
    background-color: #f7f7f7;
    padding: 10px 15px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

/* ====== Modal ====== */
.modal {
    display: none;
    position: fixed;
    z-index: 1000;
    left: 0; top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.7);
}

.modal-content {
    background-color: #fff;
    margin: 10% auto;
    padding: 20px;
    width: 90%;
    max-width: 600px;
    border-radius: 8px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
}

.modal-content img {
    width: 100%;
    height: auto;
}

.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover, .close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}

/* ====== Header & Welcome Banner ====== */
.header h1 {
    color: #4f52ba;
    font-size: 20px;
}

.welcome-banner {
    background-color: #f4f5ff;
    padding: 20px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.welcome-banner img {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    margin-right: 15px;
    border: 2px solid #4f52ba;
}

.welcome-banner h2 {
    color: #4f52ba;
    margin: 0;
    font-size: 24px;
}

.welcome-banner p {
    color: #6c6fba;
    font-size: 16px;
    margin: 5px 0 0;
}

/* ====== Form Input Enhancements ====== */
.form-control:hover, input:hover, textarea:hover {
    border-color: #4f52ba;
    box-shadow: 0 0 5px rgba(79, 82, 186, 0.5);
}

.form-control.file-input {
    height: 45px;
    font-size: 16px;
}

/* ====== Additional Elements ====== */
.hidden {
    display: none;
}

label {
    font-weight: bold;
    display: block;
    margin-bottom: 5px;
}

label:hover {
    color: #4f52ba;
    cursor: pointer;
}

/* ====== Responsive Grid for Card Counter ====== */
.card-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
    gap: 20px;
    margin-top: 20px;
}

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

    .main-content {
        width: 100%;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
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

    .card img {
        width: 100%;
        height: 150px;
        object-fit: cover;
        cursor: pointer;
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

    .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1000; /* Sit on top */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgba(0, 0, 0, 0.7); /* Black w/ opacity */
    }

    .modal-content {
        background-color: #fefefe;
        margin: 10% auto; /* 10% from the top and centered */
        padding: 20px;
        border: 1px solid #888;
        border-radius: 8px; /* Rounded corners */
        width: 90%; /* Could be more or less, depending on screen size */
        max-width: 600px; /* Maximum width for larger screens */
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2); /* Shadow for depth */
    }

    .modal-content img {
        width: 100%; /* Gambar akan mengambil lebar penuh dari modal */
        height: auto; /* Menjaga rasio aspek gambar */
    }

    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

    label {
        font-weight: bold;
        margin-bottom: 5px;
        display: block;
    }

    /* Gaya untuk mengatur warna font dan font-family */
    .semantik-title {
        color: #4f52ba; 
        font-family: "Inter", sans-serif; 
        font-size: 20px;
    }

    /* Gaya untuk input form-control saat hover */
    .form-control:hover {
        border-color: #4f52ba; /* Mengubah warna border saat hover */
        box-shadow: 0 0 5px rgba(79, 82, 186, 0.5); /* Menambahkan efek shadow saat hover */
    }

    /* Gaya untuk memperbesar input file */
    .form-control.file-input {
        height: 45px; /* Mengatur tinggi input */
        font-size: 16px; /* Mengatur ukuran font */
    }

    .btn-upload {
        background-color: #4f52ba;
        color: white;
    }

    .btn-upload:hover {
        background-color: #3e4a9a;
        color: white;
    }

    .main-content {
        width: 100%;
        padding: 20px;
    }

    .button {
        background-color: #4f52ba;
        color: white;
        border: none;
        padding: 10px 15px;
        cursor: pointer;
        border-radius: 5px;
    }

    .button:hover {
        background-color: #3e4a9a;
    }

    .card {
        border: 1px solid #ddd;
        border-radius: 5px;
        margin-bottom: 20px;
        overflow: hidden;
    }

    .card img {
        width: 100%;
        height: 150px;
        object-fit: cover;
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

    .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    }

    .modal-content {
        background-color: #fefefe;
        margin: 15% auto; /* 15% from the top and centered */
        padding: 20px;
        border: 1px solid #888;
        width: 80%; /* Could be more or less, depending on screen size */
    }

    /* Menghilangkan outline pada input dan textarea saat fokus */
input, textarea {
    border: 2px solid #ccc; /* Tambahkan border biasa */
    outline: none; /* Hilangkan garis putus-putus */
    padding: 8px;
    border-radius: 5px;
    width: 100%;
    font-size: 16px;
}

/* Saat input dalam keadaan aktif (focus), tambahkan efek border lebih jelas */
input:focus, textarea:focus {
    border: 2px solid #4f52ba; /* Warna biru agar lebih elegan */
    box-shadow: 0 0 5px rgba(79, 82, 186, 0.5);
}

/* Untuk memperbaiki tampilan tombol */
button {
    cursor: pointer;
    padding: 10px 15px;
    background-color: #4f52ba;
    color: white;
    border: none;
    border-radius: 5px;
}

button:hover {
    background-color: #3d3f9f;
}
    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

    .hidden {
        display: none; /* Sembunyikan elemen */
    }

    .header {
        position: relative; /* Pastikan header memiliki posisi relatif */
        z-index: 1; /* Z-index lebih rendah dari modal */
    }

    /* Gaya untuk label saat hover */
    label:hover {
        color: #4f52ba; /* Ubah warna saat hover */
        cursor: pointer; /* Ubah kursor menjadi pointer */
    }

.card-counter {
    padding: 20px; /* Ruang di dalam card */
    text-align: center; /* Teks di tengah */
}

.card-counter i {
    font-size: 40px; /* Ukuran ikon yang lebih besar */
    color: #00796b; /* Warna ikon */
}

.count-name {
    font-size: 18px; /* Ukuran font untuk nama */
    font-weight: bold; /* Tebal */
    margin-top: 10px; /* Jarak atas */
}
.card-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
    gap: 20px;
    margin-top: 20px;
}

.card-counter {
    background-color: #ffffff;
    border: 1px solid #ddd;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    padding: 25px 15px;
    text-align: center;
    transition: transform 0.2s ease-in-out, box-shadow 0.3s ease-in-out;
}

.card-counter:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 20px rgba(79, 82, 186, 0.2);
}

.card-counter i {
    font-size: 36px;
    color: #1d4ed8;
    margin-bottom: 12px;
}

.card-counter .count-name {
    font-size: 16px;
    font-weight: 600;
    color: #1d4ed8;
}

.container {
    margin-left: 240px; /* ini jika sidebar lebarnya 240px */
    padding: 20px;
}

@media (max-width: 768px) {
    .container {
        margin-left: 0;
    }
}

</style>

<div class="main">
    <div class="container">
        <div class="header">
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
        </div>
    </div>
</div>



