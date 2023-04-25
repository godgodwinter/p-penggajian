@extends('layouts.gentella')

@section('title')
    Pengaturan
@endsection

@push('before-script')
    @if (session('status'))
        <x-sweetalertsession tipe="{{ session('tipe') }}" status="{{ session('status') }}" />
    @endif
@endpush


@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>@yield('title')</h3>
            </div>
            {{-- <div class="title_right">
                <div class="col-md-5 col-sm-5 form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                    </div>
                </div>
            </div> --}}
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Gaji</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            {{-- <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li> --}}
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        @push('before-script')
                            <script>
                                $(function() {
                                    let transport = document.getElementById('transport');
                                    transport.addEventListener('keyup', function(e) {
                                        transport.value = babengRupiah(this.value, 'Rp. ');
                                    });
                                    let simkoperasi = document.getElementById('simkoperasi');
                                    simkoperasi.addEventListener('keyup', function(e) {
                                        simkoperasi.value = babengRupiah(this.value, 'Rp. ');
                                    });
                                    let dansos = document.getElementById('dansos');
                                    dansos.addEventListener('keyup', function(e) {
                                        dansos.value = babengRupiah(this.value, 'Rp. ');
                                    });
                                    let walikelas = document.getElementById('walikelas');
                                    walikelas.addEventListener('keyup', function(e) {
                                        walikelas.value = babengRupiah(this.value, 'Rp. ');
                                    });
                                    let gajipokok = document.getElementById('gajipokok');
                                    gajipokok.addEventListener('keyup', function(e) {
                                        gajipokok.value = babengRupiah(this.value, 'Rp. ');
                                    });
                                });
                            </script>
                            <script src="{{ asset('/assets/js/babeng.js') }}"></script>
                        @endpush
                        <form action="{{ route('bendahara.settingsgaji.store') }}" method="post">
                            @csrf
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Transport<span
                                        class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" name="transport" id="transport" required="required"
                                        value="{{ $id->transport ? Fungsi::rupiahtanpanol($id->transport) : '' }}" />
                                </div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Simpanan Koperasi<span
                                        class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" name="simkoperasi" id="simkoperasi"type="text"
                                        required="required"
                                        value="{{ $id->simkoperasi ? Fungsi::rupiahtanpanol($id->simkoperasi) : '' }}" />
                                </div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Dana Sosial<span
                                        class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" name="dansos" id="dansos"type="text"
                                        required="required"
                                        value="{{ $id->dansos ? Fungsi::rupiahtanpanol($id->dansos) : '' }}" />
                                </div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Walikelas<span
                                        class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" name="walikelas" id="walikelas"type="text"
                                        required="required"
                                        value="{{ $id->walikelas ? Fungsi::rupiahtanpanol($id->walikelas) : '' }}" />
                                </div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Gaji Pokok (HR Guru)<span
                                        class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" name="gajipokok" id="gajipokok"type="text"
                                        required="required"
                                        value="{{ $id->gajipokok ? Fungsi::rupiahtanpanol($id->gajipokok) : '' }}" />
                                </div>
                            </div>
                            <div class="ln_solid">
                                <div class="form-group">
                                    <div class="col-md-6 offset-md-3">
                                        <button type='submit' class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
