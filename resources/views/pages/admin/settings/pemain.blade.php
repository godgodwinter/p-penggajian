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

                    <form action="{{route('pemain.profileupdate')}}" method="post" enctype="multipart/form-data">
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
                            <label for="angkatan">Angkatan <code>*)</code></label>
                            <input type="text" name="angkatan" id="angkatan" class="form-control @error('angkatan') is-invalid @enderror" value="{{$data->angkatan}}" readonly>
                            @error('angkatan')<div class="invalid-feedback"> {{$message}}</div>
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
                            <label for="alamat">Alamat<code>*)</code></label>
                            <input type="text" name="alamat" id="alamat" class="form-control @error('alamat') is-invalid @enderror" value="{{old('alamat')?old('alamat'):$data->alamat}}" required>
                            @error('alamat')<div class="invalid-feedback"> {{$message}}</div>
                            @enderror
                        </div>


                        <div class="form-group col-md-5 col-5 mt-0 ml-5">
                            <label for="tgllahir">Tanggal Lahir<code>*)</code></label>
                            @php
                                if($data->tgllahir)
                                    $tgl=$data->tgllahir;
                                else
                                    $tgl=date('Y-m-d');
                            @endphp
                            <input type="date" name="tgllahir" id="tgllahir" class="form-control @error('tgllahir') is-invalid @enderror" value="{{old('tgllahir')?old('tgllahir') : $tgl}}" required>
                            @error('tgllahir')<div class="invalid-feedback"> {{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group col-md-5 col-5 mt-0 ml-5">
                            <label for="jk">Pilih Jenis Kelamin <code></code></label>

                            <select class="form-control  @error('jk') is-invalid @enderror" name="jk" required>
                                @if(old('jk'))
                                <option>{{old('jk')}}</option>
                            @else
                                @if($data->jk)
                                <option>{{$data->jk}}</option>
                                @endif
                            @endif
                                <option>Laki-laki</option>
                                <option>Perempuan</option>
                            </select>
                            @error('jk')<div class="invalid-feedback"> {{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group col-md-5 col-5 mt-0 ml-5">
                            <label for="telp">No WA <code>*)</code></label>
                            <input type="text" class="form-control  @error('telp') is-invalid @enderror" name="telp" required value="{{$data->telp}}">

                            @error('telp')<div class="invalid-feedback"> {{$message}}</div>
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


                        @push('after-script')
                        <script type="text/javascript">
                            $(document).ready(function() {
                              $.uploadPreview({
                                input_field: "#image-upload",   // Default: .image-upload
                                preview_box: "#image-preview",  // Default: .image-preview
                                label_field: "#image-label",    // Default: .image-label
                                label_default: "Logo Sekolah",   // Default: Choose File
                                label_selected: "Ganti Logo Sekolah",  // Default: Change File
                                no_label: false                 // Default: false
                              });



                            });
                            </script>
                        @endpush

                        </div>
                        <div class="row">
                        <div class="form-group col-md-5 col-5 mt-0 ml-5">
                          <div id="image-preview" class="image-preview">
                            <label for="image-upload" id="image-label2">UPLOAD FOTO</label>
                            <input type="file" name="files" id="image-upload" class="@error('files')
                            is_invalid
                        @enderror"  accept="image/png, image/gif, image/jpeg" />

                        @error('files')<div class="invalid-feedback"> {{$message}}</div>
                        @enderror
                          </div>
                        </div>


                        <div class="form-group col-md-5 col-5 mt-0 ml-5">
                            @php
                            $gambar=$data->photo;
                            $randomimg='https://ui-avatars.com/api/?name='.$data->nama.'&color=7F9CF5&background=EBF4FF';
                            @endphp
                            @if($data->photo!=null AND $data->photo!=url('storage') AND $data->photo!='')
                            <img alt="image" src="{{$gambar}}" class="img-thumbnail" data-toggle="tooltip" title="{{$data->nama}}" width="200px" height="200px" style="object-fit:cover;">
                            @else
                            <img alt="image" src="{{$randomimg}}" class="img-thumbnail" data-toggle="tooltip" title="{{$data->nama}}" width="200px" height="200px" style="object-fit:cover;">

                            @endif
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
