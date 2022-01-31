@extends('layouts.default')

@section('title')
Beranda
@endsection

@push('before-script')

@if (session('status'))
<x-sweetalertsession tipe="{{session('tipe')}}" status="{{session('status')}}"/>
@endif
@endpush

@if((Auth::user()->tipeuser)=='admin')

@include('pages.admin.dashboard.dashboard_admin')
@elseif ((Auth::user()->tipeuser)=='pemain')
@include('pages.admin.dashboard.dashboard_admin')
@else
@include('pages.admin.dashboard.dashboard_admin')
@endif
