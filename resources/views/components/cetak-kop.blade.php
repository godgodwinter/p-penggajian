    <table width="100%" id="tableKop">
        <tr>
            @php
            $datalogo='assets/upload/logotutwuri.png';
            if(Fungsi::lembaga_logo()!=null){
                $datalogo='storage/logo/1.jpg';
            }
                $logo=$datalogo;
                // dd($logo);
            @endphp
            <td width="13%" align="right" style="padding-bottom:15px"><img src="{{$datalogo}}" width="70" height="70"></td>
            <td width="80%" align="center">
                <p><b>
                        <font size="20px"> {{Fungsi::lembaga_nama()}}
                            <br>{{Fungsi::lembaga_jalan()}} </font>
                    </br><br>
                    {{-- <font size="12px">Sekretariat Letjen Sutoyo V. 48 Tlp. (0341) 414636 Malang - Jawa Timur <br> email: ypmt.28mlg@gmail.com / AHU-0004889.AH.01.12.Tahun 2020</font> --}}
            </td>
        </tr>
    </table>
