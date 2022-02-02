<?php

namespace App\Http\Controllers;

use App\Helpers\Fungsi;
use App\Models\jabatan;
use App\Models\pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class adminpegawaicontroller extends Controller
{
    public function index(Request $request)
    {
        #WAJIB
        $pages='pegawai';
        $datas=pegawai::paginate(Fungsi::paginationjml());

        return view('pages.admin.pegawai.index',compact('datas','request','pages'));
    }
    public function cari(Request $request)
    {
        $cari=$request->cari;
        #WAJIB
        $pages='pegawai';
        $datas=pegawai::where('nama','like',"%".$cari."%")
        ->paginate(Fungsi::paginationjml());

        return view('pages.admin.pegawai.index',compact('datas','request','pages'));
    }
    public function create()
    {
        $pages='pegawai';
        $items=jabatan::get();
        return view('pages.admin.pegawai.create',compact('pages','items'));
    }

    public function store(Request $request)
    {

            $request->validate([
                'nama'=>'required',

            ],
            [
                'nama.require'=>'Nama harus diisi',
            ]);

            DB::table('pegawai')->insertGetId(
                array(
                       'nama'     =>   $request->nama,
                       'jk'     =>   $request->nama,
                       'alamat'     =>   $request->alamat,
                       'nomerinduk'     =>   $request->nomerinduk,
                       'simkoperasi'     =>   $request->simkoperasi,
                       'telp'     =>   $request->telp,
                       'dansos'     =>   $request->dansos,
                       'gajipokok'     =>   Fungsi::angka($request->gajipokok),
                       'tunjangankerja'     =>   Fungsi::angka($request->tunjangankerja),
                       'created_at'=>date("Y-m-d H:i:s"),
                       'updated_at'=>date("Y-m-d H:i:s")
                ));

    return redirect()->route('pegawai')->with('status','Data berhasil tambahkan!')->with('tipe','success')->with('icon','fas fa-feather');

    }

    public function edit(pegawai $id)
    {
        $pages='pegawai';

        return view('pages.admin.pegawai.edit',compact('pages','id'));
    }
    public function update(pegawai $id,Request $request)
    {


        $request->validate([
            'nama'=>'required',
        ],
        [
            'nama.required'=>'name harus diisi',
        ]);


            pegawai::where('id',$id->id)
            ->update([
                'nama'     =>   $request->nama,
               'updated_at'=>date("Y-m-d H:i:s")
            ]);


    return redirect()->route('pegawai')->with('status','Data berhasil diubah!')->with('tipe','success')->with('icon','fas fa-feather');
    }
    public function destroy(pegawai $id){

        pegawai::destroy($id->id);
        return redirect()->route('pegawai')->with('status','Data berhasil dihapus!')->with('tipe','warning')->with('icon','fas fa-feather');

    }
}
