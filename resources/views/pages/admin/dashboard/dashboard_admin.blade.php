
@section('content')
        <section class="section">
            <div class="section-header">
            <h1>@yield('title')</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('dashboard')}}">Dashboard</a></div>
                {{-- <div class="breadcrumb-item"><a href="#">Layout</a></div> --}}
                {{-- <div class="breadcrumb-item">Default Layout</div> --}}
            </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                      <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                        <div class="card-wrap">
                          <div class="card-header">
                            <h4>Jumlah Pemain</h4>
                          </div>
                          <div class="card-body">

                            {{$jmlpemain}} Pemain
                            {{-- <div class="text-muted text-small"><span class="text-primary"><i class="fas fa-caret-up"></i></span> 1Kelas</div> --}}

                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                      <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                            <i class="fas fa-school"></i>
                        </div>
                        <div class="card-wrap">
                          <div class="card-header">
                            <h4>Jumlah Pelatih</h4>
                          </div>
                          <div class="card-body">

                            {{$jmlpelatih}} Pelatih
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                      <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="fab fa-monero"></i>
                        </div>
                        <div class="card-wrap">
                          <div class="card-header">
                            <h4>Jumlah Posisi Pemain</h4>
                          </div>
                          <div class="card-body">

                            {{$jmlposisi}} Posisi
                            {{-- <div class="text-muted text-small"><span class="text-primary"><i class="fas fa-caret-up"></i></span> Total {{$transaksiTotalJml}} Total</div> --}}
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                      <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="fas fa-microchip"></i>
                        </div>
                        <div class="card-wrap">
                          <div class="card-header">
                            <h4>Jumlah Proses Penilaian</h4>
                          </div>
                          <div class="card-body">

                                {{$jmlproses}} Proses
                                <div class="text-muted text-small"><span class="text-primary"><i class="fas fa-caret-up"></i></span> Total {{$jmlprosesselesai}} Selesai</div>


                          </div>
                        </div>
                      </div>
                    </div>
                  </div>



              {{-- <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                  <div class="card">
                    <div class="card-header">
                      <h4>Jumlah Member : {{$laki+$perempuan}}</h4>
                    </div>
                    <div class="card-body">
                      <canvas id="myChart3"></canvas>
                    </div>
                  </div>
                </div>

              </div> --}}



            </div>
        </section>


{{-- @push('after-style')

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
<script>


  $(document).ready(function() {
    //doughnut
    var ctx = document.getElementById('myChart3').getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
      labels: ['Member Laki-laki', 'Member Perempuan'],
      datasets: [{
        label: '# of Votes',
        data: [{{$laki}}, {{$perempuan}}],
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)'
        ],
        borderColor: [
          'rgba(255, 99, 132, 1)',
          'rgba(54, 162, 235, 1)'
        ],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: true
          }
        }]
      }
    }
  });



});

    </script>
@endpush --}}
@endsection
