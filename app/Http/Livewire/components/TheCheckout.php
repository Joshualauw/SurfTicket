<?php

namespace App\Http\Livewire\Components;

use App\Models\HTransaksi;
use App\Models\Promo;
use App\Models\Jadwal;
use Livewire\Component;
use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

class TheCheckout extends Component
{
    use WithFileUploads;

    public $jadwals = [];
    public $totalHarga = 0;
    public $isPromo = "";
    public $totalSetelahDiskon = 0;
    public $kodePromo;
    public $img_file;

    public function mount(Request $request)
    {
        $jadwals = json_decode($request->jadwals, true);

        foreach ($jadwals as $jadwal) {
            $this->totalHarga += $jadwal["total"];
            array_push($this->jadwals, [
                "item" => Jadwal::find($jadwal["id"]),
                "jumlah" => $jadwal["jumlah"],
            ]);
        }
    }

    public function applyPromo()
    {
        $promo = Promo::where(strtolower("kode"), "=", strtolower($this->kodePromo))->first();
        if ($promo != null) {
            session()->flash("flash", ["promo berhasil dipasang", "success"]);
            $this->totalSetelahDiskon = $this->totalHarga - (($this->totalHarga * $promo->diskon) / 100);
            $this->isPromo = "line-through";
        } else {
            session()->flash("flash", ["kode promo invalid", "error"]);
            $this->totalSetelahDiskon = 0;
            $this->isPromo = "";
        }
    }

    public function cancel()
    {
        return redirect('/ticket/' . $this->jadwals[0]["item"]["ticket"]["id"]);
    }

    public function checkout()
    {
        $totalHarga = $this->totalSetelahDiskon == 0 ? $this->totalHarga : $this->totalSetelahDiskon;
        if ($this->img_file != null) {
            Storage::putFileAs("/public/bukti_transfer", $this->img_file, Carbon::now()->format("ydmhis") . "." . $this->img_file->extension());
            $img_dir = "storage/bukti_transfer/" . Carbon::now()->format("ydmhis") . "." . $this->img_file->extension();
        } else {
            session()->flash("flash", ["Belum upload bukti transfer!", "error"]);
            return;
        }

        HTransaksi::create([
            "ticket_id" => $this->jadwals[0]["item"]["ticket"]["id"],
            "user_id" => Auth::user()->id,
            "total" => $totalHarga,
            "img_dir" => $img_dir
        ]);

        foreach ($this->jadwals as $jadwal) {
            Transaksi::create([
                "transaksi_id" => HTransaksi::latest()->first()->id,
                "jadwal_id" => $jadwal["item"]["id"],
                "jumlah" => $jadwal["jumlah"],
            ]);
            $target = Jadwal::find($jadwal["item"]["id"]);
            $target->kuota -= $jadwal["jumlah"];
            $target->save();
        }
        session()->flash("flash", ["sukses membeli tiket!", "success"]);
        return redirect("home");
    }

    public function render()
    {
        return view('livewire.components.the-checkout');
    }
}
