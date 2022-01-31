@extends('layouts.default')

@section('title')
 Profile
@endsection

@push('before-script')
    @if (session('status'))
    <x-sweetalertsession tipe="{{session('tipe')}}" status="{{session('status')}}"/>
    @endif
@endpush


@section('content')
        <section class="section">
            <div class="section-header">
            <h1>@yield('title')</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('dashboard')}}">Dashboard</a></div>
                {{-- <div class="breadcrumb-item"><a href="#">Layout</a></div> --}}
                <div class="breadcrumb-item">@yield('title')</div>
            </div>
            </div>

            <div class="section-body">
            <div class="card">
                <div class="card-header">
                <h4>Edit</h4>
                </div>
                <div class="card-body">

                    <form action="{{route('profileupdate')}}" method="post" enctype="multipart/form-data">
                        @method('put')
                        @csrf

                        <div class="row">

                        <div class="form-group col-md-5 col-5 mt-0 ml-5">
                            <label for="name">Nama Lengkap <code>*)</code></label>
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{$datas->name}}" required>
                            @error('name')<div class="invalid-feedback"> {{$message}}</div>
                            @enderror
                        </div>


                        <div class="form-group col-md-5 col-5 mt-0 ml-5">
                            <label for="email">Email <code>*)</code></label>
                            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{$datas->email}}" required>
                            @error('email')<div class="invalid-feedback"> {{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group col-md-5 col-5 mt-0 ml-5">
                            <label for="username">Username <code>*)</code></label>
                            <input type="text" class="form-control  @error('username') is-invalid @enderror" name="username" required value="{{$datas->username}}">

                            @error('username')<div class="invalid-feedback"> {{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group col-md-5 col-5 mt-0 ml-5">
                            <label for="password">Password <code>*)</code></label>
                            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" >
                            @error('username')<div class="invalid-feedback"> {{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-5 col-5 mt-0 ml-5">
                            <label for="password2">Konfirmasi Password <code>*)</code></label>
                            <input type="password" class="form-control  @error('password2') is-invalid @enderror" name="password2" >

                            @error('password2')<div class="invalid-feedback"> {{$message}}</div>
                            @enderror
                        </div>




                        </div>



                </div>
            <div class="card">
                        <div class="card-footer text-right mr-5">
                            <button class="btn btn-primary">Simpan</button>
                        </div>
                    </form>

                </div>
            </div>
            </div>

        </section>
@endsection
