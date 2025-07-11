<x-cetak-css></x-cetak-css>
<style>
    .page-break {
        page-break-after: always;
    }

    #tablettd,
    table#tablettd,
    table#tablettd tr,
    table#tablettd thead,
    table#tablettd th {
        border: 0px solid white;
        border-collapse: collapse;
        margin: 1px;
        height: 1px;
    }

    #tablettd tr td {
        border: 0px solid white;
        border-collapse: collapse;
        margin: 1px;
    }
</style>

<body>
    @foreach ($datasCetak as $datas)
        <x-cetak-kop></x-cetak-kop>

        <div style="margin-bottom: 0;text-align:center" id="judul">
            <h2>RINCIAN HR BULAN {{ strtoupper(Fungsi::bulanindo($month)) }} {{ $year }}</h2>
            <p for=""></p>
        </div>

        <div id="judul2">
            <h4></h4>
        </div>

        {{-- <center><h2>@yield('title')</h2></center> --}}


        <br>
        <table width="99%" border="0" style="margin-left:200px;padding:10px">
            <tr>
                <td width="200px">NAMA</td>
                <td width="10px">:</td>
                <td>{{ $datas->pegawai ? $datas->pegawai->nama : 'Data tidak ditemukan' }}</td>
            </tr>

            <tr>
                <td width="100px">GAJI POKOK </td>
                <td width="10px">:</td>
                <td>{{ Fungsi::rupiah($datas->gajipokok) }}</td>
            </tr>

            <tr>
                <td width="100px">TUNJANGAN MASA KERJA</td>
                <td width="10px">:</td>
                <td>{{ Fungsi::rupiah($datas->tunjangankerja) }}</td>
            </tr>

            <tr>
                <td width="100px">TRANSPORT (HADIR * {{ Fungsi::rupiah($datas->transport) }})</td>
                <td width="10px">:</td>
                <td>{{ Fungsi::rupiah($datas->transport * $datas->hadir) }}</td>
            </tr>


            <tr>
                <td width="100px">HADIR 1 BULAN</td>
                <td width="10px">:</td>
                <td>{{ $datas->hadir }}</td>
            </tr>

            @php
                $jumlah = 0;
                $jumlah = $datas->gajipokok + $datas->tunjangankerja + $datas->transport * $datas->hadir;
            @endphp
            {{-- <tr>
            <td width="100px">TUNJANGAN JABATAN</td>
            <td width="10px">:</td>
            <td>{{$datas->pegawai?$datas->pegawai->nama:'Data tidak ditemukan'}}</td>
        </tr> --}}



            <tr>
                <td width="100px">JUMLAH</td>
                <td width="10px">:</td>
                <td>{{ Fungsi::rupiah($jumlah) }}</td>
            </tr>


            <tr>
                <td width="100px" style="color: black; width: 40px;">KOPERASI
                    {{-- : {{ Fungsi::rupiah($datas->simkoperasi) }} --}}
                </td>
                <td width="10px">:</td>
                <td>
                    <span style="">
                        <span style="border-bottom: 0px solid black; color: black; width: 40px;margin-top: 10px;">
                            - {{ Fungsi::rupiah($datas->simkoperasi) }}
                        </span>
                </td>
            </tr>
            <tr>
                <td width="100px">
                    {{-- KOPERASI --}}
                    {{-- : {{ Fungsi::rupiah($datas->simkoperasi) }} --}}
                </td>
                <td width="10px">:</td>
                <td>
                    @php
                        $hasilakhir = $jumlah;
                        $hasil = '-';
                        $sim = $jumlah;
                        if ($datas->simkoperasi > 0) {
                            $sim = $jumlah - $datas->simkoperasi;
                            $hasil = Fungsi::rupiah($sim);
                            $hasilakhir = $hasil;
                        }
                    @endphp
                    {{ $hasil }}
                </td>
            </tr>
            <tr>
                <td width="100px" style="color: black; width: 40px;">DANSOS
                    {{-- : {{ Fungsi::rupiah($datas->simkoperasi) }} --}}
                </td>
                <td width="10px">:</td>
                <td>
                    <span style="">
                        <span style="border-bottom: 0px solid black; color: black; width: 40px;margin-top: 10px;">
                            - {{ Fungsi::rupiah($datas->dansos) }}
                        </span>
                </td>
            </tr>
            <tr>
                <td width="100px">
                    {{-- DANSOS : {{ Fungsi::rupiah($datas->dansos) }} --}}
                </td>
                <td width="10px">:</td>
                <td>
                    @php
                        $hasil = '-';
                        if ($datas->dansos > 0) {
                            $hasil = Fungsi::rupiah($sim - $datas->dansos);
                            $hasilakhir = $hasil;
                        }
                    @endphp
                    {{ $hasil }}
                </td>
            </tr>
            <tr>
                <td width="100px"><strong>DITERIMA</strong></td>
                <td width="10px"><strong>:</strong></td>
                <td><strong>{{ Fungsi::rupiah($hasilakhir) }}</strong></td>
            </tr>
        </table>

        <table width="80%" class="table table-light" id="tablettd">
            <tr>
                <th width="60%">
                    <!-- Content for the first column -->
                </th>
                <th width="20%" align="center">
                    <center>
                        MENGETAHUI <br>
                        KEPALA SEKOLAH SMP
                        <br>
                        <img src="{{ public_path('assets/img_ks_1_no_bg.png') }}" alt="Tanda Tangan" height="150">
                        LENI AMALIA S.E.,M.M.
                    </center>
                </th>
                <th width="3%"></th>
            </tr>
            <!-- Add more rows and content as needed -->
        </table>

        @if (!$loop->last)
            <div class="page-break"></div>
        @endif
    @endforeach

</body>

</html>
