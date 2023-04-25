<?php

namespace App\Http\Controllers\kepsek;

use App\Http\Controllers\Controller;
use App\Models\gajiguru;
use App\Models\gajipegawai;
use App\Models\settingsgaji;
use Illuminate\Http\Request;

class kepsekLaporanController extends Controller
{
    public function index(Request $request)
    {
        #WAJIB
        $menu = 'kepsek';
        $pages = 'guru';
        $month = date("m");
        $year = date("Y");
        $cari = $request->cari;
        if ($cari) {
            $month = date("m", strtotime($cari));
            $year = date("Y", strtotime($cari));
        }
        $datas_gajiguru = gajiguru::whereMonth('tahunbulan', $month)->whereYear('tahunbulan', $year)->get();
        $datas_gajipegawai = gajipegawai::whereMonth('tahunbulan', $month)->whereYear('tahunbulan', $year)->get();

        $getsettingsgaji = settingsgaji::first();
        return view('pages.kepsek.laporan.index', compact('datas_gajiguru', 'datas_gajipegawai', 'request', 'pages', 'cari', 'getsettingsgaji', 'menu'));
    }
}
