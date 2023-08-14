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
            <div class="row d-flex flex-md-row-reverse">
                <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1"
                    data-aos="fade-up" data-aos-delay="200">

                    <div class="col-lg-12 z-index-2">
                        <h4>LOGIN ADMINISTRATOR</h4>
                        <form class="row g-3" action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="col-md-12">
                                <label for="inputName">Username :</label>
                                <input
                                    class="form-control form-livedoc-contro @error('identity')
                    is-invalid
                    @enderror"
                                    id="inputName" placeholder="Username" autocomplete="nope" name="identity" />
                                @error('identity')
                                    <div class="invalid-feedback text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label for="inputPhone">Password :</label>
                                <input
                                    class="form-control form-livedoc-control @error('password')
                    is-invalid
                    @enderror"
                                    type="password" placeholder="Password" autocomplete="nope" name="password" />
                                @error('password')
                                    <div class="invalid-feedback text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="d-flex flex-row-reverse">
                                <button class="btn btn-primary rounded-pill" type="submit">Login</button>
                            </div>
                        </form>
                    </div>


                    <div class="col-lg-12 z-index-2">
                        {{-- <div class="row">
                            <h3>Demo : </h3>

                            <div class="col-md-4">
                                <h5>Sebagai : Admin</h5>
                                <label for="inputPhone">Username : admin</label>
                                <br>
                                <label for="inputPhone">Password : admin</label>
                            </div>


                        </div> --}}

                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
                    <img src="{{ url('/') }}/assets/img/undraw/undraw_pay_online_b-1-hk__.svg"
                        class="img-fluid animated" alt="">
                </div>
            </div>
        </div>

    </section>
@endsection
