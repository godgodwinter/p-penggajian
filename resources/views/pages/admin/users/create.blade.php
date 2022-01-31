@extends('layouts.gentella')

@section('title')
Tambah Users
@endsection

@push('before-script')

@if (session('status'))
<x-sweetalertsession tipe="{{session('tipe')}}" status="{{session('status')}}"/>
@endif
@endpush


@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Tambah
                    {{-- <small>different form elements</small> --}}
                </h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a class="dropdown-item" href="#">Settings 1</a>
                            </li>
                            <li><a class="dropdown-item" href="#">Settings 2</a>
                            </li>
                        </ul>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                <form action="{{route('users.store')}}" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                    @csrf

                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama Lengkap <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="first-name" required="required" class="form-control @error('name') is-invalid @enderror" name="name">
                            @error('name')<div class="invalid-feedback"> {{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align @error('username') is-invalid @enderror" for="last-name">Username <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="last-name" name="username" required="required" class="form-control">
                            @error('username')<div class="invalid-feedback"> {{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="email" id="last-name" name="email" required="required" class="form-control @error('email') is-invalid @enderror">
                            @error('email')<div class="invalid-feedback"> {{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Password <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="password" id="last-name" name="password" required="required" class="form-control @error('password') is-invalid @enderror">
                            @error('password')<div class="invalid-feedback"> {{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Konfirmasi Password <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="password" id="last-name" name="password2" required="required" class="form-control @error('password2') is-invalid @enderror">
                            @error('password2')<div class="invalid-feedback"> {{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Hak Akses <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select id="heard" class="form-control @error('tipeuser') is-invalid @enderror" required name="tipeuser">
                                <option value="">Pilih Hak Akses ...</option>
                                <option value="admin">Admin</option>
                                <option value="divisi">Divisi</option>
                                <option value="direksi">Direksi</option>
                            </select>
                            @error('tipeuser')<div class="invalid-feedback"> {{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Divisi <span class="required">*jika bukan Hak Akses Divisi data akan di kosongkan</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select id="heard" class="form-control @error('divisi') is-invalid @enderror" required name="divisi">
                                <option value="">Pilih Divisi ...</option>
                                @forelse ($divisi as $item)
                                <option value="{{$item->id}}">{{$item->nama}}</option>
                                @empty

                                @endforelse
                            </select>
                            @error('divisi')<div class="invalid-feedback"> {{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                            <a class="btn btn-dark" type="button" href="{{route('users')}}">Batal</a>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection
