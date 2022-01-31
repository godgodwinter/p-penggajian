<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class admindashboardcontroller extends Controller
{
    public function index(){

        $pages='dashboard';
        if((Auth::user()->tipeuser)=='admin'){
            return view('pages.admin.dashboard.blank',compact('pages'));
        }
        return view('pages.admin.dashboard.blank',compact('pages'));
    }

}
