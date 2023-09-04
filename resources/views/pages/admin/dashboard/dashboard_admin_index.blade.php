@extends('layouts.gentella')

@section('title')
    Beranda
@endsection

@push('before-script')
    @if (session('status'))
        <x-sweetalertsession tipe="{{ session('tipe') }}" status="{{ session('status') }}" />
    @endif
@endpush

@if (Auth::user()->tipeuser == 'admin')
    {{-- @include('pages.admin.dashboard.dashboard_admin') --}}
@elseif (Auth::user()->tipeuser == 'pemain')
    {{-- @include('pages.admin.dashboard.dashboard_admin') --}}
@else
    {{-- @include('pages.admin.dashboard.dashboard_admin') --}}
@endif

@section('content')
    <div class="babeng-container">
        <span><img src="{{ url('/') }}/assets/upload/logo_smp.png" width="300px" alt="logo" /></span>
        <h1>Selamat Datang {{ Auth::user()->name }} , Anda masuk sebagai Admin.</h1>
    </div>
@endsection
