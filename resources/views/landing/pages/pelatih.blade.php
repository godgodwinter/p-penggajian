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



          <section>
            <div class="bg-holder bg-size" style="background-image:url(assets/img/gallery/dot-bg.png);background-position:top left;background-size:auto;">
            </div>
            <!--/.bg-holder-->
            <h1 class="text-center mt-2 mb-4">{{ucfirst($pages)}}</h1>

            <div class="container">
              <div class="row">

                @forelse ($datas as $data)
                @php
                $gambar=url('assets/img/example-image.jpg');
                @endphp
                @if($data->photo!=null AND $data->photo!=url('storage') AND $data->photo!='')
                @php
                     $gambar=$data->photo;
                @endphp
                @endif
                <div class="col-sm-6 col-lg-3 mb-4">
                  <div class="card h-100 shadow card-span rounded-3"><img class="card-img-top rounded-top-3" src="{{$gambar}}" alt="news" />
                    <div class="card-body"><span class="fs--1 text-primary me-3">{{$data->jk}}</span>
                      <svg class="bi bi-calendar2 me-2" xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z"></path>
                        <path d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4z"> </path>
                      </svg><span class="fs--1 text-900">Spesialisasi : {{$data->spesialis}}</span><span class="fs--1"></span>
                      <h5 class="font-base fs-lg-0 fs-xl-1 my-3">{{$data->nama}}</h5>
                      {{-- <a class="stretched-link" href="#!">read full article</a> --}}
                    </div>
                  </div>
                </div>

                @empty
                    Data tidak ditemukan
                @endforelse


              </div>

              <div class="d-flex justify-content-between flex-row-reverse mt-3">
                <div class="text-right">

                    {{ $datas->onEachSide(1)
                        ->links() }}
                </div>
            </div>

            </div>
          </section>

@endsection
