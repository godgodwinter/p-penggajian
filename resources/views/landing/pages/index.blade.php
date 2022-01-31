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

<section class="py-xxl-10 pb-0" id="home">
    <div class="bg-holder bg-size" style="background-image:url({{asset('/')}}assets/img/bg/hero-bg.png);background-position:top center;background-size:cover;">
    </div>
    <!--/.bg-holder-->

    <div class="container">
      <div class="row min-vh-xl-100 min-vh-xxl-25">
        <div class="col-md-5 col-xl-6 col-xxl-7 order-0 order-md-1 text-end"><img class="pt-7 pt-md-0 w-100" src="{{url('/')}}/assets/img/undraw/undraw_confidential_letter_w6ux.svg" alt="hero-header" /></div>
        <div class="col-md-75 col-xl-6 col-xxl-5 text-md-start text-center py-6">
          <h1 class="fw-light font-base fs-6 fs-xxl-7">SI <strong>Administrasi Surat</strong> .</strong></h1>
          {{-- <p class="fs-1 mb-5">Menggunakan Metode MFEP dengan tambahan notifikasi Whatsapp. </p><a class="btn btn-lg btn-primary rounded-pill" href="{{route('login')}}" role="button">Login</a> --}}
        </div>
      </div>
    </div>
  </section>

@endsection
