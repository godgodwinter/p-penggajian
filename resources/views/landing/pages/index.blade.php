@extends('layouts.defaultlanding')

@section('title')
    Beranda
@endsection

@push('before-script')
    @if (session('status'))
        <x-sweetalertsession tipe="{{ session('tipe') }}" status="{{ session('status') }}" />
    @endif
@endpush

@section('content')
    <section id="hero" class="d-flex align-items-center">
        <div class="bg-holder bg-size"
            style="background-image:url({{ asset('/') }}assets/img/bg/hero-bg.png);background-position:top center;background-size:cover;">
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1"
                    data-aos="fade-up" data-aos-delay="200">
                    <h1 class="fw-light font-base fs-6 fs-xxl-7"><strong>{{ Fungsi::app_nama() }}</strong> .</strong></h1>
                    {{-- <h2>We are team of talented designers making websites with Bootstrap</h2> --}}
                    {{-- <div class="d-flex justify-content-center justify-content-lg-start">
                        <a href="{{ route('login') }}" class="btn-get-started scrollto">Get Started</a>
                    </div> --}}
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
                    <img src="{{ url('/') }}/assets/img/undraw/undraw_pay_online_b-1-hk__.svg"
                        class="img-fluid animated" alt="">
                </div>
            </div>
        </div>

    </section>
@endsection
