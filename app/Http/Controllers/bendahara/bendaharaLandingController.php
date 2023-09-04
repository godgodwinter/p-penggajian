<?php

namespace App\Http\Controllers\bendahara;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class bendaharaLandingController extends Controller
{
    public function index()
    {
        $pages = 'beranda';
        // return view('auth.login',compact('pages'));
        return view('landing.pages.BendaharaLogin', compact('pages'));
    }
    // public function do_login(Request $request)
    // {

    //     dd($request->password, $request->identity);
    //     // ! 1. cek pada tabel bendahara
    //     // ! 2. jika ada dan password sama maka redirect ke halaman beranda
    //     // ! 3.  jika tidak ada maka kembali ke menu bendahara.login
    // }

    public function do_login(Request $request)
    {
        $credentials = $request->only('username', 'password');
        // dd($credentials);
        if (Auth::guard('bendahara')->attempt($credentials)) {
            return redirect()->route('bendahara.dashboard')->with('status', 'login berhasil !')->with('tipe', 'success')->with('icon', 'fas fa-feather');
            // dd("login berhasil");
            // return redirect('/dashboard');
        } else {
            // return redirect()->back()->with('status', 'Login gagal!')->with('tipe', 'success')->with('icon', 'fas fa-feather');

            return redirect()
                ->back()
                ->withErrors(['email' => 'Email atau password salah']);
            // return Redirect::back()->with('msg', 'Login Gagal!');
            // dd("login gagal");
            // return redirect('/login')->with('error', 'Invalid Email address or Password');
        }
    }
}
