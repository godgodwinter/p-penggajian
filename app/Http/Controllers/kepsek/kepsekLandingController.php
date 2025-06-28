<?php

namespace App\Http\Controllers\kepsek;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class kepsekLandingController extends Controller
{
    public function index()
    {
        $pages = 'beranda';
        return view('landing.pages.KepsekLogin', compact('pages'));
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
        if (Auth::guard('kepsek')->attempt($credentials)) {
            return redirect()->route('kepsek.dashboard')->with('status', 'login berhasil !')->with('tipe', 'success')->with('icon', 'fas fa-feather');
            // return redirect('/dashboard');
        } else {
            return redirect()
                ->back()
                ->withErrors(['email' => 'Email atau password salah']);
            // dd("login gagal");
            // return redirect('/login')->with('error', 'Invalid Email address or Password');
        }
    }


    public function do_login_campur(Request $request)
    {
        $credentials = $request->only('username', 'password');
        if (Auth::guard('web')->attempt(['username' => $credentials['username'], 'password' => $credentials['password']])) {
            return redirect()->route('dashboard')->with('status', 'Login sebagai Admin!');
        }
        if (Auth::guard('kepsek')->attempt(['username' => $credentials['username'], 'password' => $credentials['password']])) {
            return redirect()->route('kepsek.dashboard')->with('status', 'Login sebagai Kepala Sekolah berhasil!');
        }
        if (Auth::guard('bendahara')->attempt(['username' => $credentials['username'], 'password' => $credentials['password']])) {
            return redirect()->route('bendahara.dashboard')->with('status', 'Login sebagai Bendahara berhasil!');
        }
        return back()->withErrors(['username' => 'Username atau password tidak cocok dengan akun manapun.']);
    }
}
