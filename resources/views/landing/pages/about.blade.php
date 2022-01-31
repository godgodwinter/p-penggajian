@extends('layouts.defaultlanding')

@section('title')
Beranda
@endsection

@push('before-script')

@if (session('status'))
<x-sweetalertsession tipe="{{session('tipe')}}" status="{{session('status')}}"/>
@endif
@endpush

@section('content')



     <!-- ============================================-->
      <!-- <section> begin ============================-->
        <section class="pb-0" id="about">

            <div class="container">
              <div class="row">
                <div class="col-12 py-0">
                  <div class="bg-holder bg-size" style="background-image:url({{asset('/')}}assets/img/livdoc/about-us.png);background-position:top center;background-size:contain;">
                  </div>
                  <!--/.bg-holder-->

                  <h1 class="text-center">ABOUT US</h1>
                </div>
              </div>
            </div>
            <!-- end of .container-->

          </section>
          <!-- <section> close ============================-->
          <!-- ============================================-->

          <section class="py-5">
            {{-- <div class="bg-holder bg-size" style="background-image:url({{asset('/')}}assets/img/unsplash/ball1.jpg);background-position:top center;background-size:contain;">
            </div> --}}
            <!--/.bg-holder-->
            <div class="container">
            <div class="row">

            <div class="container">
              <div class="row align-items-center">
                <div class="col-md-6 order-lg-1 mb-5 mb-lg-0">
                    <img class="fit-cover rounded-circle w-md-50" src="{{asset('/')}}assets/img/unsplash/ball1.jpg" alt="..." />
                </div>
                <div class="col-md-6 text-center text-md-start">
                  <h2 class="fw-bold mb-4">{{Fungsi::lembaga_nama()}}</h2>
                  <p>{{Fungsi::lembaga_jalan()}} </p>
                  <p>Telp : {{Fungsi::lembaga_telp()}} </p>
                  {{-- <div class="py-3">
                    <button class="btn btn-lg btn-outline-primary rounded-pill" type="submit">Learn more </button>
                  </div> --}}
                </div>
              </div>
            </div>


            <div class="container mt-5">
                <div class="row align-items-center">
                  <div class="col-md-6 mb-5 mb-lg-0">
                    <img class="fit-cover rounded-circle w-md-50" src="{{asset('/')}}assets/img/unsplash/ball2.jpg" alt="..." />
                    </div>
                  <div class="col-md-6 text-center text-md-start">
                    <h2 class="fw-bold mb-4">Visi dan Misi</h2>
                    <p>Untuk mencetak pemain sepak bola yang baik tidaklah mudah atau dengan cara instan, tapi lebih kepada pembinaan usia dini yang merupakan pembinaan secara berjenjang dan hasilnya akan mendapatkan pemain yang professional. </p>
                    {{-- <div class="py-3">
                      <button class="btn btn-lg btn-outline-primary rounded-pill" type="submit">Learn more </button>
                    </div> --}}
                  </div>
                </div>
              </div>


            <div class="container mt-5">
                <div class="row align-items-center">
                  <div class="col-md-6 order-lg-1  mb-5 mb-lg-0">
                    <img class="fit-cover rounded-circle w-md-50" src="{{asset('/')}}assets/img/unsplash/ball3.jpg" alt="..." />
                    </div>
                  <div class="col-md-6 text-center text-md-start">
                    <h2 class="fw-bold mb-4">Jadwal Latihan</h2>
                    <p>Setiap hari Minggu mulai pukul 07.30 s.d 09.30 WIB</p>
                    <br>
                    <p>Setiap hari Selasa mulai pukul 15.00 s.d 16.30 WIB</p>
                    <br>
                    <p>setiap hari Jum’at mulai pukul 14.30 s.d 16.00 WIB</p>
                    {{-- <div class="py-3">
                      <button class="btn btn-lg btn-outline-primary rounded-pill" type="submit">Learn more </button>
                    </div> --}}
                  </div>
                </div>
              </div>
            </div>


        </div>
          </section>

@endsection
