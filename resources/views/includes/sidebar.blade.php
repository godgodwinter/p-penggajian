<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
      <h3>General</h3>
      <ul class="nav side-menu">
        <li><a href="{{route('dashboard')}}"><i class="fa fa-home"></i> Beranda </a></li>
        @if (Auth::user()->tipeuser=='admin')
        <li><a href="{{route('settings')}}"><i class="fas fa-cogs"></i> Pengaturan </a></li>
        <li><a href="{{route('divisi')}}"><i class="fas fa-users"></i>Divisi </a></li>
      <li><a href="{{route('users')}}"><i class="fas fa-user-secret"></i> Users </a></li>

      <li><a><i class="fas fa-envelope"></i> Surat Masuk <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="{{route('kategori')}}">Kategori</a></li>
          <li><a href="{{route('suratmasuk')}}">Surat Masuk</a></li>
        </ul>
      </li>

      <li><a><i class="fas fa-envelope-open-text"></i> Surat Keluar <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="{{route('kategori')}}">Kategori</a></li>
          <li><a href="{{route('suratkeluar')}}">Surat Keluar</a></li>
        </ul>
      </li>
      @endif

      @if (Auth::user()->tipeuser=='divisi')

      <li><a href="{{route('divisi.suratmasuk')}}"><i class="fas fa-envelope"></i>  Surat Masuk</a></li>
      {{-- <li><a href="{{route('divisi.suratkeluar')}}"><i class="fas fa-envelope-open-text"></i> Surat Keluar</a></li> --}}

      @endif

      @if (Auth::user()->tipeuser=='direksi')

      <li><a href="{{route('direksi.suratmasuk')}}"><i class="fas fa-envelope"></i>  Surat Masuk</a></li>
      <li><a href="{{route('direksi.suratkeluar')}}"><i class="fas fa-envelope-open-text"></i> Surat Keluar</a></li>

      @endif

      {{-- <li><a href="javascript:void(0)"><i class="fa fa-laptop"></i> Buat Surat </a></li> --}}

      </ul>

    </div>

  </div>
