<?php

namespace App\Http\Livewire\Components;

use App\Models\HTransaksi;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class TheReview extends Component
{
    use WithPagination;

    public $ticket;
    public $averageScore;
    public $reviewRating = 1;
    public $reviewText;

    public $userReview;
    public $isEdit = false;


    public function setRating($key)
    {
        $this->reviewRating = $key + 1;
    }

    public function tambahReview()
    {
        if (Auth::check()){
            $htrans = HTransaksi::where([["user_id", "=", Auth::user()->id], ["ticket_id", "=", $this->ticket->id]])->first();
            if ($htrans != null){
                if ($htrans->status == "dikonfirmasi"){
                    if (!$this->isEdit){
                        Review::create([
                            "user_id" => Auth::user()->id,
                            "ticket_id" => $this->ticket->id,
                            "rating" => $this->reviewRating,
                            "comment" => $this->reviewText
                        ]);
                    }else{
                        $this->userReview->update([
                            "rating" => $this->reviewRating,
                            "comment" => $this->reviewText
                        ]);
                    }
                    $this->reset(["reviewRating", "reviewText"]);
                    session()->flash("flash", ["Berhasil Menambahkan review!", "success"]);
                }else{
                    session()->flash("flash", ["Belum beli tiket belum boleh review", "error"]);
                }
            }else{
                session()->flash("flash", ["Belum beli tiket belum boleh review", "error"]);
            }
        }else{
            session()->flash("flash", ["Anda harus login terlebih dahulu", "error"]);
        }
    }

    public function mount($ticket)
    {
        $this->ticket = $ticket;
        $this->averageScore = $this->ticket->review->pluck('rating')->avg();
    }

    public function render()
    {
        $reviews = Review::where("ticket_id", "=", $this->ticket->id)->paginate(3);
        $this->userReview = Review::where([["user_id", "=", Auth::user()->id], ["ticket_id", "=", $this->ticket->id]])->first();
        if ($this->userReview != null){
            $this->isEdit = true;
        }
        return view('livewire.components.the-review', [
            "reviews" => $reviews
        ]);
    }
}
