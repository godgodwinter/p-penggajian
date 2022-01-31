
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
                            <h4>Jumlah Produk</h4>
                          </div>
                          <div class="card-body">

                            {{$produkJml}} Produk
                            <div class="text-muted text-small"><span class="text-primary"><i class="fas fa-caret-up"></i></span> 1Kelas</div>

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
                            <h4>Jumlah Treatment</h4>
                          </div>
                          <div class="card-body">

                            {{$treatmentJml}} Treatment
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
                            <h4>Jumlah Transaksi</h4>
                          </div>
                          <div class="card-body">

                            {{$transaksiSuccessJml}} Transaksi
                            <div class="text-muted text-small"><span class="text-primary"><i class="fas fa-caret-up"></i></span> Total {{$transaksiTotalJml}} Total</div>
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
                            <h4>Jumlah Perawatan</h4>
                          </div>
                          <div class="card-body">

                                {{$perawatanJml}} Perawatan

                          </div>
                        </div>
                      </div>
                    </div>
                  </div>



              <div class="row">
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

              </div>



            </div>
        </section>


@push('after-style')

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
@endpush
@endsection
