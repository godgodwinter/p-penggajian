<?php

namespace App\Http\Controllers;

use App\Helpers\Fungsi;
use App\Models\guru;
use App\Models\gurudetail;
use App\Models\settings;
use App\Models\jabatan;
use App\Models\settingsgaji;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class admingurucontroller extends Controller
{
    public function index(Request $request)
    {
        #WAJIB
        $pages = 'guru';
        $datas = guru::with('gurudetail')->get();
        $getsettingsgaji = settingsgaji::first();


        foreach ($datas as $data) {
            // $data->gajipokok_total = $data->pegawaidetail->gajipokok;

            $gurudetail = $data->gurudetail;
            $gajipokok_total = 0;
            foreach ($gurudetail as $get_jabatan) {
                // dd($get_jabatan->jabatan_id);
                $get_gaji_perjabatan = jabatan::where('id', $get_jabatan->jabatan_id)->first();
                $nominal_gajipokok = $get_gaji_perjabatan->gajipokok ? $get_gaji_perjabatan->gajipokok : 0;
                $gajipokok_total += $nominal_gajipokok;
                // dd($get_gaji_perjabatan, $nominal_gajipokok);
            }
            // dd($pegawai_detail);
            $data->tunjanganjabatan_total = $gajipokok_total;
            // dd($data->gajipokok_total);
        }

        return view('pages.admin.guru.index', compact('datas', 'request', 'pages', 'getsettingsgaji'));
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
                'hadir'     =>   $request->hadir,
                'tgl_mulai_bekerja'     =>   $request->tgl_mulai_bekerja,
                'telp'     =>   $request->telp,
                'dansos'     =>   $request->dansos,
                'walikelas'     =>   $request->walikelas,
                //    'gajipokok'     =>   Fungsi::angka($request->gajipokok),
                'tunjangankerja'     =>   Fungsi::angka($request->tunjangankerja),
                'tunjanganjabatan'     =>   Fungsi::angka($request->tunjanganjabatan),
                'jam'     =>   Fungsi::angka($request->jam),
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

    public function edit(guru $id)
    {
        $pages = 'guru';
        $items = jabatan::get();

        return view('pages.admin.guru.edit', compact('pages', 'id', 'items'));
    }
    public function update(guru $id, Request $request)
    {


        $request->validate(
            [
                'nama' => 'required',
            ],
            [
                'nama.required' => 'name harus diisi',
            ]
        );

        $tgl_mulai = Carbon::parse($request->tgl_mulai_bekerja);
        $tgl_sekarang = Carbon::now();
        $lama_kerja = $tgl_sekarang->diffInYears($tgl_mulai);
        $settings = settingsgaji::where('id', 1)->first();
        $nominal_tunjangan = $settings->tunjangankerja;
        $tunjangankerja = $lama_kerja * $nominal_tunjangan;
        // dd($lama_kerja, $tunjangankerja);

        guru::where('id', $id->id)
            ->update([
                'nama'     =>   $request->nama,
                'jk'     =>   $request->jk,
                'alamat'     =>   $request->alamat,
                'nomerinduk'     =>   $request->nomerinduk,
                'simkoperasi'     =>   $request->simkoperasi,
                'telp'     =>   $request->telp,
                'dansos'     =>   $request->dansos,
                'hadir'     =>   $request->hadir,
                'tgl_mulai_bekerja'     =>   $request->tgl_mulai_bekerja,
                // 'gajipokok'     =>   Fungsi::angka($request->gajipokok),
                'tunjangankerja'     =>    $tunjangankerja,
                // 'tunjangankerja'     =>    $tunjangankerja,
                // 'tunjangankerja'     =>   Fungsi::angka($request->tunjangankerja) || $tunjangankerja,
                'tunjanganjabatan'     =>   Fungsi::angka($request->tunjanganjabatan),
                'jam'     =>   Fungsi::angka($request->jam),
                'updated_at' => date("Y-m-d H:i:s")
            ]);

        //laravel destroy where id example
        DB::table('gurudetail')->where('guru_id', $id->id)->delete();

        for ($i = 0; $i < count($request->jabatan); $i++) {
            $periksa = gurudetail::where('jabatan_id', $request->jabatan[$i])->where('guru_id', $id->id)->count();
            if ($periksa == 0) {
                DB::table('gurudetail')->insert(
                    array(
                        'guru_id'     =>   $id->id,
                        'jabatan_id'     =>   $request->jabatan[$i],
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    )
                );
            }
        }


        return redirect()->route('guru')->with('status', 'Data berhasil diubah!')->with('tipe', 'success')->with('icon', 'fas fa-feather');
    }
    public function destroy(guru $id)
    {

        guru::destroy($id->id);
        gurudetail::where('guru_id', $id->id)->delete();
        return redirect()->route('guru')->with('status', 'Data berhasil dihapus!')->with('tipe', 'warning')->with('icon', 'fas fa-feather');
    }
}
