<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class adminapicontroller extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if(Auth::user()->tipeuser!='admin' ){
                return redirect()->route('dashboard')->with('status','Halaman tidak ditemukan!')->with('tipe','danger');
            }

        return $next($request);

        });
    }

    // public function nilaipersiswa(prosespenilaian $prosespenilaian,pemainseleksi $pemainseleksi,kriteriadetail $kriteriadetail,Request $request){
    //     // dd($pemainseleksi,$kriteriadetail);
    //     $penilaian_id=null;
    //     $getpenilaian_id=penilaian::where('pemainseleksi_id',$pemainseleksi->id)->where('kriteriadetail_id',$kriteriadetail->id)->first();
    //     $periksa=penilaiandetail::where('prosespenilaian_id',$prosespenilaian->id)->where('penilaian_id',$getpenilaian_id)->count();

    //     $data=0;
    //     if($periksa>0){
    //         $getdata=penilaiandetail::where('prosespenilaian_id',$prosespenilaian->id)->where('penilaian_id',$getpenilaian_id)->first();
    //         $data=$getdata->nilai;
    //     }
    //     // dd($prosespenilaian->id,$getpenilaian_id,$periksa);
    //     return response()->json([
    //         'success' => true,
    //         'message' => 'success',
    //         'data' => $data,
    //     ], 200);
    // }

}
