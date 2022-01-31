<?php

namespace App\Http\Controllers;

use App\Models\pemainseleksi;
use App\Models\penilaianhasil;
use App\Models\posisiseleksi;
use App\Models\tahunpenilaian;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class admingrafikcontroller extends Controller
{
    protected $th;
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if(Auth::user()->tipeuser!='admin' AND Auth::user()->tipeuser!='pelatih'){
                return redirect()->route('dashboard')->with('status','Halaman tidak ditemukan!')->with('tipe','danger');
            }

        return $next($request);

        });
    }
    public function grafikhasilpenilaian(tahunpenilaian $tahunpenilaian,Request $request)
    {

        $this->th=$tahunpenilaian->id;
        // dd($blnthn);


        $ambildatapemainseleksi=pemainseleksi::with('pemain')->where('tahunpenilaian_id',$tahunpenilaian->id)->get();
        $hasil= new Collection();
        foreach($ambildatapemainseleksi as $pemain){
            $posisiterbaik= new Collection();
            $ambildatahasil=penilaianhasil::with('posisiseleksi')->where('pemainseleksi_id',$pemain->id)->skip(0)->take($tahunpenilaian->jml)->orderBy('total','desc')->get();
            foreach($ambildatahasil as $h){
                $posisiterbaik->push((object)[
                    'id' => $h->id,
                    // 'nama' => $pemain->pemain!=null?$pemain->pemain->nama:'Data tidak ditemukan',
                    'nama' => $h->posisiseleksi->posisipemain->nama,
                    'total' => $h->total,
                ]);

            }

            $hasil->push((object)[
                'id' => $pemain->id,
                'nama' => $pemain->pemain!=null?$pemain->pemain->nama:'Data tidak ditemukan',
                'posisiterbaik' => $posisiterbaik,
            ]);
        }

        $datas=$hasil;


        $ambildataposisiseleksi=posisiseleksi::with('posisipemain')->with('posisiseleksidetail')->where('tahunpenilaian_id',$tahunpenilaian->id)->get();

        $hasil2= new Collection();
        foreach($ambildataposisiseleksi as $item){

            $pemainterbaik= new Collection();
            $ambildatahasil=penilaianhasil::with('pemainseleksi')->where('posisiseleksi_id',$item->id)->skip(0)->take($tahunpenilaian->jml)->orderBy('total','desc')->get();
            foreach($ambildatahasil as $h){
                $pemainterbaik->push((object)[
                    'id' => $h->id,
                    // 'nama' => $pemain->pemain!=null?$pemain->pemain->nama:'Data tidak ditemukan',
                    'nama' => $h->pemainseleksi->pemain->nama,
                    'total' => $h->total,
                ]);

            }

            $hasil2->push((object)[
                'id' => $item->id,
                'nama' => $item->posisipemain!=null?$item->posisipemain->nama:'Data tidak ditemukan',
                'pemainterbaik' => $pemainterbaik,
            ]);
        }
        $pages='tahunpenilaian';
        return view('pages.admin.tahunpenilaian.grafik',compact('datas','tahunpenilaian','hasil2','pages'));
    }
}
