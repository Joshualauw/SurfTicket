<?php

namespace App\Http\Controllers;

use App\Models\HTransaksi;
use App\Models\Jadwal;
use App\Models\Kota;
use App\Models\User;
use App\Models\Promo;
use App\Models\Ticket;
use App\Models\Transaksi;
use App\Rules\cek_unique;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class adminCTR extends Controller
{
    //
    function to_adminHome()
    {
// //         SELECT    COUNT(*)
// // FROM      table_emp
// // WHERE     YEAR(ARR_DATE) = '2012'
// // GROUP BY  MONTH(ARR_DATE)

//         $arr = HTransaksi::where([date_format('created_at','Y'),"=",Carbon::now()->year],[Carbon::parse('created_at')->month,"=",12])->count();

//         return response()->json($arr);
        return view('admin/homeAdmin');
    }

    function to_profileAdmin(Request $request)
    {
        $berhasil = $request->session()->pull('berhasil');
        if ($berhasil == "ya") {
            echo "<script>alert('berhasil update profile')</script>";
        }

        return view('admin/profile');
    }

    function cek_profile(Request $request)
    {
        $n = User::find($request->btn_id);

        $ctr = 0;
        if (($request->nama_txt != "" || $request->nama_txt != null) && $request->nama_txt != $n->nama) {
            $n->nama = $request->nama_txt;
            $ctr += 1;
        }

        if (($request->user_txt != "" || $request->user_txt != null) && $request->user_txt != $n->username) {
            if (count(User::where("username", "=", $request->user_txt)->get()) == 0) {
                $n->username = $request->user_txt;
                $ctr += 1;
            }
        }

        if (($request->email_txt != "" || $request->email_txt != null) && $request->email_txt != $n->email) {
            if (count(User::where("email", "=", $request->email_txt)->get()) == 0) {
                $n->email = $request->email_txt;
                $ctr += 1;
            }
        }

        if (($request->tlp_txt != "" || $request->tlp_txt != null) && $request->tlp_txt != $n->no_telp) {
            $n->no_telp = $request->tlp_txt;
            $ctr += 1;
        }

        if (($request->alt_txt != "" || $request->alt_txt != null) && $request->alt_txt != $n->alamat) {
            $n->alamat = $request->alt_txt;
            $ctr += 1;
        }

        if (($request->tgl_txt != "" || $request->tgl_txt != null) && $request->tgl_txt != $n->tgl_lahir) {
            $n->tgl_lahir = $request->tgl_txt;
            $ctr += 1;
        }


        if ($ctr == 0) {
            return redirect()->action([adminCTR::class, 'to_profileAdmin']);
        } else {
            $n->save();
            return redirect()->action([adminCTR::class, 'to_profileAdmin'])->with('berhasil', 'ya');
        }
    }

    function to_mUser(Request $request)
    {

        $berhasil = $request->session()->pull('berhasil');
        if ($berhasil == "ya") {
            echo "<script>alert('berhasil add admin baru')</script>";
        }

        return view('admin/masUser');
    }

    function to_mTicket(Request $request)
    {
        $berhasil = $request->session()->pull('berhasil');
        if ($berhasil == "ya") {
            echo "<script>alert('berhasil add ticket baru')</script>";
        } else if ($berhasil == "hapus") {
            echo "<script>alert('berhasil hapus ticket')</script>";
        }


        return view('admin/masTicket');
    }

    function to_mPromo(Request $request)
    {

        $berhasil = $request->session()->pull('berhasil');
        if ($berhasil == "edit") {
            echo "<script>alert('berhasil edit promo')</script>";
        } elseif ($berhasil == "tambah") {
            echo "<script>alert('berhasil menambah promo')</script>";
        }
        return view('admin/masPromo');
    }

    function to_mTrans()
    {

        return view('admin/masTrans',["arr"=>HTransaksi::where("status","=","menunggu")->get()]);
    }

    function cek_addTicket(Request $request)
    {
        $new_id = Ticket::max('id') + 1;
        $rul = [
            "nm_txt" => ["required"],
            "hr_txt" => ["required"],
            "ds_txt" => ["required"],
            "pr_txt" => ["required"],
            "kt_txt" => ["required"]
        ];
        $this->validate($request, $rul);



        if ($request->hasFile('gb_txt')) {
            Storage::putFileAs('/public/banner_ticket', $request->file('gb_txt'), $new_id . "." . $request->file('gb_txt')->getClientOriginalExtension());
            $filnam = 'storage/banner_ticket/' . $new_id . "." . $request->file('gb_txt')->getClientOriginalExtension();
        } else {
            $filnam = 'storage/banner_ticket/def.jpg';
        }

        $n = new Ticket();
        $n->nama = $request->nm_txt;
        $n->deskripsi = $request->ds_txt;
        $n->harga = $request->hr_txt;
        $n->provinsi_id = $request->pr_txt;
        $n->kota_id = $request->kt_txt;
        $n->img_dir = $filnam;
        $n->save();

        return redirect()->action([adminCTR::class, 'to_mTicket'])->with('berhasil', 'ya');
    }

    function change_promo(Request $request)
    {

        if ($request->btn_chg == "add") {
            $rul = [
                "kd_txt" => ["required", new cek_unique(Promo::all(), 'kode', $request->kd_txt)],
                "nm_txt" => ["required"],
                "ds_txt" => ["required"],
                "dk_txt" => ["required", "min:0"]
            ];
            $this->validate($request, $rul);
            if ($request->hasFile('gb_txt')) {
                Storage::putFileAs('/public/banner_promo', $request->file('gb_txt'), $request->kd_txt . "." . $request->file('gb_txt')->getClientOriginalExtension());
                $filnam = 'storage/banner_promo/' . $request->kd_txt . "." . $request->file('gb_txt')->getClientOriginalExtension();
            } else {
                $filnam = 'storage/banner_promo/def.jpg';
            }

            $n = new Promo();
            $n->nama = $request->nm_txt;
            $n->kode = $request->kd_txt;
            $n->deskripsi = $request->ds_txt;
            $n->diskon = $request->dk_txt;
            $n->img_dir = $filnam;

            $n->save();

            return redirect()->action([adminCTR::class, 'to_mPromo'])->with('berhasil', 'tambah');
        } else {
            $rul = [
                "nm_txt" => ["required"],
                "ds_txt" => ["required"],
                "dk_txt" => ["required", "min:0"]
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

    function to_dtlTicket(Request $request)
    {
        $tkt = Ticket::find($request->id);

        $berhasil = $request->session()->pull('berhasil');
        if ($berhasil == "ya") {
            echo "<script>alert('berhasil edit ticket')</script>";
        }
        else if($berhasil == "jadwal_ya"){
            echo "<script>alert('berhasil add jadwal')</script>";
        }
        else if($berhasil == "jadwal_edt"){
            echo "<script>alert('berhasil edit jadwal')</script>";
        }

        return view('admin/detailTicket', ["tkt" => $tkt]);
    }

    function cek_uptTicket(Request $request)
    {
        $n = Ticket::find($request->btn_id);

        $ctr = 0;
        if (($request->nama_txt != "" || $request->nama_txt != null) && $request->nama_txt != $n->nama) {
            $n->nama = $request->nama_txt;
            $ctr += 1;
        }

        if (($request->des_txt != "" || $request->des_txt != null) && $request->des_txt != $n->deskripsi) {
            $n->deskripsi = $request->des_txt;
            $ctr += 1;
        }

        if (($request->pr_txt != "" || $request->pr_txt != null) && $request->pr_txt != $n->provinsi_id) {
            $n->provinsi_id = $request->pr_txt;
            $ctr += 1;
        }

        if (($request->kt_txt != "" || $request->kt_txt != null) && $request->kt_txt != $n->kota_id) {
            $n->kota_id = $request->kt_txt;
            $ctr += 1;
        }

        if (($request->hr_txt != "" || $request->hr_txt != null) && $request->hr_txt != $n->harga) {
            $n->harga = $request->hr_txt;
            $ctr += 1;
        }

        if ($ctr == 0) {
            return redirect()->back();
        } else {
            $n->save();
            return redirect()->back()->with('berhasil', 'ya');
        }
    }

    function change_jadwal(Request $request)
    {
        if($request->action == "add"){
            $rul = [
                "hr_txt" => ["required"],
                "mulai_txt" => ["required"],
                "ahkir_txt" => ["required"],
                "kt_txt" => ["required","min:1"]
            ];
            $this->validate($request, $rul);
            $n = new Jadwal();
            $n->ticket_id = $request->btn_id;
            $n->hari = $request->hr_txt;
            $n->jam_awal = $request->mulai_txt;
            $n->jam_akhir = $request->ahkir_txt;
            $n->kuota = $request->kt_txt;
            $n->save();
            return redirect()->back()->with('berhasil', 'jadwal_add');
        }
        else if($request->action == "edit"){
            $n = Jadwal::find($request->btn_id);
            $ctr=0;

            if (($request->hr_txt != "" || $request->hr_txt != null) && $request->hr_txt != $n->hari) {
                $n->hari = $request->hr_txt;
                $ctr += 1;
            }

            if (($request->mulai_txt != "" || $request->mulai_txt  != null) && $request->mulai_txt  != $n->jam_awal) {
                $n->jam_awal = $request->mulai_txt ;
                $ctr += 1;
            }

            if (($request->ahkir_txt != "" || $request->ahkir_txt != null) && $request->ahkir_txt != $n->jam_akhir) {
                $n->jam_akhir = $request->ahkir_txt;
                $ctr += 1;
            }

            if (($request->kt_txt != "" || $request->kt_txt != null) && $request->kt_txt != $n->kuota) {
                $n->kuota = $request->kt_txt;
                $ctr += 1;
            }

            if($ctr==0){
                return redirect()->back();
            }
            else{
                $n->save();
                return redirect()->back()->with('berhasil', 'jadwal_edt');
            }
        }

        return response()->json($request);
    }

    function add_admin(Request $request)
    {
        $rul = [
            "nm_txt" => ['required'],
            "us_txt" => ['required', new cek_unique(User::all(), 'username', $request->us_txt)],
            "em_txt" => ['required', new cek_unique(User::all(), 'email', $request->em_txt), 'email'],
            "ps_txt" => ['required'],
            "kf_txt" => ['required', 'same:ps_txt'],
        ];

        $this->validate($request, $rul);

        if ($request->hasFile('ft_txt')) {
            Storage::putFileAs('/public/profile_photo', $request->file('ft_txt'), $request->us_txt . "." . $request->file('ft_txt')->getClientOriginalExtension());
            $filnam = 'storage/profile_photo/' . $request->us_txt . "." . $request->file('ft_txt')->getClientOriginalExtension();
        } else {
            $filnam = 'storage/profile_photo/def.png';
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

    function ban_user(Request $request)
    {
        $usr = User::find($request->id_user);
        if ($usr->isBan == 0) {
            $usr->isBan = 1;
        } else {
            $usr->isBan = 0;
        }
        $usr->save();
    }

    function load_tbuser(Request $request)
    {
        if ($request->key == "") {
            $arr = User::all();
        } else {
            $key = $request->key;
            $arr = User::where("username", 'like', '%' . $key . '%')->get();
        }

        return view('/admin/help/tb_user', ["arr" => $arr])->render();
    }

    function load_tbpromo(Request $request)
    {
        if ($request->key == "") {
            $arr = Promo::all();
        } else {
            $key = $request->key;
            $arr = Promo::where("kode", 'like', '%' . $key . '%')->get();
        }

        return view('/admin/help/tb_promo', ["arr" => $arr])->render();
    }

    function cari_promo(Request $request)
    {
        $arr = Promo::find($request->id_promo);
        return response()->json($arr);
    }

    function hapus_promo(Request $request)
    {
        Promo::destroy($request->id_promo);
    }

    function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    function load_kota(Request $request)
    {
        $arr = Kota::where('provinsi_id', '=', $request->id_pro)->get();
        if ($request->id_kot != null) {
            return view('/admin/help/opt_kota', ["arr" => $arr, "spc" => $request->id_kot])->render();
        }
        return view('/admin/help/opt_kota', ["arr" => $arr])->render();
    }

    function load_ticket(Request $request)
    {
        $sc = $request->sch;
        $pr = $request->pro;
        $kt = $request->kot;

        if ($sc == "" || $sc == null) {
            if ($pr == "no" || $pr == null) {
                $arr = Ticket::all();
            } else {
                if ($kt == "no" || $kt == null) {
                    $arr = Ticket::where('provinsi_id', '=', $pr)->get();
                } else {
                    $arr = Ticket::where([['provinsi_id', '=', $pr], ['kota_id', '=', $kt]])->get();
                }
            }
        } else {
            if ($pr == "no"  || $pr == null) {
                $arr = Ticket::where("nama", 'like', '%' . $sc . '%')->get();
            } else {
                if ($kt == "no" || $kt == null) {
                    $arr = Ticket::where([["nama", 'like', '%' . $sc . '%'], ['provinsi_id', '=', $pr]])->get();
                } else {
                    $arr = Ticket::where([["nama", 'like', '%' . $sc . '%'], ['provinsi_id', '=', $pr], ['kota_id', '=', $kt]])->get();
                }
            }
        }
        return view('/admin/help/tb_ticket', ["arr" => $arr])->render();
    }

    function to_delTicket(Request $request)
    {
        Ticket::destroy($request->id);
        return redirect()->action([adminCTR::class, 'to_mTicket'])->with('berhasil', 'hapus');
    }

    function load_jadwal(Request $request){
        $arr = Jadwal::where('ticket_id','=',$request->id_tik)->get();
        return view('/admin/help/tb_jadwal', ["arr" => $arr])->render();
    }

    function cari_jadwal(Request $request)
    {
        $arr = Jadwal::find($request->id_jadwal);
        return response()->json($arr);
    }

    function hapus_jadwal(Request $request)
    {
        Jadwal::destroy($request->id_jadwal);
    }
}
