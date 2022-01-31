<?php

namespace App\Http\Controllers;

use App\Helpers\Fungsi;
use App\Models\dokter;
use App\Models\kategori;
use App\Models\member;
use App\Models\pelatih;
use App\Models\pemain;
use App\Models\produk;
use App\Models\testimoni;
use App\Models\treatment;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class landingcontroller extends Controller
{
    public function index(){
        $pages='beranda';
    // return view('auth.login',compact('pages'));
    return view('landing.pages.index',compact('pages'));
    }

    // public function pemain(){
    //     $pages='pemain';
    //     $datas=pemain::paginate(12);
    // return view('landing.pages.pemain',compact('pages','datas'));
    // }

    // public function pelatih(){
    //     $pages='pelatih';
    //     $datas=pelatih::paginate(12);
    // return view('landing.pages.pelatih',compact('pages','datas'));
    // }

    // public function about(){
    //     $pages='about';
    // return view('landing.pages.about',compact('pages'));
    // }
}
