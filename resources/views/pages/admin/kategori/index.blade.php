@extends('layouts.gentella')

@section('title')
Kategori
@endsection

@push('before-script')

@if (session('status'))
<x-sweetalertsession tipe="{{session('tipe')}}" status="{{session('status')}}"/>
@endif
@endpush


@section('content')
@push('after-style')
<link href="http://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<!-- Datatables -->
<link href="{{asset('assets/gentella/vendors/')}}/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
<link href="{{asset('assets/gentella/vendors/')}}/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
<link href="{{asset('assets/gentella/vendors/')}}/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
<link href="{{asset('assets/gentella/vendors/')}}/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
<link href="{{asset('assets/gentella/vendors/')}}/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

@endpush

@push('after-script')
    <!-- Datatables -->
    <script src="{{asset('assets/gentella/vendors/')}}/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('assets/gentella/vendors/')}}/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="{{asset('assets/gentella/vendors/')}}/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{asset('assets/gentella/vendors/')}}/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="{{asset('assets/gentella/vendors/')}}/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="{{asset('assets/gentella/vendors/')}}/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="{{asset('assets/gentella/vendors/')}}/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="{{asset('assets/gentella/vendors/')}}/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="{{asset('assets/gentella/vendors/')}}/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="{{asset('assets/gentella/vendors/')}}/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{asset('assets/gentella/vendors/')}}/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="{{asset('assets/gentella/vendors/')}}/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="{{asset('assets/gentella/vendors/')}}/jszip/dist/jszip.min.js"></script>
    <script src="{{asset('assets/gentella/vendors/')}}/pdfmake/build/pdfmake.min.js"></script>
    <script src="{{asset('assets/gentella/vendors/')}}/pdfmake/build/vfs_fonts.js"></script>
@endpush
 <!-- page content -->
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>@yield('title')
        </h3>
        </div>
      </div>

      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 col-sm-12 ">
          <div class="x_panel">
            <div class="x_title">
              <a class="btn btn-sm btn-primary" href="{{route('kategori.create')}}"> Tambah </a>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                      <div class="card-box table-responsive">
              {{-- <p class="text-muted font-13 m-b-30">
                DataTables has most features enabled by default, so all you need to do to use it with your own tables is to call the construction function: <code>$().DataTable();</code>
              </p> --}}
              <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                  <tr>
                    <th class="babeng-min-row">No</th>
                    <th>Nama</th>
                    <th>Prefix</th>
                    <th class="text-center">Aksi</th>
                  </tr>
                </thead>


                <tbody>
                    @forelse ($datas as $data)
                  <tr>
                    <td class="text-center">{{$loop->index+1}}</td>
                    <td>{{$data->nama}}</td>
                    @php
                        $prefix='Surat Masuk';
                        if($data->prefix==='suratkeluar'){
                            $prefix='Surat Keluar';
                        }
                    @endphp
                    <td>{{$prefix}}</td>
                    <td class="babeng-min-row">
<x-button-edit link="{{route('kategori.edit',$data->id)}}" />
<x-button-delete link="{{route('kategori.destroy',$data->id)}}" />
                    </td>
                  </tr>
                    @empty

                    @endforelse
                </tbody>
              </table>
            </div>
            </div>
        </div>
      </div>
          </div>
        </div>




            </div>
          </div>
        </div>
      </div>
          </div>
        </div>
      </div>
    </div>
  <!-- /page content -->
@endsection
