<x-cetak-css></x-cetak-css>

<body>
    <x-cetak-kop></x-cetak-kop>

    <div style="margin-bottom: 0;text-align:center" id="judul">
        <h2>RINCIAN HR GURU BULAN : {{ strtoupper(Fungsi::bulanindo($month)) }} {{ $year }}</h2>
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
                TUNJANGAN JABATAN
            </th>
            <th>
                WALIKELAS
            </th>
            <th>
                TUNJANGAN KERJA
            </th>
            <th>
                JAM MENGAJAR
            </th>
            <th>
                GAJI POKOK
            </th>
            <th>
                HADIR
            </th>
            <th>
                TRANSPORT
            </th>
            <th>
                JUMLAH DITERIMA
            </th>
            <th>
                SIM KOPERASI
            </th>
            <th>
                DANSOS
            </th>
        </tr>
        @php
            $total = 0;
        @endphp
        @forelse ($datas as $data)
            <tr>
                <td align="center">
                    {{ $loop->index + 1 }}
                </td>
                <td>
                    {{ $data->guru ? $data->guru->nama : '-' }}
                </td>
                <td>
                    @if ($data->guru)
                        @forelse ($data->guru->gurudetail as $item)
                            {{ $item->jabatan ? $item->jabatan->nama : '' }}
                        @empty
                        @endforelse
                    @endif
                </td>
                <td align="center">{{ Fungsi::rupiah($data->tunjanganjabatan) }}</td>
                <td align="center">{{ $data->walikelas != 0 ? Fungsi::rupiah($data->walikelas) : '-' }}</td>
                <td align="center">{{ Fungsi::rupiah($data->tunjangankerja) }}</td>
                <td align="center">{{ $data->jam }}</td>
                <td align="center">{{ Fungsi::rupiah($data->gajipokok * $data->jam) }}</td>
                <td align="center">{{ $data->hadir }}</td>
                <td align="center">{{ Fungsi::rupiah($data->transport * $data->hadir) }}</td>
                @php
                    $jumlah = 0;
                    $jumlah =
                        $data->tunjanganjabatan +
                        $data->walikelas +
                        $data->tunjangankerja +
                        $data->gajipokok * $data->jam +
                        $data->transport * $data->hadir;
                    $total += $jumlah;
                @endphp
                <td>{{ Fungsi::rupiah($jumlah) }}</td>
                <td align="center">
                    @php
                        $hasil = '-';
                        $sim = $jumlah;
                        if ($data->simkoperasi > 0) {
                            $sim = $jumlah - $data->simkoperasi;
                            $hasil = Fungsi::rupiah($sim);
                        }
                    @endphp
                    {{ $hasil }}
                </td>
                <td align="center">
                    @php
                        $hasil = '-';
                        if ($data->dansos > 0) {
                            $hasil = Fungsi::rupiah($sim - $data->dansos);
                        }
                    @endphp
                    {{ $hasil }}
                </td>
            </tr>

        @empty

        @endforelse
        <tr>
            <td colspan="10">
                Total
            </td>
            <td colspan="3">
                {{ Fungsi::rupiah($total) }}
            </td>
        </tr>

    </table>

    <br>
    <br>
    {{--
    <table width="100%" class="table table-light" id="tablettd">
        <tr>
            <th width="60%">
            </th>
            <th width="30%" align="center">
                <center>
                    MENGETAHUI <br>
                    KEPALA SEKOLAH SMP
                    <img src="{{ public_path('assets/img_ks_1_no_bg.png') }}" alt="Tanda Tangan" height="150">
                </center>
            </th>
            <th width="3%"></th>
        </tr>
        <tr>
            <th width="60%">
            </th>
            <th width="30%" align="center">
                LENI AMALIA S.E.,M.M.
            </th>
        </tr>
    </table> --}}
    <table width="100%" class="table table-light" id="tablettd">
        <tr>
            <td width="70%"></td>
            <td width="30%" align="center">
                <div style="text-align: center;">
                    <strong> MENGETAHUI <br>
                        KEPALA SEKOLAH SMP
                    </strong>
                    <img src="{{ public_path('assets/img_ks_1_no_bg.png') }}" alt="Tanda Tangan" height="150">
                </div>
            </td>
            <td width="10%"></td>
        </tr>
        <tr>
            <td width="60%"></td>
            <td width="30%" align="center">
                <strong>LENI AMALIA S.E., M.M.</strong>
            </td>
            <td width="10%"></td>
        </tr>
    </table>



</body>

</html>
