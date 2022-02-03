<x-cetak-css></x-cetak-css>
<body>
<x-cetak-kop></x-cetak-kop>

    <div style="margin-bottom: 0;text-align:center" id="judul">
        <h2>RINCIAN HR PEGAWAI BULAN : {{strtoupper(Fungsi::bulanindo($month))}} {{$year}}</h2>
        <p for=""></p>
    </div>

    <div id="judul2">
        <h4></h4>
    </div>

    {{-- <center><h2>@yield('title')</h2></center> --}}


    <br>
    <table width="99%" id="tableBiasa">
        <tr>
            <th>
                NO
            </th>
            <th>
                NAMA
            </th>
            <th>
                JABATAN
            </th>
            <th>
                GAJI POKOK
            </th>
            <th>
                TUNJANGAN KERJA
            </th>
            <th>
                TRANSPORT
            </th>
            <th>
                HADIR
            </th>
            <th>
                JUMLAH
            </th>
            <th>
                SIM KOPERASI
            </th>
            <th>
                DANSOS
            </th>
        </tr>
        @forelse ($datas as $data)
        <tr>
        <td>
            {{$loop->index+1}}
        </td>
        <td>
            {{$data->pegawai?$data->pegawai->nama:'-'}}
        </td>
        <td>
            @if ($data->pegawai)
                @forelse ($data->pegawai->pegawaidetail as $item)
                  {{$item->jabatan?$item->jabatan->nama:''}}
                @empty

                @endforelse
            @endif
        </td>
        <td align="center">{{Fungsi::rupiah($data->gajipokok)}}</td>
        <td align="center">{{Fungsi::rupiah($data->tunjangankerja)}}</td>
        <td  align="center">{{Fungsi::rupiah($data->transport)}}</td>
        <td  align="center">{{$data->hadir}}</td>
        @php
            $jumlah=0;
            $jumlah=$data->gajipokok+$data->tunjangankerja+$data->transport;
        @endphp
        <td>{{Fungsi::rupiah($jumlah)}}</td>
        <td align="center">
            @php
            $hasil='-';
                if($data->simkoperasi>0){
                    $hasil=Fungsi::rupiah($jumlah-$data->simkoperasi);
                }
            @endphp
            {{$hasil}}
        </td>
        <td align="center">
            @php
            $hasil='-';
                if($data->dansos>0){
                    $hasil=Fungsi::rupiah($jumlah-$data->dansos);
                }
            @endphp
            {{$hasil}}
        </td>
        </tr>

        @empty

        @endforelse

    </table>



</body>

</html>
