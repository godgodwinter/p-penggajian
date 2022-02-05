<x-cetak-css></x-cetak-css>
<body>
<x-cetak-kop></x-cetak-kop>

    <div style="margin-bottom: 0;text-align:center" id="judul">
        <h2>RINCIAN HR  BULAN  {{strtoupper(Fungsi::bulanindo($month))}} {{$year}}</h2>
        <p for=""></p>
    </div>

    <div id="judul2">
        <h4></h4>
    </div>

    {{-- <center><h2>@yield('title')</h2></center> --}}


    <br>
    <table width="99%" border="0" style="margin-left:200px;padding:10px">
        <tr>
            <td width="300px">NAMA</td>
            <td width="10px">:</td>
            <td>{{$datas->guru?$datas->guru->nama:'Data tidak ditemukan'}}</td>
        </tr>

        <tr>
            <td width="100px">JAM/MINGGU</td>
            <td width="10px">:</td>
            <td>{{$datas->jam}}</td>
        </tr>
        <tr>
            <td width="100px">HADIR 1 BULAN</td>
            <td width="10px">:</td>
            <td>{{$datas->hadir}}</td>
        </tr>

        <tr>
            <td width="100px">TUNJANGAN JABATAN</td>
            <td width="10px">:</td>
            <td>{{Fungsi::rupiah($datas->tunjanganjabatan)}}</td>
        </tr>

        <tr>
            <td width="100px">TUNJANGAN MASA KERJA</td>
            <td width="10px">:</td>
            <td>{{Fungsi::rupiah($datas->tunjangankerja)}}</td>
        </tr>

        <tr>
            <td width="100px">TUNJANGAN WALIKELAS</td>
            <td width="10px">:</td>
            <td>{{$datas->walikelas!=0?Fungsi::rupiah($datas->walikelas):'-'}}</td>
        </tr>
        <tr>
            <td width="100px">GAJI POKOK  (JAM/MINGGU * {{Fungsi::rupiah($datas->gajipokok)}})</td>
            <td width="10px">:</td>
            <td>{{Fungsi::rupiah($datas->gajipokok*$datas->jam)}}</td>
        </tr>


        <tr>
            <td width="100px">TRANSPORT (HADIR * {{Fungsi::rupiah($datas->transport)}})</td>
            <td width="10px">:</td>
            <td>{{Fungsi::rupiah($datas->transport*$datas->hadir)}}</td>
        </tr>



        @php
        $jumlah=0;
        $jumlah=$datas->tunjanganjabatan+$datas->walikelas+$datas->tunjangankerja+($datas->gajipokok*$datas->jam)+($datas->transport*$datas->hadir);
    @endphp

        <tr>
            <td width="100px">JUMLAH</td>
            <td width="10px">:</td>
            <td>{{Fungsi::rupiah($jumlah)}}</td>
        </tr>

        <tr>
            <td width="100px">KOPERASI ({{Fungsi::rupiah($datas->simkoperasi)}})</td>
            <td width="10px">:</td>
            <td>
                @php
                $hasilakhir=$jumlah;
                $hasil='-';
                $sim=$jumlah;
                    if($datas->simkoperasi>0){
            $sim=$jumlah-$datas->simkoperasi;
                        $hasil=Fungsi::rupiah($sim);
                $hasilakhir=$hasil;
                    }
                @endphp
                {{$hasil}}
            </td>
        </tr>

        <tr>
            <td width="100px">DANSOS ({{Fungsi::rupiah($datas->dansos)}})</td>
            <td width="10px">:</td>
            <td>
                @php
                $hasil='-';
                    if($datas->dansos>0){
                        $hasil=Fungsi::rupiah($sim-$datas->dansos);
                $hasilakhir=$hasil;
                    }
                @endphp
                {{$hasil}}
            </td>
        </tr>
        <tr>
            <td width="100px"><strong>DITERIMA</strong></td>
            <td width="10px"><strong>:</strong></td>
            <td><strong>{{$hasilakhir}}</strong></td>
        </tr>
    </table>



</body>

</html>
