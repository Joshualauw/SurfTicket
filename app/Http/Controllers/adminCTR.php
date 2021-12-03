<?php

namespace App\Http\Controllers;

use App\Models\Promo;
use App\Models\User;
use Illuminate\Http\Request;
use App\Rules\cek_unique;
use Illuminate\Support\Facades\Storage;

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

    function to_mUser(Request $request){

        $berhasil = $request->session()->pull('berhasil');
        if ($berhasil == "ya") {
            echo "<script>alert('berhasil add admin baru')</script>";
        }

        return view('admin/masUser');
    }

    function to_mTicket(){
        return view('admin/masTicket');
    }

    function to_mPromo(Request $request){

        $berhasil = $request->session()->pull('berhasil');
        if ($berhasil == "edit") {
            echo "<script>alert('berhasil edit promo')</script>";
        }
        elseif($berhasil == "tambah"){
            echo "<script>alert('berhasil menambah promo')</script>";
        }
        return view('admin/masPromo');
    }

    function to_mTrans(){
        return view('admin/masTrans');
    }

    function cek_addTicket(Request $request){
        return response()->json($request);
    }

    function change_promo(Request $request){

        if($request->btn_chg == "add"){
            $rul = [
                "kd_txt" =>["required",new cek_unique(Promo::all(),'kode',$request->kd_txt)],
                "nm_txt" =>["required"],
                "ds_txt" => ["required"],
                "dk_txt" => ["required","min:0"]
            ];
            $this->validate($request, $rul);
            if($request->hasFile('gb_txt')){
                Storage::putFileAs('/public/banner_promo',$request->file('gb_txt'),$request->kd_txt.".".$request->file('gb_txt')->getClientOriginalExtension());
                $filnam = '/public/banner_promo/'.$request->kd_txt.".".$request->file('gb_txt')->getClientOriginalExtension();
            }
            else{
                $filnam = '/public/banner_promo/def.jpg';
            }

            $n = new Promo();
            $n->nama = $request->nm_txt;
            $n->kode = $request->kd_txt;
            $n->deskripsi = $request->ds_txt;
            $n->diskon = $request->dk_txt;
            $n->img_dir = $filnam;

            $n->save();

            return redirect()->action([adminCTR::class, 'to_mPromo'])->with('berhasil', 'tambah');
        }
        else{
            $rul = [
                "nm_txt" =>["required"],
                "ds_txt" => ["required"],
                "dk_txt" => ["required","min:0"]
            ];
            $this->validate($request, $rul);

            $pr = Promo::find($request->btn_chg);
            $pr->nama = $request->nm_txt;
            $pr->deskripsi = $request->ds_txt;
            $pr->diskon = $request->dk_txt;
            $pr->save();

            return redirect()->action([adminCTR::class, 'to_mPromo'])->with('berhasil', 'edit');
        }


    }

    function to_dtlTicket(Request $request){
        return view('admin/detailTicket');
    }

    function cek_uptTicket(Request $request){
        return response()->json($request);
    }

    function change_jadwal(Request $request){
        return response()->json($request);
    }

    function add_admin(Request $request){
        $rul = [
            "nm_txt" => ['required'],
            "us_txt" => ['required',new cek_unique(User::all(),'username',$request->us_txt)],
            "em_txt" => ['required',new cek_unique(User::all(),'email',$request->em_txt),'email'],
            "ps_txt" => ['required'],
            "kf_txt" => ['required','same:ps_txt'],
        ];

        $this->validate($request, $rul);

        if($request->hasFile('ft_txt')){
            Storage::putFileAs('/public/profile_photo',$request->file('ft_txt'),$request->us_txt.".".$request->file('ft_txt')->getClientOriginalExtension());
            $filnam = '/public/profile_photo/'.$request->us_txt.".".$request->file('ft_txt')->getClientOriginalExtension();
        }
        else{
            $filnam = '/public/profile_photo/def.png';
        }

        try {
            $n = new User();
            $n->username = $request->us_txt;
            $n->nama = $request->nm_txt;
            $n->email = $request->em_txt;
            $n->password = bcrypt($request->ps_txt);
            $n->img_dir = $filnam;
            $n->isAdmin = true;
            $n->save();
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }

        return redirect()->action([adminCTR::class, 'to_mUser'])->with('berhasil', 'ya');
    }

    function ban_user(Request $request){
        $usr = User::find($request->id_user);
        if($usr->isBan == 0){
            $usr->isBan = 1;
        }
        else{
            $usr->isBan = 0;
        }
        $usr->save();
    }

    function load_tbuser(Request $request){
        if($request->key == ""){
            $arr = User::all();
        }
        else{
            $key = $request->key;
            $arr = User::where("username", 'like', '%' . $key . '%')->get();
        }

        return view('/admin/help/tb_user', ["arr" => $arr])->render();
    }

    function load_tbpromo(Request $request){
        if($request->key == ""){
            $arr = Promo::all();
        }
        else{
            $key = $request->key;
            $arr = Promo::where("kode", 'like', '%' . $key . '%')->get();
        }

        return view('/admin/help/tb_promo', ["arr" => $arr])->render();
    }

    function cari_promo(Request $request){
        $arr = Promo::find($request->id_promo);
        return response()->json($arr);
    }

    function hapus_promo(Request $request){
        Promo::destroy($request->id_promo);
    }
}
