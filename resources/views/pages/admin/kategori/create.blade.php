@extends('layouts.gentella')

@section('title')
Tambah
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
                <h2>@yield('title')
                </h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                <form action="{{route('kategori.store')}}" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                    @csrf

                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama Kategori <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text"  required="required" class="form-control @error('nama') is-invalid @enderror" name="nama">
                            @error('nama')<div class="invalid-feedback"> {{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Prefix <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select id="heard" class="form-control @error('prefix') is-invalid @enderror" required name="prefix">
                                <option value="">Pilih Prefix ...</option>
                                <option value="suratmasuk">Surat Masuk</option>
                                <option value="suratkeluar">Surat Keluar</option>
                            </select>
                            @error('prefix')<div class="invalid-feedback"> {{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                            <a class="btn btn-dark" type="button" href="{{route('divisi')}}">Batal</a>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection
