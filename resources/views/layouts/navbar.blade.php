<!-- resources/views/navbar.blade.php -->
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded" rel="stylesheet" />
<style>
    .material-symbols-rounded {
    font-variation-settings:
      'FILL' 1,
      'wght' 400,
      'GRAD' 0,
      'opsz' 24;
  }
  .navbar {
    position: fixed;
    bottom: 0;
    left: 0;
    right: 0;
    z-index: 50;
    background-color: white;
    border-top: 1px solid #29BBCF;
    border-top-left-radius: 2.5rem;
    border-top-right-radius: 2.5rem;
    box-shadow: 0 -2px 5px rgb(255, 255, 255);
  }
  .navbar-menu {
    display: flex;
    justify-content: space-around;
    padding: 0.75rem 0;
  }
  .navbar-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    color: #06b6d4;
    font-size: 0.75rem;
  }
  .navbar-item.active {
    color: #0891b2;
    font-weight: 600;
  }
  .navbar-item svg {
    width: 1.5rem;
    height: 1.5rem;
  }
</style>

        <div class="navbar">
        <div class="navbar-menu">
            <!-- Settings -->
            <!-- Settings -->
        <div class="navbar-item {{ request()->is('settings') ? 'active' : '' }}">
        <span class="material-symbols-rounded text-xl">settings</span>
        <span class="mt-1">Settings</span>
        </div>

        <!-- Home -->
        <a href="{{ route('nasabah.homepage') }}" class="navbar-item {{ request()->is('homepage') ? 'active' : '' }}">
      
        <span class="material-symbols-rounded text-xl">home</span>
        <span class="mt-1">Home</span>
        </a>

        <!-- Account -->
        <a href="{{ route('nasabah.account') }}" class="navbar-item {{ request()->is('account') ? 'active' : '' }}">
        <span class="material-symbols-rounded text-xl">account_circle</span>
        <span class="mt-1">Account</span>
        </a>
    </div>
  </div>
</div>
