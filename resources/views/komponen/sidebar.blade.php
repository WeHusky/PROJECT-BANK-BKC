<head>
  <!-- Font Awesome (opsional, untuk ikon) -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

  <style>
    .sidebar {
      width: 220px;
      background-color: white;
      height: 100vh;
      position: fixed;
      top: 0;
      left: 0;
      box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease-in-out;
      z-index: 50;
    }

    .sidebar.closed {
      transform: translateX(-100%);
    }

    .nav-link {
      display: flex;
      align-items: center;
      padding: 12px 20px;
      color: #4B5563;
      text-decoration: none;
      border-radius: 6px;
      font-size: 15px;
      transition: background 0.2s, color 0.2s;
    }

    .nav-link i {
      margin-right: 12px;
      width: 20px;
      text-align: center;
    }

    .nav-link:hover {
      background: #f0f4ff;
      color: #2563eb;
    }

    .nav-link.active {
      background: #e0edff;
      color: #1d4ed8;
      font-weight: bold;
    }

    .sidebar-toggle {
      position: fixed;
      top: 16px;
      left: 16px;
      z-index: 60;
      background: #1d4ed8;
      color: white;
      border: none;
      padding: 8px 12px;
      border-radius: 6px;
      cursor: pointer;
      font-size: 18px;
    }

    .sidebar .logo-container {
      padding: 24px 20px;
      text-align: right;
    }

    .sidebar img {
      width: 120px;
      margin-bottom: 16px;
    }

    nav.sidebar-nav {
      display: flex;
      flex-direction: column;
      gap: 8px;
      padding: 0 20px;
    }
  </style>
</head>

<body>
  <!-- Tombol Toggle Sidebar -->
  <button class="sidebar-toggle" onclick="toggleSidebar()">☰</button>

  <!-- Sidebar -->
  <aside id="sidebar" class="sidebar">
    <div class="logo-container">
      <img src="{{ asset('images/logo.png') }}" alt="BANK BKC">
    </div>
    <nav class="sidebar-nav">
      <a href="{{ route('dashboard') }}" class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}">
        <i class="fa-solid fa-house"></i> Dashboard
      </a>
      <a href="#" class="nav-link">
        <i class="fa-solid fa-arrow-right-arrow-left"></i> Transactions
      </a>
      <a href="#" class="nav-link">
        <i class="fa-solid fa-money-check-dollar"></i> Loans
      </a>
      <a href="#" class="nav-link">
        <i class="fa-solid fa-chart-line"></i> Investments
      </a>
      <a href="#" class="nav-link">
        <i class="fa-solid fa-user-gear"></i> Accounts
      </a>
      <a href="#" class="nav-link">
        <i class="fa-solid fa-screwdriver-wrench"></i> Services
      </a>
      <a href="#" class="nav-link">
        <i class="fa-solid fa-gift"></i> My Privileges
      </a>
      <a href="#" class="nav-link">
        <i class="fa-solid fa-gear"></i> Setting
      </a>
    </nav>
  </aside>

  <script>
    function toggleSidebar() {
      document.getElementById('sidebar').classList.toggle('closed');
    }
  </script>
</body>
