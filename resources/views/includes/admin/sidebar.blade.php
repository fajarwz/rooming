<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="index.html">SEMAK</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="index.html">SMK</a>
    </div>
    <ul class="sidebar-menu">
      @if (Auth::user()->role == 'USER')

        <li class="menu-header">Dashboard</li>
        <li><a class="nav-link" href="{{ route('user.dashboard') }}"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>

      @endif

      @if (Auth::user()->role == 'ADMIN')

        <li class="menu-header">Dashboard</li>
        <li><a class="nav-link" href="{{ route('admin.dashboard') }}"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>

        <li class="menu-header">USER</li>
        <li class="{{ request()->is('admin/user*') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('user.index') }}">
            <i class="fas fa-user"></i> <span>Data User</span>
          </a>
        </li>

        {{-- <li class="menu-header">RUANGAN</li>
        <li class="{{ request()->is('admin/room*') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('room.index') }}">
            <i class="fas fa-user"></i> <span>Data Ruangan</span>
          </a>
        </li> --}}

      @endif

      {{--<li class="menu-header">JURUSAN</li>
      <li class="{{ request()->is('admin/major*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('major.index') }}">
          <i class="far fa-square"></i> <span>Data Jurusan</span>
        </a>
      </li>

      <li class="menu-header">SETTING</li>
      <li><a class="nav-link" href="#"><i class="far fa-square"></i> <span>Pengumuman</span></a></li>
      <li class="dropdown {{ request()->is('admin/address/*') ? 'active' : '' }}">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-map-marker-alt"></i> <span>Alamat</span></a>
        <ul class="dropdown-menu">
          <li class="{{ request()->is('admin/address/province*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('province.index') }}">Provinsi</a></li>
          <li class="{{ request()->is('admin/address/regency*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('regency.index') }}">Kabupaten/Kota</a></li>
          <li class="{{ request()->is('admin/address/district*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('district.index') }}">Kecamatan</a></li>
        </ul>
      </li> --}}
    </ul>

  </aside>
</div>