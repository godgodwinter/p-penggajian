<?php

namespace App\Http\Controllers;

use App\Helpers\Fungsi;
use App\Models\gajiguru;
use App\Models\guru;
use App\Models\jabatan;
use App\Models\settingsgaji;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class admingajigurucontroller extends Controller
{
    public function index(Request $request)
    {
        #WAJIB
        $pages = 'guru';
        $month = date("m");
        $year = date("Y");
        $cari = $request->cari;
        if ($cari) {
            $month = date("m", strtotime($cari));
            $year = date("Y", strtotime($cari));
        }
        $datas = gajiguru::whereMonth('tahunbulan', $month)->whereYear('tahunbulan', $year)->get();

        $getsettingsgaji = settingsgaji::first();
        return view('pages.admin.gajiguru.index', compact('datas', 'request', 'pages', 'cari', 'getsettingsgaji'));
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
        // 2.get data from guru where id
        $getguru = guru::get();
        foreach ($getguru as $guru) {
            $periksa = gajiguru::where('guru_id', $guru->id)
                ->whereMonth('tahunbulan', $month)
                ->whereYear('tahunbulan', $year)
                ->count();
            // dd($periksa,date('m'),date('Y'),$guru->id);
            if ($periksa < 1) {
                if ($guru->simkoperasi == 'Ya') {
                    $simkoperasi = $getsettingsgaji->simkoperasi;
                } else {
                    $simkoperasi = 0;
                }
                if ($guru->dansos == 'Ya') {
                    $dansos = $getsettingsgaji->dansos;
                } else {
                    $dansos = 0;
                }
                if (($guru->hadir) > 0) {
                    $hadir = $guru->hadir;
                    $transport = $guru->hadir * $getsettingsgaji->transport;
                } else {
                    $hadir = 0;
                    $transport = 0;
                }

                if (($guru->jam) > 0) {
                    $jam = $guru->jam;
                    $gajipokok = $getsettingsgaji->gajipokok;
                } else {
                    $jam = 0;
                    $gajipokok = 0;
                }

                if ($guru->walikelas == 'Ya') {
                    $walikelas = $getsettingsgaji->walikelas;
                } else {
                    $walikelas = 0;
                }

                $transport = $getsettingsgaji->transport;
                //insert gajiguru
                gajiguru::insert([
                    'guru_id' => $guru->id,
                    'tahunbulan' => $year . '-' . $month . '-01',
                    'tunjanganjabatan' => $guru->tunjanganjabatan,
                    'tunjangankerja' => $guru->tunjangankerja,
                    'hadir' => $hadir,
                    'status' => 'belum',
                    'jam' => $jam,
                    'gajipokok' => $gajipokok,
                    'walikelas' => $walikelas,
                    'transport' => $transport,
                    'simkoperasi' => $simkoperasi,
                    'dansos' => $dansos,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ]);
            }
        }

        // dd($getsettingsgaji,$getguru);

        // $id=DB::table('guru')->insertGetId(
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
        $datas = gajiguru::whereMonth('tahunbulan', $month)->whereYear('tahunbulan', $year)->get();

        $getsettingsgaji = settingsgaji::first();
        $tgl = date("YmdHis");
        $pdf = PDF::loadview('pages.admin.gajiguru.cetak', compact('datas', 'getsettingsgaji', 'tgl', 'year', 'month'))->setPaper('a4', 'landscape');
        return $pdf->stream('hrguru' . $tgl . '-pdf');
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
        $datasCetak = gajiguru::with('guru')
            ->whereMonth('tahunbulan', $month)
            ->whereYear('tahunbulan', $year)
            ->get();

        $getsettingsgaji = settingsgaji::first();
        // dd($datasCetak);
        // Kode untuk mencetak PDF dengan data yang telah diambil
        $pdf = PDF::loadview('pages.admin.gajiguru.cetakperid_all', compact('datasCetak', 'getsettingsgaji', 'tgl', 'year', 'month'))->setPaper('a4', 'landscape');

        return $pdf->stream('hrguru_all' . $tgl . '.pdf');
    }

    public function cetakperid(gajiguru $id, Request $request, $cari = null)
    {
        $tgl = date("YmdHis");
        $month = date("m");
        $year = date("Y");

        if ($cari) {
            // Jika $cari ada, gunakan nilainya untuk mengambil bulan dan tahun
            $month = date("m", strtotime($cari));
            $year = date("Y", strtotime($cari));
        }

        $datas = gajiguru::with('guru')
            ->where('id', $id->id)
            ->whereMonth('tahunbulan', $month)
            ->whereYear('tahunbulan', $year)
            ->first();

        $getsettingsgaji = settingsgaji::first();

        $pdf = PDF::loadview('pages.admin.gajiguru.cetakperid', compact('datas', 'getsettingsgaji', 'tgl', 'year', 'month'))->setPaper('a4', 'landscape');

        return $pdf->stream('hrguru' . $tgl . '.pdf');
    }
    public function cari(Request $request)
    {
        $cari = $request->cari;
        #WAJIB
        $pages = 'guru';
        $datas = guru::where('nama', 'like', "%" . $cari . "%")
            ->paginate(Fungsi::paginationjml());

        return view('pages.admin.guru.index', compact('datas', 'request', 'pages'));
    }
    public function create()
    {
        $pages = 'guru';
        $items = jabatan::get();
        return view('pages.admin.guru.create', compact('pages', 'items'));
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

        $id = DB::table('guru')->insertGetId(
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
            DB::table('gurudetail')->insert(
                array(
                    'guru_id'     =>   $id,
                    'jabatan_id'     =>   $request->jabatan[$i],
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s")
                )
            );
        }

        return redirect()->route('guru')->with('status', 'Data berhasil tambahkan!')->with('tipe', 'success')->with('icon', 'fas fa-feather');
    }

    public function edit(gajiguru $id)
    {
        $pages = 'gajiguru';
        $items = jabatan::get();

        return view('pages.admin.gajiguru.edit', compact('pages', 'id', 'items'));
    }
    public function update(gajiguru $id, Request $request)
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
        $walikelas = 0;
        $getsettingsgaji = settingsgaji::first();
        if ($request->simkoperasi == 'Ya') {
            $simkoperasi = $getsettingsgaji->simkoperasi;
        }
        if ($request->dansos == 'Ya') {
            $dansos = $getsettingsgaji->dansos;
        }
        if ($request->walikelas == 'Ya') {
            $walikelas = $getsettingsgaji->walikelas;
        }

        gajiguru::where('id', $id->id)
            ->update([
                'hadir'     =>   Fungsi::angka($request->hadir),
                'jam'     =>   Fungsi::angka($request->jam),
                'simkoperasi'     =>   $simkoperasi,
                'dansos'     =>   $dansos,
                // 'gajipokok'     =>   Fungsi::angka($request->gajipokok),
                // 'tunjanganjabatan'=>$guru->tunjanganjabatan,
                'walikelas'     =>   Fungsi::angka($walikelas),
                'gajipokok'     =>   Fungsi::angka($getsettingsgaji->gajipokok),
                'tunjangankerja'     =>   Fungsi::angka($request->tunjangankerja),
                'tunjanganjabatan'     =>   Fungsi::angka($request->tunjanganjabatan),
                'updated_at' => date("Y-m-d H:i:s")
            ]);




        return redirect()->route('gajiguru')->with('status', 'Data berhasil diubah!')->with('tipe', 'success')->with('icon', 'fas fa-feather');
    }
    public function destroy(gajiguru $id)
    {

        gajiguru::destroy($id->id);
        return redirect()->back()->with('status', 'Data berhasil dihapus!')->with('tipe', 'warning')->with('icon', 'fas fa-feather');
    }
}
