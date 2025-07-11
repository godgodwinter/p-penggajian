@extends('layouts.gentella')

@section('title')
    Pegawai
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
                {{-- <h3>@yield('title')</h3> --}}
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
                        <h2>@yield('title')</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            {{-- <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li> --}}
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form action="{{ route('pegawai.update', $id->id) }}" method="post">
                            @method('put')
                            @csrf
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Nama<span
                                        class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" name="nama" id="nama" required="required"
                                        value="{{ old('nama') ? old('nama') : $id->nama }}" />
                                </div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Nomerinduk<span
                                        class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control  @error('nomerinduk') is-invalid @enderror" name="nomerinduk"
                                        id="nomerinduk" required="required"
                                        value="{{ old('nomerinduk') ? old('nomerinduk') : $id->nomerinduk }}" />
                                    @error('nomerinduk')
                                        <div class="invalid-feedback"> {{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Jumlah Kehadiran<span
                                        class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control  @error('hadir') is-invalid @enderror" name="hadir"
                                        id="hadir" required="required"
                                        value="{{ old('hadir') ? old('hadir') : $id->hadir }}" />
                                    @error('hadir')
                                        <div class="invalid-feedback"> {{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Jenis Kelamin<span
                                        class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <select id="heard" class="form-control @error('jk') is-invalid @enderror" required
                                        name="jk">
                                        <option selected>{{ $id->jk }}</option>
                                        <option>Laki-laki</option>
                                        <option>Perempuan</option>
                                    </select>
                                    @error('jk')
                                        <div class="invalid-feedback"> {{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Alamat<span
                                        class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control  @error('alamat') is-invalid @enderror" name="alamat"
                                        id="alamat" required="required"
                                        value="{{ old('alamat') ? old('alamat') : $id->alamat }}" />
                                    @error('alamat')
                                        <div class="invalid-feedback"> {{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">No Telp<span
                                        class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control  @error('telp') is-invalid @enderror" name="telp"
                                        id="telp" required="required"
                                        value="{{ old('telp') ? old('telp') : $id->telp }}" />
                                    @error('telp')
                                        <div class="invalid-feedback"> {{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align"> Tanggal Mulai Bekerja<span
                                        class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control  @error('tgl_mulai_bekerja') is-invalid @enderror"
                                        name="tgl_mulai_bekerja" id="tgl_mulai_bekerja" required="required"
                                        value="{{ old('tgl_mulai_bekerja') ? old('tgl_mulai_bekerja') : $id->tgl_mulai_bekerja }}"
                                        type="date" />
                                    @error('tgl_mulai_bekerja')
                                        <div class="invalid-feedback"> {{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            @push('before-script')
                                <script>
                                    $(function() {
                                        let gajipokok = document.getElementById('gajipokok');
                                        gajipokok.addEventListener('keyup', function(e) {
                                            gajipokok.value = babengRupiah(this.value, 'Rp. ');
                                        });
                                        let tunjangankerja = document.getElementById('tunjangankerja');
                                        tunjangankerja.addEventListener('keyup', function(e) {
                                            tunjangankerja.value = babengRupiah(this.value, 'Rp. ');
                                        });
                                    });
                                </script>
                                <script src="{{ asset('/assets/js/babeng.js') }}"></script>
                            @endpush

                            {{-- <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Gaji Pokok<span
                                        class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" name="gajipokok" id="gajipokok" required="required"
                                        value="{{ old('gajipokok') ? old('gajipokok') : Fungsi::rupiahtanpanol($id->gajipokok) }}" />
                                </div>
                            </div> --}}
                            {{-- <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Tunjangan Kerja<span
                                        class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" name="tunjangankerja" id="tunjangankerja"
                                        required="required"
                                        value="{{ old('tunjangankerja') ? old('tunjangankerja') : Fungsi::rupiahtanpanol($id->tunjangankerja) }}" />
                                </div>
                            </div> --}}
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Sim Koperasi<span
                                        class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <select id="heard" class="form-control @error('simkoperasi') is-invalid @enderror"
                                        required name="simkoperasi">
                                        <option selected>{{ $id->simkoperasi }}</option>
                                        <option>Ya</option>
                                        <option>Tidak</option>
                                    </select>
                                    @error('simkoperasi')
                                        <div class="invalid-feedback"> {{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Dansos<span
                                        class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <select id="heard" class="form-control @error('dansos') is-invalid @enderror"
                                        required name="dansos">
                                        <option selected>{{ $id->dansos }}</option>
                                        <option>Ya</option>
                                        <option>Tidak</option>
                                    </select>
                                    @error('dansos')
                                        <div class="invalid-feedback"> {{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <script type="text/javascript">
                                $(document).ready(function() {
                                    console.log('test');
                                    // In your Javascript (external .js resource or <script> tag)
                                    $(document).ready(function() {
                                        $('.js-example-basic-single').select2({
                                            // theme: "classic",
                                            // allowClear: true,
                                            width: "resolve"
                                        });
                                    });
                                });
                            </script>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Jabatan<span
                                        class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <select
                                        class="js-example-basic-single form-control-sm @error('jabatan')
                                        is-invalid
                                    @enderror"
                                        name="jabatan[]" style="width: 100%" multiple="multiple" required>
                                        <option disabled value=""> Pilih Jabatan</option>
                                        @foreach ($items as $item)
                                            @php
                                                $periksa = \App\Models\pegawaidetail::where('pegawai_id', $id->id)
                                                    ->where('jabatan_id', $item->id)
                                                    ->count();
                                            @endphp
                                            <option value="{{ $item->id }}" {{ $periksa > 0 ? 'selected' : '' }}>
                                                {{ $item->nama }}</option>
                                        @endforeach
                                    </select>
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
