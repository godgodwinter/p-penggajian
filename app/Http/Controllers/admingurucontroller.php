<?php

namespace App\Http\Controllers;

use App\Helpers\Fungsi;
use App\Models\guru;
use App\Models\gurudetail;
use App\Models\jabatan;
use App\Models\settingsgaji;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class admingurucontroller extends Controller
{
    public function index(Request $request)
    {
        #WAJIB
        $pages='guru';
        $datas=guru::with('gurudetail')->get();
        $getsettingsgaji=settingsgaji::first();

        return view('pages.admin.guru.index',compact('datas','request','pages','getsettingsgaji'));
    }
    public function cari(Request $request)
    {
        $cari=$request->cari;
        #WAJIB
        $pages='guru';
        $datas=guru::where('nama','like',"%".$cari."%")
        ->paginate(Fungsi::paginationjml());

        return view('pages.admin.guru.index',compact('datas','request','pages'));
    }
    public function create()
    {
        $pages='guru';
        $items=jabatan::get();
        return view('pages.admin.guru.create',compact('pages','items'));
    }

    public function store(Request $request)
    {
        // dd($request,$request->jabatan[0]);
            $request->validate([
                'nama'=>'required',

            ],
            [
                'nama.require'=>'Nama harus diisi',
            ]);

            $id=DB::table('guru')->insertGetId(
                array(
                       'nama'     =>   $request->nama,
                       'jk'     =>   $request->jk,
                       'alamat'     =>   $request->alamat,
                       'nomerinduk'     =>   $request->nomerinduk,
                       'simkoperasi'     =>   $request->simkoperasi,
                       'hadir'     =>   $request->hadir,
                       'telp'     =>   $request->telp,
                       'dansos'     =>   $request->dansos,
                       'walikelas'     =>   $request->walikelas,
                    //    'gajipokok'     =>   Fungsi::angka($request->gajipokok),
                       'tunjangankerja'     =>   Fungsi::angka($request->tunjangankerja),
                       'tunjanganjabatan'     =>   Fungsi::angka($request->tunjanganjabatan),
                       'jam'     =>   Fungsi::angka($request->jam),
                       'created_at'=>date("Y-m-d H:i:s"),
                       'updated_at'=>date("Y-m-d H:i:s")
                ));

            for($i=0;$i<count($request->jabatan);$i++){
                DB::table('gurudetail')->insert(
                    array(
                           'guru_id'     =>   $id,
                           'jabatan_id'     =>   $request->jabatan[$i],
                           'created_at'=>date("Y-m-d H:i:s"),
                           'updated_at'=>date("Y-m-d H:i:s")
                    ));
            }

    return redirect()->route('guru')->with('status','Data berhasil tambahkan!')->with('tipe','success')->with('icon','fas fa-feather');

    }

    public function edit(guru $id)
    {
        $pages='guru';
        $items=jabatan::get();

        return view('pages.admin.guru.edit',compact('pages','id','items'));
    }
    public function update(guru $id,Request $request)
    {


        $request->validate([
            'nama'=>'required',
        ],
        [
            'nama.required'=>'name harus diisi',
        ]);


            guru::where('id',$id->id)
            ->update([
                'nama'     =>   $request->nama,
                'jk'     =>   $request->jk,
                'alamat'     =>   $request->alamat,
                'nomerinduk'     =>   $request->nomerinduk,
                'simkoperasi'     =>   $request->simkoperasi,
                'telp'     =>   $request->telp,
                'dansos'     =>   $request->dansos,
                'hadir'     =>   $request->hadir,
                // 'gajipokok'     =>   Fungsi::angka($request->gajipokok),
                'tunjangankerja'     =>   Fungsi::angka($request->tunjangankerja),
                'tunjanganjabatan'     =>   Fungsi::angka($request->tunjanganjabatan),
                'jam'     =>   Fungsi::angka($request->jam),
               'updated_at'=>date("Y-m-d H:i:s")
            ]);

            //laravel destroy where id example
            DB::table('gurudetail')->where('guru_id',$id->id)->delete();

            for($i=0;$i<count($request->jabatan);$i++){
                $periksa=gurudetail::where('jabatan_id',$request->jabatan[$i])->where('guru_id',$id->id)->count();
                if($periksa==0){
                DB::table('gurudetail')->insert(
                    array(
                           'guru_id'     =>   $id->id,
                           'jabatan_id'     =>   $request->jabatan[$i],
                           'created_at'=>date("Y-m-d H:i:s"),
                           'updated_at'=>date("Y-m-d H:i:s")
                    ));
                }
            }


    return redirect()->route('guru')->with('status','Data berhasil diubah!')->with('tipe','success')->with('icon','fas fa-feather');
    }
    public function destroy(guru $id){

        guru::destroy($id->id);
        gurudetail::where('guru_id',$id->id)->delete();
        return redirect()->route('guru')->with('status','Data berhasil dihapus!')->with('tipe','warning')->with('icon','fas fa-feather');

    }
}
