<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
      {{-- <h3>General</h3> --}}
      <ul class="nav side-menu">
        <li><a href="{{route('dashboard')}}"><i class="fa fa-home"></i>Beranda</a></li>
        @if (Auth::user()->tipeuser=='admin')
        {{-- <li><a href="{{route('settings')}}"><i class="fas fa-cogs"></i> Pengaturan </a></li> --}}

      <li><a><i class="fas fa-cog"></i> Pengaturan<span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="{{route('settings')}}">Aplikasi</a></li>
          <li><a href="{{route('settingsgaji')}}">Gaji</a></li>
          <li><a href="{{route('jabatan')}}">Jabatan</a></li>
        </ul>
      </li>
      <li><a href="{{route('pegawai')}}"><i class="fas fa-user-tie"></i> Pegawai  </a></li>
      <li><a href="{{route('gajipegawai')}}"><i class="far fa-money-bill-alt"></i> Penggajian Pegawai </a></li>
      <li><a href="{{route('guru')}}"><i class="fas fa-user-graduate"></i> Guru  </a></li>
      <li><a href="{{route('gajiguru')}}"><i class="far fa-money-bill-alt"></i> Penggajian Guru </a></li>
      {{-- <li><a href="{{route('gajiguru')}}"><i class="fas fa-user-secret"></i> Rekap Penggajian </a></li> --}}

      @endif

      </ul>

    </div>

  </div>
