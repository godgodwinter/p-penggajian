<?php

namespace App\Http\Controllers;

use App\Helpers\Fungsi;
use App\Models\gajipegawai;
use App\Models\jabatan;
use App\Models\pegawai;
use App\Models\pegawaidetail;
use App\Models\settingsgaji;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class admingajipegawaicontroller extends Controller
{
    public function index(Request $request)
    {
        #WAJIB
        $pages = 'pegawai';
        $month = date("m");
        $year = date("Y");
        $cari = $request->cari;
        if ($cari) {
            $month = date("m", strtotime($cari));
            $year = date("Y", strtotime($cari));
        }
        $datas = gajipegawai::whereMonth('tahunbulan', $month)->whereYear('tahunbulan', $year)->get();

        $getsettingsgaji = settingsgaji::first();
        return view('pages.admin.gajipegawai.index', compact('datas', 'request', 'pages', 'cari', 'getsettingsgaji'));
    }
    public function generate(Request $request)
    {
        // dd($request);
        $month = date("m");
        $year = date("Y");
        $cari = $request->cari;
        if ($cari) {
            $month = date("m", strtotime($cari));
            $year = date("Y", strtotime($cari));
        }
        // dd($month);

        // 1.get data from settingsgaji
        $getsettingsgaji = settingsgaji::first();
        // 2.get data from pegawai where id
        $getpegawai = pegawai::get();
        foreach ($getpegawai as $pegawai) {
            $periksa = gajipegawai::where('pegawai_id', $pegawai->id)
                ->whereMonth('tahunbulan', $month)
                ->whereYear('tahunbulan', $year)
                ->count();
            // dd($periksa,date('m'),date('Y'),$pegawai->id);
            if ($periksa < 1) {
                if ($pegawai->simkoperasi == 'Ya') {
                    $simkoperasi = $getsettingsgaji->simkoperasi;
                } else {
                    $simkoperasi = 0;
                }
                if ($pegawai->dansos == 'Ya') {
                    $dansos = $getsettingsgaji->dansos;
                } else {
                    $dansos = 0;
                }
                if (($pegawai->hadir) > 0) {
                    $hadir = $pegawai->hadir;
                    $transport = $pegawai->hadir * $getsettingsgaji->transport;
                } else {
                    $hadir = 0;
                    $transport = 0;
                }


                $transport = $getsettingsgaji->transport;
                //insert gajipegawai
                gajipegawai::insert([
                    'pegawai_id' => $pegawai->id,
                    'tahunbulan' => $year . '-' . $month . '-01',
                    'gajipokok' => $pegawai->gajipokok,
                    'tunjangankerja' => $pegawai->tunjangankerja,
                    'hadir' => $hadir,
                    'status' => 'belum',
                    'transport' => $transport,
                    'simkoperasi' => $simkoperasi,
                    'dansos' => $dansos,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ]);
            }
        }

        // dd($getsettingsgaji,$getpegawai);

        // $id=DB::table('pegawai')->insertGetId(
        //     array(
        //            'nama'     =>   $request->nama,
        //            'jk'     =>   $request->jk,
        //            'alamat'     =>   $request->alamat,
        //            'nomerinduk'     =>   $request->nomerinduk,
        //            'simkoperasi'     =>   $request->simkoperasi,
        //            'telp'     =>   $request->telp,
        //            'dansos'     =>   $request->dansos,
        //            'gajipokok'     =>   Fungsi::angka($request->gajipokok),
        //            'tunjangankerja'     =>   Fungsi::angka($request->tunjangankerja),
        //            'created_at'=>date("Y-m-d H:i:s"),
        //            'updated_at'=>date("Y-m-d H:i:s")
        //     ));


        return redirect()->back()->with('status', 'Proses generate gaji berhasil!')->with('tipe', 'success')->with('icon', 'fas fa-feather');
    }


    public function cetak(Request $request)
    {
        $month = date("m");
        $year = date("Y");
        $cari = $request->cari;
        if ($cari) {
            $month = date("m", strtotime($cari));
            $year = date("Y", strtotime($cari));
        }
        $datas = gajipegawai::whereMonth('tahunbulan', $month)->whereYear('tahunbulan', $year)->get();

        $getsettingsgaji = settingsgaji::first();
        $tgl = date("YmdHis");
        $pdf = PDF::loadview('pages.admin.gajipegawai.cetak', compact('datas', 'getsettingsgaji', 'tgl', 'year', 'month'))->setPaper('a4', 'landscape');
        return $pdf->stream('hrpegawai' . $tgl . '-pdf');
    }

    public function cetakperid_all(Request $request, $cari = null)
    {
        $tgl = date("YmdHis");
        $month = date("m");
        $year = date("Y");

        if ($cari) {
            // Jika $cari ada, gunakan nilainya untuk mengambil bulan dan tahun
            $month = date("m", strtotime($cari));
            $year = date("Y", strtotime($cari));
        }

        // Ambil data gaji guru untuk bulan dan tahun tertentu
        $datasCetak = gajipegawai::with('pegawai')
            ->whereMonth('tahunbulan', $month)
            ->whereYear('tahunbulan', $year)
            ->get();

        $getsettingsgaji = settingsgaji::first();
        // dd($datasCetak);
        // Kode untuk mencetak PDF dengan data yang telah diambil
        $pdf = PDF::loadview('pages.admin.gajipegawai.cetakperid_all', compact('datasCetak', 'getsettingsgaji', 'tgl', 'year', 'month'))->setPaper('a4', 'landscape');

        return $pdf->stream('hrguru_all' . $tgl . '.pdf');
    }
    public function cetakperid(gajipegawai $id, Request $request, $cari = null)
    {
        $tgl = date("YmdHis");
        $month = date("m");
        $year = date("Y");

        if ($cari) {
            // Jika $cari ada, gunakan nilainya untuk mengambil bulan dan tahun
            $month = date("m", strtotime($cari));
            $year = date("Y", strtotime($cari));
        }
        $datas = gajipegawai::with('pegawai')
            ->where('id', $id->id)
            // whereMonth('tahunbulan',$month)->whereYear('tahunbulan',$year)
            ->whereMonth('tahunbulan', $month)
            ->whereYear('tahunbulan', $year)
            ->first();
        // dd($datas);
        $getsettingsgaji = settingsgaji::first();
        $tgl = date("YmdHis");
        $pdf = PDF::loadview('pages.admin.gajipegawai.cetakperid', compact('datas', 'getsettingsgaji', 'tgl', 'year', 'month'))->setPaper('a4', 'landscape');
        return $pdf->stream('hrpegawai' . $tgl . '-pdf');
    }
    // public function cetakperid(gajipegawai $id, Request $request)
    // {
    //     $month = date("m");
    //     $year = date("Y");
    //     $cari = $request->cari;
    //     if ($cari) {
    //         $month = date("m", strtotime($cari));
    //         $year = date("Y", strtotime($cari));
    //     }
    //     $datas = gajipegawai::with('pegawai')
    //         ->where('id', $id->id)
    //         // whereMonth('tahunbulan',$month)->whereYear('tahunbulan',$year)
    //         ->first();
    //     // dd($datas);
    //     $getsettingsgaji = settingsgaji::first();
    //     $tgl = date("YmdHis");
    //     $pdf = PDF::loadview('pages.admin.gajipegawai.cetakperid', compact('datas', 'getsettingsgaji', 'tgl', 'year', 'month'))->setPaper('a4', 'landscape');
    //     return $pdf->stream('hrpegawai' . $tgl . '-pdf');
    // }
    public function cari(Request $request)
    {
        $cari = $request->cari;
        #WAJIB
        $pages = 'pegawai';
        $datas = pegawai::where('nama', 'like', "%" . $cari . "%")
            ->paginate(Fungsi::paginationjml());

        return view('pages.admin.pegawai.index', compact('datas', 'request', 'pages'));
    }
    public function create()
    {
        $pages = 'pegawai';
        $items = jabatan::get();
        return view('pages.admin.pegawai.create', compact('pages', 'items'));
    }

    public function store(Request $request)
    {
        // dd($request,$request->jabatan[0]);
        $request->validate(
            [
                'nama' => 'required',

            ],
            [
                'nama.require' => 'Nama harus diisi',
            ]
        );

        $id = DB::table('pegawai')->insertGetId(
            array(
                'nama'     =>   $request->nama,
                'jk'     =>   $request->jk,
                'alamat'     =>   $request->alamat,
                'nomerinduk'     =>   $request->nomerinduk,
                'simkoperasi'     =>   $request->simkoperasi,
                'telp'     =>   $request->telp,
                'dansos'     =>   $request->dansos,
                'gajipokok'     =>   Fungsi::angka($request->gajipokok),
                'tunjangankerja'     =>   Fungsi::angka($request->tunjangankerja),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            )
        );

        for ($i = 0; $i < count($request->jabatan); $i++) {
            DB::table('pegawaidetail')->insert(
                array(
                    'pegawai_id'     =>   $id,
                    'jabatan_id'     =>   $request->jabatan[$i],
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s")
                )
            );
        }

        return redirect()->route('pegawai')->with('status', 'Data berhasil tambahkan!')->with('tipe', 'success')->with('icon', 'fas fa-feather');
    }

    public function edit(gajipegawai $id)
    {
        $pages = 'gajipegawai';
        $items = jabatan::get();

        return view('pages.admin.gajipegawai.edit', compact('pages', 'id', 'items'));
    }
    public function update(gajipegawai $id, Request $request)
    {

        // dd($request);
        $request->validate(
            [
                'nama' => 'required',
            ],
            [
                'nama.required' => 'name harus diisi',
            ]
        );

        $simkoperasi = 0;
        $dansos = 0;
        $getsettingsgaji = settingsgaji::first();
        if ($request->simkoperasi == 'Ya') {
            $simkoperasi = $getsettingsgaji->simkoperasi;
        }
        if ($request->dansos == 'Ya') {
            $dansos = $getsettingsgaji->dansos;
        }

        gajipegawai::where('id', $id->id)
            ->update([
                'hadir'     =>   Fungsi::angka($request->hadir),
                'simkoperasi'     =>   $simkoperasi,
                'dansos'     =>   $dansos,
                'gajipokok'     =>   Fungsi::angka($request->gajipokok),
                'tunjangankerja'     =>   Fungsi::angka($request->tunjangankerja),
                'updated_at' => date("Y-m-d H:i:s")
            ]);




        return redirect()->route('gajipegawai')->with('status', 'Data berhasil diubah!')->with('tipe', 'success')->with('icon', 'fas fa-feather');
    }
    public function destroy(gajipegawai $id)
    {

        gajipegawai::destroy($id->id);
        return redirect()->back()->with('status', 'Data berhasil dihapus!')->with('tipe', 'warning')->with('icon', 'fas fa-feather');
    }
}
