
      <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3 d-block " data-navbar-on-scroll="data-navbar-on-scroll">
        <div class="container">
            {{-- <a class="navbar-brand" href="{{url('/')}}"><img src="{{url('/')}}/assets/upload/logotutwuri.png" width="80px" alt="logo" /></a> --}}
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"> </span></button>
          <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto pt-2 pt-lg-0 font-base">
              <li class="nav-item px-2"><a class="nav-link" aria-current="page" href="{{url('/')}}">Beranda</a></li>
              {{-- <li class="nav-item px-2"><a class="nav-link" aria-current="page" href="{{route('landing.about')}}">Tentang Kami</a></li>
              <li class="nav-item px-2"><a class="nav-link" href="{{route('landing.pemain')}}">Pemain</a></li>
              <li class="nav-item px-2"><a class="nav-link" href="{{route('landing.pelatih')}}">Pelatih</a></li> --}}
            </ul><a class="btn btn-sm btn-outline-primary rounded-pill order-1 order-lg-0 ms-lg-4" href="{{route('login')}}">Login</a>
          </div>
        </div>
      </nav>
