<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Kepsek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class adminKepsekController extends Controller
{
    public function dashboard(Request $request)
    {
        #WAJIB
        $pages = 'Admin';
        $datas = Kepsek::get();

        return view('pages.admin.dashboard.dashboard_kepsek_index', compact('datas', 'request', 'pages'));
    }
    public function index(Request $request)
    {
        #WAJIB
        $pages = 'Admin';
        $datas = Kepsek::get();

        return view('pages.admin.kepsek.index', compact('datas', 'request', 'pages'));
    }
    public function create()
    {
        $pages = 'pegawai';
        return view('pages.admin.kepsek.create', compact('pages'));
    }
    public function store(Request $request)
    {
        // dd($request);
        $cek = DB::table('kepsek')
            // ->whereNull('deleted_at')
            ->where('username', $request->username)
            ->orWhere('email', $request->email)
            ->count();
        // dd($cek);
        if ($cek > 0) {
            $request->validate(
                [
                    'username' => 'required|unique:kepsek,username',
                    'email' => 'required|unique:kepsek,email',
                    'password' => 'min:3|required_with:password2|same:password2',
                    'password2' => 'min:3',

                ],
                [
                    'username.unique' => 'username sudah digunakan',
                ]
            );
        }

        $request->validate(
            [
                'name' => 'required',
                'username' => 'required',
                'password' => 'min:3|required_with:password2|same:password2',
                'password2' => 'min:3',

            ],
            [
                'nama.nama' => 'Nama harus diisi',
            ]
        );
        $divisi = null;
        DB::table('kepsek')->insert(
            array(
                'name'     =>   $request->name,
                'email'     =>   $request->email,
                'username'     =>   $request->username,
                'nomerinduk'     => date('YmdHis'),
                'password' => Hash::make($request->password),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            )
        );

        $datausers = DB::table('kepsek')->where('username', $request->username)->first();


        return redirect()->route('kepsek')->with('status', 'Data berhasil tambahkan!')->with('tipe', 'success')->with('icon', 'fas fa-feather');
    }

    public function edit(Kepsek $id)
    {
        $pages = 'kepsek';
        $id = Kepsek::where('id', $id->id)
            ->first();
        return view('pages.admin.kepsek.edit', compact('pages', 'id'));
    }
    public function update(Kepsek $id, Request $request)
    {

        if ($request->username !== $id->username) {

            $request->validate(
                [
                    'name' => "required",
                ],
                []
            );
        }

        $request->validate(
            [
                'name' => 'required',
                'email' => 'required',
                'username' => 'required',
            ],
            [
                'name.required' => 'name harus diisi',
            ]
        );

        $divisi = null;


        if ($request->password != null or $request->password != '') {

            $request->validate(
                [
                    'password' => 'min:3|required_with:password2|same:password2',
                    'password2' => 'min:3',
                ],
                [
                    'nama.required' => 'nama harus diisi',
                ]
            );
            Kepsek::where('id', $id->id)
                ->update([
                    'name'     =>   $request->name,
                    'username'     =>   $request->username,
                    'email'     =>   $request->email,
                    'password' => Hash::make($request->password),
                    'updated_at' => date("Y-m-d H:i:s")
                ]);
        } else {
            Kepsek::where('id', $id->id)
                ->update([
                    'name'     =>   $request->name,
                    'username'     =>   $request->username,
                    'email'     =>   $request->email,
                    'updated_at' => date("Y-m-d H:i:s")
                ]);
        }


        return redirect()->route('kepsek')->with('status', 'Data berhasil diubah!')->with('tipe', 'success')->with('icon', 'fas fa-feather');
    }
    public function destroy(Kepsek $id)
    {

        Kepsek::destroy($id->id);
        return redirect()->route('kepsek')->with('status', 'Data berhasil dihapus!')->with('tipe', 'warning')->with('icon', 'fas fa-feather');
    }
}
