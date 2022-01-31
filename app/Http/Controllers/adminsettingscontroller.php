<?php

namespace App\Http\Controllers;

use App\Exports\exportdataujian;
use App\Helpers\Fungsi;
use App\Models\kelas;
use App\Models\settings;
use App\Models\siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Faker\Factory as Faker;

class adminsettingscontroller extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if(Auth::user()->tipeuser!='admin'){
                return redirect()->route('dashboard')->with('status','Halaman tidak ditemukan!')->with('tipe','danger');
            }

        return $next($request);

        });
    }
    public function index(){

        $pages='settings';



        $datas=DB::table('settings')->where('id',1)->first();
        return view('pages.admin.settings.index',compact('datas','pages'));
    }
    public function update(settings $id,Request $request){
        // dd($request,$id);
        settings::where('id',$id->id)
        ->update([
            'app_nama' => $request->app_nama,
            'app_namapendek' => $request->app_namapendek,
            // 'paginationjml' => $request->paginationjml,
            'lembaga_nama' => $request->lembaga_nama,
            'lembaga_jalan' => $request->lembaga_jalan,
            'lembaga_kota' => $request->lembaga_kota,
            'lembaga_telp' => $request->lembaga_telp,
            'sekolahttd' => $request->sekolahttd,
            // 'wa_status' => $request->wa_status,
            // 'wa_linkoff' => $request->wa_linkoff,
            // 'wa_linkon' => $request->wa_linkon,
           'updated_at'=>date("Y-m-d H:i:s")
        ]);

        $files = $request->file('lembaga_logo');

        $imagesDir=public_path().'/storage';
        // dd($request);
        if($files!=null){

            if (file_exists( public_path().'/storage'.'/'.$id->lembaga_logo)AND($id->lembaga_logo!=null)){
                chmod($imagesDir, 0777);
                $image_path = public_path().'/storage'.'/'.$id->lembaga_logo;
                unlink($image_path);
            }
            // dd('storage'.'/'.$id->sekolah_logo);
            $namafilebaru=$id->id;
            $file = $request->file('lembaga_logo');
            $tujuan_upload = 'storage/logo';
                    // upload file
            $file->move($tujuan_upload,"logo/".$namafilebaru.".jpg");
            settings::where('id',$id->id)
            ->update([
                'lembaga_logo' => "logo/".$namafilebaru.".jpg",
            'updated_at'=>date("Y-m-d H:i:s")
            ]);

        }
        return redirect()->route('settings')->with('status','Data berhasil diubah!')->with('tipe','success');
    }

    // public function updatereminder(settings $id,Request $request){
    //     $jam=date("H:i:s", strtotime($request->reminderjam));
    //     // dd($request,$id,$jam);
    //     settings::where('id','1')
    //     ->update([
    //         'reminderjam' => $jam,
    //         'reminderidmesin' => $request->reminderidmesin,
    //         'reminderpin' => $request->reminderpin,
    //         'reminderotomatis' => $request->reminderotomatis,
    //         'reminderhari' => $request->reminderhari,
    //        'updated_at'=>date("Y-m-d H:i:s")
    //     ]);
    //     return redirect()->back()->with('status','Data berhasil diubah!')->with('tipe','success');
    // }
    public function profile(){

        $pages='profile';



        $datas=DB::table('users')->where('id',Auth::user()->id)->first();
        return view('pages.admin.settings.profile',compact('datas','pages'));
    }
    public function profileupdate(Request $request)
    {
        $myprofile=Auth::user();
        // dd($myprofile,$request->username);

        if($myprofile->username!==$request->username){

            $request->validate([
                'username' => "required|unique:users,username",
            ],
            [
            ]);
        }

        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'username'=>'required',
        ],
        [
            'nama.required'=>'nama harus diisi',
        ]);


        if($request->password!=null OR $request->password!=''){

        $request->validate([
            'password' => 'min:3|required_with:password2|same:password2',
            'password2' => 'min:3',
        ],
        [
            'nama.required'=>'nama harus diisi',
        ]);
            User::where('id',$myprofile->id)
            ->update([
                'name'     =>   $request->name,
                'email'     =>   $request->email,
                'username'     =>   $request->username,
                'password' => Hash::make($request->password),
               'updated_at'=>date("Y-m-d H:i:s")
            ]);
        }else{
            User::where('id',$myprofile->id)
            ->update([
                'name'     =>   $request->name,
                'username'     =>   $request->username,
                'email'     =>   $request->email,
               'updated_at'=>date("Y-m-d H:i:s")
            ]);

        }


    return redirect()->route('profile')->with('status','Data berhasil diubah!')->with('tipe','success')->with('icon','fas fa-feather');
    }
}
