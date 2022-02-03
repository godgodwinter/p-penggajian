<?php

namespace App\Http\Controllers;

use App\Helpers\Fungsi;
use App\Models\jabatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class adminjabatancontroller extends Controller
{
    public function index(Request $request)
    {
        #WAJIB
        $pages='jabatan';
        $datas=jabatan::get();

        return view('pages.admin.jabatan.index',compact('datas','request','pages'));
    }
    public function cari(Request $request)
    {
        $cari=$request->cari;
        #WAJIB
        $pages='jabatan';
        $datas=jabatan::where('nama','like',"%".$cari."%")
        ->paginate(Fungsi::paginationjml());

        return view('pages.admin.jabatan.index',compact('datas','request','pages'));
    }
    public function create()
    {
        $pages='jabatan';

        return view('pages.admin.jabatan.create',compact('pages'));
    }

    public function store(Request $request)
    {

        // dd($request);
            $request->validate([
                'nama'=>'required',

            ],
            [
                'nama.nama'=>'Nama harus diisi',
            ]);

            $getid=DB::table('jabatan')->insertGetId(
                array(
                       'nama'     =>   $request->nama,
                       'created_at'=>date("Y-m-d H:i:s"),
                       'updated_at'=>date("Y-m-d H:i:s")
                ));

    return redirect()->route('jabatan')->with('status','Data berhasil tambahkan!')->with('tipe','success')->with('icon','fas fa-feather');

    }

    public function edit(jabatan $id)
    {
        $pages='jabatan';

        return view('pages.admin.jabatan.edit',compact('pages','id'));
    }
    public function update(jabatan $id,Request $request)
    {


        $request->validate([
            'nama'=>'required',
        ],
        [
            'nama.required'=>'name harus diisi',
        ]);


            jabatan::where('id',$id->id)
            ->update([
                'nama'     =>   $request->nama,
               'updated_at'=>date("Y-m-d H:i:s")
            ]);


    return redirect()->route('jabatan')->with('status','Data berhasil diubah!')->with('tipe','success')->with('icon','fas fa-feather');
    }
    public function destroy(jabatan $id){

        jabatan::destroy($id->id);
        return redirect()->route('jabatan')->with('status','Data berhasil dihapus!')->with('tipe','warning')->with('icon','fas fa-feather');

    }
}
