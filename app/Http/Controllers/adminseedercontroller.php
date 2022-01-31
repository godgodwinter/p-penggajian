<?php

namespace App\Http\Controllers;

use App\Models\kriteria;
use App\Models\kriteriadetail;
use App\Models\pelatih;
use App\Models\pemain;
use App\Models\posisipemain;
use App\Models\tahunpenilaian;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class adminseedercontroller extends Controller
{

    protected $th;
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if(Auth::user()->tipeuser!='admin'){
                return redirect()->route('dashboard')->with('status','Halaman tidak ditemukan!')->with('tipe','danger');
            }

        return $next($request);

        });
    }

}
