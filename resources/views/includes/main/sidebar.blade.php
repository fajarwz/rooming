<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="index.html">ROOMING</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="index.html">RM</a>
    </div>
    <ul class="sidebar-menu">
      @if (Auth::user()->role == 'USER')

      <li class="menu-header">Home</li>
      <li><a class="nav-link" href="{{ route('user.home') }}"><i class="fas fa-fire"></i> <span>Home</span></a></li>

      <li class="menu-header">RUANGAN</li>
      <li class="{{ request()->is('room*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('user.rooms.index') }}">
          <i class="fas fa-door-open"></i> <span>Ruangan</span>
        </a>
      </li>

      <li class="menu-header">SETTING</li>
      <li class="{{ request()->is('change-pass*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('user.change-pass.index') }}">
          <i class="fas fa-key"></i> <span>Ganti Password</span>
        </a>
      </li>

      @endif

      @if (Auth::user()->role == 'ADMIN')

      <li class="menu-header">Dashboard</li>
      <li><a class="nav-link" href="{{ route('admin.dashboard') }}"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>

      <li class="menu-header">DATA MASTER</li>
      <li class="{{ request()->is('admin/room*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.rooms.index') }}">
          <i class="fas fa-door-open"></i> <span>Ruangan</span>
        </a>
      </li>
      <li class="{{ request()->is('admin/user*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.user.index') }}">
          <i class="fas fa-user"></i> <span>User</span>
        </a>
      </li>

      <li class="menu-header">SETTING</li>
      <li class="{{ request()->is('admin/change-pass*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.change-pass.index') }}">
          <i class="fas fa-key"></i> <span>Ganti Password</span>
        </a>
      </li>

      @endif

    </ul>

  </aside>
</div>