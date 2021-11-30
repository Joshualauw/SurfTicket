<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminCTR extends Controller
{
    //
    function to_adminHome(){
        return view('admin/homeAdmin');
    }

    function to_profileAdmin(){
        return view('admin/profile');
    }

    function cek_profile(Request $request){
        return response()->json($request);
    }

    function to_mUser(){
        return view('admin/masUser');
    }

    function to_mTicket(){
        return view('admin/masTicket');
    }

    function to_mPromo(){
        return view('admin/masPromo');
    }

    function to_mTrans(){
        return view('admin/masTrans');
    }
}
