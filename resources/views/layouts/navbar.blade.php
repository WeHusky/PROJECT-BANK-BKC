<!-- resources/views/navbar.blade.php -->
<style>
  .navbar {
    position: fixed;
    bottom: 0;
    left: 0;
    right: 0;
    z-index: 50;
    background-color: white;
    border-top: 1px solid #22d3ee;
    border-top-left-radius: 3.5rem;
    border-top-right-radius: 3.5rem;
    box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.1);
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
    <div class="navbar-item {{ request()->is('settings') ? 'active' : '' }}">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 3a.75.75 0 011.5 0v1.02c.36.06.71.15 1.04.26l.73-.73a.75.75 0 111.06 1.06l-.73.73c.11.33.2.68.26 1.04H21a.75.75 0 010 1.5h-1.02a6.004 6.004 0 01-.26 1.04l.73.73a.75.75 0 11-1.06 1.06l-.73-.73a6.004 6.004 0 01-1.04.26V21a.75.75 0 01-1.5 0v-1.02a6.004 6.004 0 01-1.04-.26l-.73.73a.75.75 0 11-1.06-1.06l.73-.73a6.004 6.004 0 01-.26-1.04H3a.75.75 0 010-1.5h1.02a6.004 6.004 0 01.26-1.04l-.73-.73a.75.75 0 111.06-1.06l.73.73c.33-.11.68-.2 1.04-.26V3z" />
      </svg>
      <span class="mt-1">Settings</span>
    </div>

    <!-- Home -->
    <a href="{{ route('homepage') }}" class="navbar-item">
      <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
        <path d="M12 3l8 6v12h-5v-7H9v7H4V9l8-6z" />
      </svg>
      <span class="mt-1">Home</span>
    </a>

    <!-- Account -->
    <div class="navbar-item {{ request()->is('account') ? 'active' : '' }}">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A9 9 0 0112 15a9 9 0 016.879 2.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
      </svg>
      <span class="mt-1">Account</span>
    </div>
  </div>
</div>
