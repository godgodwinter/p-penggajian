<?php

namespace App\Http\Controllers;

use App\Helpers\Fungsi;
use App\Models\settingsgaji;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class adminsettingsgajicontroller extends Controller
{
    public function index(Request $request)
    {
        #WAJIB
        $pages = 'settingsgaji';
        $id = settingsgaji::where('id', 1)->first();

        return view('pages.admin.settingsgaji.index', compact('id', 'request', 'pages'));
    }

    public function store(Request $request)
    {

        // $transport=Fungsi::angka($request->transport);
        // dd($request,$transport);
        $request->validate(
            [
                'transport' => 'required',

            ],
            [
                'transport.require' => 'Nilai Transport harus diisi',
            ]
        );
        $periksa = settingsgaji::where('id', 1)->count();
        // dd($periksa);
        if ($periksa > 0) {
            //update
            settingsgaji::where('id', 1)
                ->update([
                    'transport'     =>   Fungsi::angka($request->transport),
                    'simkoperasi'     =>   Fungsi::angka($request->simkoperasi),
                    'dansos'     =>   Fungsi::angka($request->dansos),
                    'walikelas'     =>   Fungsi::angka($request->walikelas),
                    'gajipokok'     =>   Fungsi::angka($request->gajipokok),
                    'updated_at' => date("Y-m-d H:i:s")
                ]);
        } else {
            //create
            DB::table('settingsgaji')->insertGetId(
                array(
                    'id'     =>  1,
                    'transport'     =>   Fungsi::angka($request->transport),
                    'simkoperasi'     =>   Fungsi::angka($request->simkoperasi),
                    'dansos'     =>   Fungsi::angka($request->dansos),
                    'walikelas'     =>   Fungsi::angka($request->walikelas),
                    'gajipokok'     =>   Fungsi::angka($request->gajipokok),
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s")
                )
            );
        }

        return redirect()->route('settingsgaji')->with('status', 'Data berhasil tambahkan!')->with('tipe', 'success')->with('icon', 'fas fa-feather');
    }
}
