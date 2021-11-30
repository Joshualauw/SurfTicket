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
}
