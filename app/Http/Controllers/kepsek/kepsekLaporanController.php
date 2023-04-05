<?php

namespace App\Http\Controllers\kepsek;

use App\Http\Controllers\Controller;
use App\Models\gajiguru;
use App\Models\settingsgaji;
use Illuminate\Http\Request;

class kepsekLaporanController extends Controller
{
    public function index(Request $request)
    {
        #WAJIB
        $pages = 'guru';
        $month = date("m");
        $year = date("Y");
        $cari = $request->cari;
        if ($cari) {
            $month = date("m", strtotime($cari));
            $year = date("Y", strtotime($cari));
        }
        $datas = gajiguru::whereMonth('tahunbulan', $month)->whereYear('tahunbulan', $year)->get();

        $getsettingsgaji = settingsgaji::first();
        return view('pages.admin.gajiguru.index', compact('datas', 'request', 'pages', 'cari', 'getsettingsgaji'));
    }
}
