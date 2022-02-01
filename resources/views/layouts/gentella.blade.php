<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{Fungsi::app_nama()}}</title>
    @stack('before-style')
    @include('includes.style')
    @stack('after-style')
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="{{route('dashboard')}}" class="site_title">
                <i class="fas fa-wallet"></i></i>
                <span>{{Fungsi::app_nama()}}</span>
            </a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="{{asset('assets/img/avatar/avatar-1.png')}}" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Selamat Datang,</span>
                <h2>{{ Auth::user()->name }}</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
    @include('includes.sidebar')

            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
               <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <form method="POST" action="{{ route('logout') }}">
                @csrf


                <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{ route('logout') }}"  onclick="event.preventDefault();
                this.closest('form').submit();">
                    <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                  </a>
            </form>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <div class="nav toggle">
                  <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                </div>
                <nav class="nav navbar-nav">
                <ul class=" navbar-right">
                  <li class="nav-item dropdown open" style="padding-left: 15px;">
                    <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                      <img src="{{asset('assets/img/avatar/avatar-1.png')}}" alt="">{{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                      {{-- <a class="dropdown-item"  href="{{route('settings')}}">
                        <span class="badge bg-red pull-right">Edit</span>Profile</a> --}}

                    {{-- <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger"
                    onclick="event.preventDefault();
                                this.closest('form').submit();">
                        <i class="fas fa-sign-out-alt">
                        </i> Logout
                      </a> --}}

              <form method="POST" action="{{ route('logout') }}">
                @csrf
                      <a class="dropdown-item"  href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                                  this.closest('form').submit();"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
            </form>
                    </div>
                  </li>

                  <li role="presentation" class="nav-item dropdown open">
                    {{-- <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                      <i class="fa fa-envelope-o"></i>
                      <span class="badge bg-green">6</span>
                    </a> --}}
                    <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                      <li class="nav-item">
                        <a class="dropdown-item">
                          <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                          <span>
                            <span>John Smith</span>
                            <span class="time">3 mins ago</span>
                          </span>
                          <span class="message">
                            Film festivals used to be do-or-die moments for movie makers. They were where...
                          </span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="dropdown-item">
                          <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                          <span>
                            <span>John Smith</span>
                            <span class="time">3 mins ago</span>
                          </span>
                          <span class="message">
                            Film festivals used to be do-or-die moments for movie makers. They were where...
                          </span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="dropdown-item">
                          <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                          <span>
                            <span>John Smith</span>
                            <span class="time">3 mins ago</span>
                          </span>
                          <span class="message">
                            Film festivals used to be do-or-die moments for movie makers. They were where...
                          </span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="dropdown-item">
                          <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                          <span>
                            <span>John Smith</span>
                            <span class="time">3 mins ago</span>
                          </span>
                          <span class="message">
                            Film festivals used to be do-or-die moments for movie makers. They were where...
                          </span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <div class="text-center">
                          <a class="dropdown-item">
                            <strong>See All Alerts</strong>
                            <i class="fa fa-angle-right"></i>
                          </a>
                        </div>
                      </li>
                    </ul>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          {{-- <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Fixed Sidebar <small> Just add class <strong>menu_fixed</strong></small></h3>
              </div>
            </div>
          </div> --}}

        @yield('content')
        @yield('containermodal')
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
            @php
            // exec('git rev-parse --verify HEAD 2> /dev/null', $output);
            // $hash = $output[0];
            // dd($hash)

            $commitHash = trim(exec('git log --pretty="%h" -n1 HEAD'));

            $commitDate = new \DateTime(trim(exec('git log -n1 --pretty=%ci HEAD')));
            $commitDate->setTimezone(new \DateTimeZone('UTC'));

            // dd($commitDate);
            // dd($commitDate->format('Y-m-d H:i:s'));
            $versi=$commitDate->format('Ymd.H.i.s');
        @endphp
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a> - BaemonTeam v.{{$versi}}
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>


    {{-- script --}}
    @stack('before-script')
    @include('includes.script')
    @stack('after-script')
  </body>
</html>
