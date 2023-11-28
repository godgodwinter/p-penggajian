<x-cetak-css></x-cetak-css>

<body>
    <x-cetak-kop></x-cetak-kop>

    <div style="margin-bottom: 0;text-align:center" id="judul">
        <h2>RINCIAN HR PEGAWAI BULAN : {{ strtoupper(Fungsi::bulanindo($month)) }} {{ $year }}</h2>
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
                    {{ $data->pegawai ? $data->pegawai->nama : '-' }}
                </td>
                <td>
                    @if ($data->pegawai)
                        @forelse ($data->pegawai->pegawaidetail as $item)
                            {{ $item->jabatan ? $item->jabatan->nama : '' }}
                        @empty
                        @endforelse
                    @endif
                </td>
                <td align="center">{{ Fungsi::rupiah($data->gajipokok) }}</td>
                <td align="center">{{ Fungsi::rupiah($data->tunjangankerja) }}</td>
                <td align="center">{{ Fungsi::rupiah($data->transport * $data->hadir) }}</td>
                <td align="center">{{ $data->hadir }}</td>
                @php
                    $jumlah = 0;
                    $jumlah = $data->gajipokok + $data->tunjangankerja + $data->transport * $data->hadir;
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
            <td colspan="7">
                Total
            </td>
            <td colspan="3">
                {{ Fungsi::rupiah($total) }}
            </td>
        </tr>
    </table>


    <br>
    <br>
    <table width="100%" class="table table-light" id="tablettd">
        <tr>
            <th width="80%">
                <!-- Content for the first column -->
            </th>
            <th width="20%" align="center">
                <center>
                    MENGETAHUI <br>
                    KEPALA SEKOLAH SMP
                    <br><br><br>
                    <br>
                    <br>
                    <br>

                    LENI AMALIA.SE
                </center>
            </th>
            <th width="3%"></th>
        </tr>
        <!-- Add more rows and content as needed -->
    </table>

</body>

</html>
