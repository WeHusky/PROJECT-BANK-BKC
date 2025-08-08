@section('content')
@include('layouts.sidebar')
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Inter', sans-serif;
        /* background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); */
        min-height: 100vh;
        color: #333;
    }

    .main-content {
        position: relative;
        z-index: 5;
    }

    .dashboard-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 20px;
    }

    .header-section {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border-radius: 20px;
        padding: 30px;
        margin-bottom: 30px;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .header-content {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 20px;
    }

    .welcome-section {
        display: flex;
        align-items: center;
        gap: 20px;
    }

    .profile-avatar {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        background: linear-gradient(135deg, #667eea, #764ba2);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 32px;
        font-weight: 600;
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
    }

    .welcome-text h1 {
        color: #2d3748;
        font-size: 28px;
        font-weight: 700;
        margin-bottom: 5px;
    }

    .welcome-text p {
        color: #718096;
        font-size: 16px;
        font-weight: 400;
    }

    .search-section {
        display: flex;
        gap: 15px;
        align-items: center;
    }

    .search-container {
        position: relative;
        min-width: 300px;
    }

    .search-input {
        width: 100%;
        padding: 12px 45px 12px 20px;
        border: 2px solid #e2e8f0;
        border-radius: 12px;
        font-size: 14px;
        font-family: 'Inter', sans-serif;
        transition: all 0.3s ease;
        background: white;
    }

    .search-input:focus {
        outline: none;
        border-color: #667eea;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }

    .search-icon {
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: #718096;
        font-size: 16px;
    }

    .search-results {
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        background: white;
        border-radius: 12px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        border: 1px solid #e2e8f0;
        max-height: 400px;
        overflow-y: auto;
        z-index: 9999;
        display: none;
    }

    .search-result-item {
        padding: 15px 20px;
        border-bottom: 1px solid #f1f5f9;
        cursor: pointer;
        transition: background-color 0.2s ease;
    }

    .search-result-item:hover {
        background-color: #f8fafc;
    }

    .search-result-item:last-child {
        border-bottom: none;
    }

    .search-result-title {
        font-weight: 600;
        color: #2d3748;
        margin-bottom: 5px;
    }

    .search-result-subtitle {
        font-size: 12px;
        color: #718096;
    }

    .stats-overview {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
        margin-bottom: 30px;
    }

    .stat-overview-card {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border-radius: 15px;
        padding: 20px;
        text-align: center;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .stat-overview-card h3 {
        font-size: 24px;
        font-weight: 700;
        color: #2d3748;
        margin-bottom: 5px;
    }

    .stat-overview-card p {
        color: #718096;
        font-size: 14px;
        font-weight: 500;
    }

    .add-button {
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: white;
        border: none;
        padding: 12px 24px;
        border-radius: 12px;
        font-weight: 600;
        font-size: 14px;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
    }

    .add-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 25px;
        margin-bottom: 30px;
    }

    .stat-card {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border-radius: 20px;
        padding: 25px;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
        transition: all 0.3s ease;
        cursor: pointer;
        position: relative;
        overflow: hidden;
    }

    .stat-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #667eea, #764ba2);
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 40px rgba(0, 0, 0, 0.15);
    }

    .stat-card.loan-card::before {
        background: linear-gradient(90deg, #48bb78, #38a169);
    }

    .stat-card.pop-card::before {
        background: linear-gradient(90deg, #ed8936, #dd6b20);
    }

    .stat-card.poc-card::before {
        background: linear-gradient(90deg, #4299e1, #3182ce);
    }

    .stat-card.rack-pop-card::before {
        background: linear-gradient(90deg, #9f7aea, #805ad5);
    }

    .stat-card.rack-poc-card::before {
        background: linear-gradient(90deg, #f56565, #e53e3e);
    }

    .stat-card.device-card::before {
        background: linear-gradient(90deg, #38b2ac, #319795);
    }

    .stat-card.facility-card::before {
        background: linear-gradient(90deg, #ed64a6, #d53f8c);
    }

    .stat-card.measurement-card::before {
        background: linear-gradient(90deg, #f6ad55, #ed8936);
    }

    .stat-card.network-card::before {
        background: linear-gradient(90deg, #68d391, #48bb78);
    }

    .stat-icon {
        width: 60px;
        height: 60px;
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        color: white;
        margin-bottom: 15px;
        background: linear-gradient(135deg, #667eea, #764ba2);
    }

    .stat-card.loan-card .stat-icon {
        background: linear-gradient(135deg, #48bb78, #38a169);
    }

    .stat-card.pop-card .stat-icon {
        background: linear-gradient(135deg, #ed8936, #dd6b20);
    }

    .stat-card.poc-card .stat-icon {
        background: linear-gradient(135deg, #4299e1, #3182ce);
    }

    .stat-card.rack-pop-card .stat-icon {
        background: linear-gradient(135deg, #9f7aea, #805ad5);
    }

    .stat-card.rack-poc-card .stat-icon {
        background: linear-gradient(135deg, #f56565, #e53e3e);
    }

    .stat-card.device-card .stat-icon {
        background: linear-gradient(135deg, #38b2ac, #319795);
    }

    .stat-card.facility-card .stat-icon {
        background: linear-gradient(135deg, #ed64a6, #d53f8c);
    }

    .stat-card.measurement-card .stat-icon {
        background: linear-gradient(135deg, #f6ad55, #ed8936);
    }

    .stat-card.network-card .stat-icon {
        background: linear-gradient(135deg, #68d391, #48bb78);
    }

    .stat-content h3 {
        font-size: 24px;
        font-weight: 700;
        color: #2d3748;
        margin-bottom: 5px;
    }

    .stat-content p {
        color: #718096;
        font-size: 14px;
        font-weight: 500;
    }

    .charts-section {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 25px;
        margin-bottom: 30px;
    }

    .chart-card {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border-radius: 20px;
        padding: 25px;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .chart-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 20px;
    }

    .chart-title {
        font-size: 18px;
        font-weight: 600;
        color: #2d3748;
    }

    .chart-container {
        position: relative;
        height: 300px;
    }

    .recent-activity {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border-radius: 20px;
        padding: 25px;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .activity-item {
        display: flex;
        align-items: center;
        padding: 15px 0;
        border-bottom: 1px solid #e2e8f0;
    }

    .activity-item:last-child {
        border-bottom: none;
    }

    .activity-icon {
        width: 40px;
        height: 40px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 15px;
        color: white;
        font-size: 16px;
    }

    .activity-content h4 {
        font-size: 14px;
        font-weight: 600;
        color: #2d3748;
        margin-bottom: 2px;
    }

    .activity-content p {
        font-size: 12px;
        color: #718096;
    }

    @media (max-width: 768px) {
        .charts-section {
            grid-template-columns: 1fr;
        }

        .stats-grid {
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        }

        .header-content {
            flex-direction: column;
            align-items: flex-start;
        }

        .search-container {
            min-width: 250px;
        }
    }

    .hidden {
        display: none;
    }

    .header {
        position: relative;
        z-index: 1;
    }
</style>

<div class="main">
    <div class="dashboard-container">
        <!-- Header Section -->
        <div class="header-section">
            <div class="header-content">
                <div class="welcome-section">
                    <div class="profile-avatar">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="welcome-text">
                        <h1>Selamat Datang!</h1>
                        <p>Kelola infrastruktur perbankan dan pinjaman nasabah</p>
                    </div>
                </div>
                <div class="search-section">
                    <div class="search-container">
                        <input type="text" id="searchInput" class="search-input" placeholder="Cari pinjaman, nasabah, atau status..." autocomplete="off">
                        <i class="fas fa-search search-icon"></i>
                        <div id="searchResults" class="search-results" style="z-index: 99;"></div>
                    </div>
                    <button class="add-button" onclick="openAddPendaftaranModal()">
                        <i class="fas fa-plus"></i> Tambah Data
                    </button>
                </div>
            </div>
        </div>

        <!-- Loan Statistics Overview -->
        <div class="stats-overview">
            <div class="stat-overview-card">
                <h3>{{ number_format($loanStats['totalLoans'] ?? 0) }}</h3>
                <p>Total Pinjaman</p>
            </div>
            <div class="stat-overview-card">
                <h3>Rp {{ number_format($loanStats['totalLoanAmount'] ?? 0, 0, ',', '.') }}</h3>
                <p>Total Nilai Pinjaman</p>
            </div>
            <div class="stat-overview-card">
                <h3>{{ number_format(($loanStats['loansByStatus']['Under Review'] ?? 0) + ($loanStats['loansByStatus']['Survey Scheduled'] ?? 0)) }}</h3>
                <p>Dalam Proses</p>
            </div>
            <div class="stat-overview-card">
                <h3>{{ number_format($loanStats['loansByStatus']['Loan Approved'] ?? 0) }}</h3>
                <p>Disetujui</p>
            </div>
            <div class="stat-overview-card">
                <h3>{{ number_format($loanStats['loansByStatus']['Loan Disbursed'] ?? 0) }}</h3>
                <p>Pencairan</p>
            </div>
            <div class="stat-overview-card">
                <h3>Rp {{ number_format($loanStats['totalDisbursedAmount'] ?? 0, 0, ',', '.') }}</h3>
                <p>Total Pencairan</p>
            </div>
        </div>

        <!-- Statistics Grid -->
        <div class="stats-grid">
            <div class="stat-card loan-card" onclick="window.location='{{ route('loans') }}'">
                <div class="stat-icon">
            <i class="fa-solid fa-hand-holding-dollar"></i>
                </div>
                <div class="stat-content">
                    <h3>Loan</h3>
                    <p>Kelola pinjaman nasabah</p>
                </div>
            </div>

            <div class="stat-card pop-card">
                <div class="stat-icon">
                <i class="fa-solid fa-building"></i>
                </div>
                <div class="stat-content">
                    <h3>POP</h3>
                    <p>Point of Presence</p>
                </div>
            </div>

            <div class="stat-card poc-card">
                <div class="stat-icon">
                <i class="fa-solid fa-building-user"></i>
                </div>
                <div class="stat-content">
                    <h3>POC</h3>
                    <p>Point of Contact</p>
                </div>
            </div>

            <div class="stat-card rack-pop-card">
                <div class="stat-icon">
                <i class="fas fa-server"></i>
                </div>
                <div class="stat-content">
                    <h3>Rack POP</h3>
                    <p>Server rack POP</p>
                </div>
            </div>

            <!-- <div class="stat-card rack-poc-card">
                <div class="stat-icon">
                <i class="fas fa-server"></i>
                </div>
                <div class="stat-content">
                    <h3>Rack POC</h3>
                    <p>Server rack POC</p>
                </div>
            </div>

            <div class="stat-card device-card">
                <div class="stat-icon">
                <i class="fas fa-laptop"></i>
                </div>
                <div class="stat-content">
                    <h3>Perangkat</h3>
                    <p>Kelola perangkat IT</p>
                </div>
            </div>

            <div class="stat-card facility-card">
                <div class="stat-icon">
                <i class="fas fa-tools"></i>
                </div>
                <div class="stat-content">
                    <h3>Fasilitas</h3>
                    <p>Kelola fasilitas</p>
                </div>
            </div>

            <div class="stat-card measurement-card">
                <div class="stat-icon">
                <i class="fas fa-ruler-combined"></i>
                </div>
                <div class="stat-content">
                    <h3>Alat Ukur</h3>
                    <p>Kelola alat ukur</p>
                </div>
            </div>

            <div class="stat-card network-card">
                <div class="stat-icon">
                <i class="fas fa-circle-nodes"></i>
                </div>
                <div class="stat-content">
                    <h3>Jaringan</h3>
                    <p>Kelola infrastruktur jaringan</p>
                </div>
            </div> -->
        </div>

        <!-- Charts Section -->
        <div class="charts-section">
            <div class="chart-card">
                <div class="chart-header">
                    <h3 class="chart-title">Status Pinjaman</h3>
                </div>
                <div class="chart-container">
                    <canvas id="loanStatusChart"></canvas>
                </div>
            </div>

            <div class="chart-card">
                <div class="chart-header">
                    <h3 class="chart-title">Kategori Pinjaman</h3>
                </div>
                <div class="chart-container">
                    <canvas id="loanCategoryChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Disbursement Chart Section -->
        <div class="charts-section">
            <div class="chart-card">
                <div class="chart-header">
                    <h3 class="chart-title">Pencairan Pinjaman (6 Bulan Terakhir)</h3>
                </div>
                <div class="chart-container">
                    <canvas id="disbursementChart"></canvas>
                </div>
            </div>

            <div class="chart-card">
                <div class="chart-header">
                    <h3 class="chart-title">Perbandingan Pengajuan vs Pencairan</h3>
                </div>
                <div class="chart-container">
                    <canvas id="comparisonChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="recent-activity">
            <div class="chart-header">
                <h3 class="chart-title">Aktivitas Terbaru</h3>
            </div>
            <div class="activity-item">
                <div class="activity-icon" style="background: linear-gradient(135deg, #48bb78, #38a169);">
                    <i class="fas fa-plus"></i>
                </div>
                <div class="activity-content">
                    <h4>Pinjaman baru diajukan</h4>
                    <p>Nasabah baru mengajukan pinjaman - 2 jam yang lalu</p>
                </div>
            </div>
            <div class="activity-item">
                <div class="activity-icon" style="background: linear-gradient(135deg, #4299e1, #3182ce);">
                    <i class="fas fa-check"></i>
                </div>
                <div class="activity-content">
                    <h4>Pinjaman disetujui</h4>
                    <p>Pinjaman nasabah telah disetujui - 4 jam yang lalu</p>
                </div>
            </div>
            <div class="activity-item">
                <div class="activity-icon" style="background: linear-gradient(135deg, #68d391, #48bb78);">
                    <i class="fas fa-money-bill-wave"></i>
                </div>
                <div class="activity-content">
                    <h4>Pencairan pinjaman</h4>
                    <p>Pinjaman nasabah telah dicairkan - 6 jam yang lalu</p>
                </div>
            </div>
            <div class="activity-item">
                <div class="activity-icon" style="background: linear-gradient(135deg, #ed8936, #dd6b20);">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>
                <div class="activity-content">
                    <h4>Survey dijadwalkan</h4>
                    <p>Survey untuk pinjaman baru dijadwalkan - 8 jam yang lalu</p>
                </div>
            </div>
            <div class="activity-item">
                <div class="activity-icon" style="background: linear-gradient(135deg, #9f7aea, #805ad5);">
                    <i class="fas fa-file-alt"></i>
                </div>
                <div class="activity-content">
                    <h4>Dokumen diperbarui</h4>
                    <p>Dokumen pinjaman diperbarui - 10 jam yang lalu</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Loan Status Chart
    const loanStatusCtx = document.getElementById('loanStatusChart').getContext('2d');
    const loanStatusChart = new Chart(loanStatusCtx, {
        type: 'doughnut',
        data: {
            labels: [
                'Under Review',
                'Loan Approved',
                'Loan Rejected',
                'Survey Scheduled',
                'Survey Under Review',
                'Awaiting Date Confirmation',
                'Loan Disbursed',
                'Loan Cancelled'
            ],
            datasets: [{
                data: [
                    {{ $loanStats['loansByStatus']['Under Review'] ?? 0 }},
                    {{ $loanStats['loansByStatus']['Loan Approved'] ?? 0 }},
                    {{ $loanStats['loansByStatus']['Loan Rejected'] ?? 0 }},
                    {{ $loanStats['loansByStatus']['Survey Scheduled'] ?? 0 }},
                    {{ $loanStats['loansByStatus']['Survey Under Review'] ?? 0 }},
                    {{ $loanStats['loansByStatus']['Awaiting Date Confirmation'] ?? 0 }},
                    {{ $loanStats['loansByStatus']['Loan Disbursed'] ?? 0 }},
                    {{ $loanStats['loansByStatus']['Loan Cancelled'] ?? 0 }}
                ],
                backgroundColor: [
                    '#4299e1',
                    '#48bb78',
                    '#f56565',
                    '#ed8936',
                    '#9f7aea',
                    '#38b2ac',
                    '#68d391',
                    '#a0aec0'
                ],
                borderWidth: 0,
                hoverOffset: 4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        padding: 20,
                        usePointStyle: true,
                        font: {
                            size: 11,
                            family: 'Inter'
                        }
                    }
                }
            },
            cutout: '60%'
        }
    });

    // Loan Category Chart
    const loanCategoryCtx = document.getElementById('loanCategoryChart').getContext('2d');
    const loanCategoryChart = new Chart(loanCategoryCtx, {
        type: 'bar',
        data: {
            labels: [
                'Kewenangan Peminjaman Pusat',
                'Kewenangan Peminjaman Cabang'
            ],
            datasets: [{
                label: 'Jumlah Pinjaman',
                data: [
                    {{ $loanStats['loansByCategory']['Kewenangan Peminjaman Pusat'] ?? 0 }},
                    {{ $loanStats['loansByCategory']['Kewenangan Peminjaman Cabang'] ?? 0 }}
                ],
                backgroundColor: [
                    'rgba(102, 126, 234, 0.8)',
                    'rgba(159, 122, 234, 0.8)'
                ],
                borderColor: [
                    'rgba(102, 126, 234, 1)',
                    'rgba(159, 122, 234, 1)'
                ],
                borderWidth: 2,
                borderRadius: 8,
                borderSkipped: false,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: 'rgba(0, 0, 0, 0.1)'
                    },
                    ticks: {
                        font: {
                            family: 'Inter'
                        }
                    }
                },
                x: {
                    grid: {
                        display: false
                    },
                    ticks: {
                        font: {
                            family: 'Inter',
                            size: 11
                        }
                    }
                }
            }
        }
    });

    // Disbursement Chart
    const disbursementCtx = document.getElementById('disbursementChart').getContext('2d');
    const disbursementChart = new Chart(disbursementCtx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des'],
            datasets: [{
                label: 'Total Pencairan (Rp)',
                data: [
                    {{ isset($loanStats['monthlyDisbursements'][1]) ? $loanStats['monthlyDisbursements'][1] : 0 }},
                    {{ isset($loanStats['monthlyDisbursements'][2]) ? $loanStats['monthlyDisbursements'][2] : 0 }},
                    {{ isset($loanStats['monthlyDisbursements'][3]) ? $loanStats['monthlyDisbursements'][3] : 0 }},
                    {{ isset($loanStats['monthlyDisbursements'][4]) ? $loanStats['monthlyDisbursements'][4] : 0 }},
                    {{ isset($loanStats['monthlyDisbursements'][5]) ? $loanStats['monthlyDisbursements'][5] : 0 }},
                    {{ isset($loanStats['monthlyDisbursements'][6]) ? $loanStats['monthlyDisbursements'][6] : 0 }},
                    {{ isset($loanStats['monthlyDisbursements'][7]) ? $loanStats['monthlyDisbursements'][7] : 0 }},
                    {{ isset($loanStats['monthlyDisbursements'][8]) ? $loanStats['monthlyDisbursements'][8] : 0 }},
                    {{ isset($loanStats['monthlyDisbursements'][9]) ? $loanStats['monthlyDisbursements'][9] : 0 }},
                    {{ isset($loanStats['monthlyDisbursements'][10]) ? $loanStats['monthlyDisbursements'][10] : 0 }},
                    {{ isset($loanStats['monthlyDisbursements'][11]) ? $loanStats['monthlyDisbursements'][11] : 0 }},
                    {{ isset($loanStats['monthlyDisbursements'][12]) ? $loanStats['monthlyDisbursements'][12] : 0 }}
                ],
                borderColor: 'rgba(72, 187, 120, 1)',
                backgroundColor: 'rgba(72, 187, 120, 0.1)',
                borderWidth: 3,
                fill: true,
                tension: 0.4,
                pointBackgroundColor: 'rgba(72, 187, 120, 1)',
                pointBorderColor: '#fff',
                pointBorderWidth: 2,
                pointRadius: 6,
                pointHoverRadius: 8
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: 'rgba(0, 0, 0, 0.1)'
                    },
                    ticks: {
                        font: {
                            family: 'Inter'
                        },
                        callback: function(value) {
                            return 'Rp ' + (value / 1000000).toFixed(0) + 'M';
                        }
                    }
                },
                x: {
                    grid: {
                        display: false
                    },
                    ticks: {
                        font: {
                            family: 'Inter',
                            size: 11
                        }
                    }
                }
            }
        }
    });

    // Comparison Chart (Pengajuan vs Pencairan)
    const comparisonCtx = document.getElementById('comparisonChart').getContext('2d');
    const comparisonChart = new Chart(comparisonCtx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
            datasets: [{
                label: 'Pengajuan',
                data: [
                    {{ isset($loanStats['monthlyLoans'][1]) ? $loanStats['monthlyLoans'][1] : 0 }},
                    {{ isset($loanStats['monthlyLoans'][2]) ? $loanStats['monthlyLoans'][2] : 0 }},
                    {{ isset($loanStats['monthlyLoans'][3]) ? $loanStats['monthlyLoans'][3] : 0 }},
                    {{ isset($loanStats['monthlyLoans'][4]) ? $loanStats['monthlyLoans'][4] : 0 }},
                    {{ isset($loanStats['monthlyLoans'][5]) ? $loanStats['monthlyLoans'][5] : 0 }},
                    {{ isset($loanStats['monthlyLoans'][6]) ? $loanStats['monthlyLoans'][6] : 0 }}
                ],
                backgroundColor: 'rgba(102, 126, 234, 0.8)',
                borderColor: 'rgba(102, 126, 234, 1)',
                borderWidth: 2,
                borderRadius: 8,
                borderSkipped: false,
            }, {
                label: 'Pencairan',
                data: [
                    {{ isset($loanStats['monthlyDisbursements'][1]) && $loanStats['monthlyDisbursements'][1] > 0 ? 1 : 0 }},
                    {{ isset($loanStats['monthlyDisbursements'][2]) && $loanStats['monthlyDisbursements'][2] > 0 ? 1 : 0 }},
                    {{ isset($loanStats['monthlyDisbursements'][3]) && $loanStats['monthlyDisbursements'][3] > 0 ? 1 : 0 }},
                    {{ isset($loanStats['monthlyDisbursements'][4]) && $loanStats['monthlyDisbursements'][4] > 0 ? 1 : 0 }},
                    {{ isset($loanStats['monthlyDisbursements'][5]) && $loanStats['monthlyDisbursements'][5] > 0 ? 1 : 0 }},
                    {{ isset($loanStats['monthlyDisbursements'][6]) && $loanStats['monthlyDisbursements'][6] > 0 ? 1 : 0 }}
                ],
                backgroundColor: 'rgba(72, 187, 120, 0.8)',
                borderColor: 'rgba(72, 187, 120, 1)',
                borderWidth: 2,
                borderRadius: 8,
                borderSkipped: false,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'top',
                    labels: {
                        font: {
                            family: 'Inter',
                            size: 12
                        },
                        usePointStyle: true
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: 'rgba(0, 0, 0, 0.1)'
                    },
                    ticks: {
                        font: {
                            family: 'Inter'
                        }
                    }
                },
                x: {
                    grid: {
                        display: false
                    },
                    ticks: {
                        font: {
                            family: 'Inter',
                            size: 11
                        }
                    }
                }
            }
        }
    });

    // Add hover effects to stat cards
    const statCards = document.querySelectorAll('.stat-card');
    statCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-8px) scale(1.02)';
        });

        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
        });
    });

    // Search functionality
    const searchInput = document.getElementById('searchInput');
    const searchResults = document.getElementById('searchResults');
    let searchTimeout;

    searchInput.addEventListener('input', function() {
        clearTimeout(searchTimeout);
        const query = this.value.trim();

        console.log('Search input:', query); // Debug log

        if (query.length < 2) {
            searchResults.style.display = 'none';
            return;
        }

        searchTimeout = setTimeout(() => {
            performSearch(query);
        }, 300);
    });

    // Hide search results when clicking outside
    document.addEventListener('click', function(e) {
        if (!searchInput.contains(e.target) && !searchResults.contains(e.target)) {
            searchResults.style.display = 'none';
        }
    });

    function performSearch(query) {
        console.log('Performing search for:', query); // Debug log

        // Show loading state
        searchResults.innerHTML = '<div style="padding: 20px; text-align: center; color: #718096;">Mencari...</div>';
        searchResults.style.display = 'block';

        // Make AJAX request to search endpoint
        const searchUrl = `{{ route('dashboard.search') }}?q=${encodeURIComponent(query)}`;
        console.log('Search URL:', searchUrl); // Debug log

        fetch(searchUrl, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => {
            console.log('Response status:', response.status); // Debug log
            return response.json();
        })
        .then(data => {
            console.log('Search results:', data); // Debug log
            displaySearchResults(data);
        })
        .catch(error => {
            console.error('Search error:', error);
            searchResults.innerHTML = '<div style="padding: 20px; text-align: center; color: #f56565;">Error saat mencari</div>';
        });
    }

    function displaySearchResults(results) {
        if (results.length === 0) {
            searchResults.innerHTML = '<div style="padding: 20px; text-align: center; color: #718096;">Tidak ada hasil ditemukan</div>';
            return;
        }

        const resultsHTML = results.map(result => `
            <div class="search-result-item" onclick="window.location.href='${result.url}'">
                <div class="search-result-title">${result.title}</div>
                <div class="search-result-subtitle">${result.subtitle}</div>
            </div>
        `).join('');

        searchResults.innerHTML = resultsHTML;
    }
});

function openAddPendaftaranModal() {
    // Implement your modal opening logic here
    console.log('Opening add registration modal');
}
</script>
