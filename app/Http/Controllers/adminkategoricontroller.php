<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class adminkategoricontroller extends Controller
{
    public function index(Request $request)
    {
        #WAJIB
        $pages='kategori';
        $datas=kategori::orderBy('prefix','desc')
        ->orderBy('nama','asc')
        ->paginate();
        return view('pages.admin.kategori.index',compact('datas','request','pages'));
    }
    public function create()
    {
        $pages='kategori';
        return view('pages.admin.kategori.create',compact('pages'));
    }

    public function store(Request $request)
    {
            $request->validate([
                'nama'=>'required|unique:kategori',
                'prefix'=>'required',
            ],
            [
                'nama.nama'=>'Nama harus diisi',
            ]);
            DB::table('kategori')->insert(
                array(
                       'nama'     =>   $request->nama,
                       'prefix'     =>   $request->prefix,
                       'created_at'=>date("Y-m-d H:i:s"),
                       'updated_at'=>date("Y-m-d H:i:s")
                ));
    return redirect()->route('kategori')->with('status','Data berhasil tambahkan!')->with('tipe','success')->with('icon','fas fa-feather');
    }

    public function edit(kategori $id)
    {
        $pages='kategori';
        return view('pages.admin.kategori.edit',compact('pages','id'));
    }
    public function update(kategori $id,Request $request)
    {

        $request->validate([
            'nama'=>'required',
        ],
        [
            'nama.required'=>'nama harus diisi',
            'prefix'=>'required',
        ]);

            kategori::where('id',$id->id)
            ->update([
                'nama'     =>   $request->nama,
                'prefix'     =>   $request->prefix,
               'updated_at'=>date("Y-m-d H:i:s")
            ]);



    return redirect()->route('kategori')->with('status','Data berhasil diubah!')->with('tipe','success')->with('icon','fas fa-feather');
    }
    public function destroy(kategori $id){

        kategori::destroy($id->id);
        return redirect()->route('kategori')->with('status','Data berhasil dihapus!')->with('tipe','warning')->with('icon','fas fa-feather');

    }
}
