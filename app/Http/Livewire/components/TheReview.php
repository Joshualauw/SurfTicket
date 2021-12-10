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

    public $isEdit = false;
    public $userReview;


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
                    if (!$this->isEdit){
                        $this->reset(["reviewRating", "reviewText"]);
                        session()->flash("flash", ["Berhasil Menambahkan review!", "success"]);
                    }else{
                        session()->flash("flash", ["Berhasil Update review!", "success"]);
                    }
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
        if (Auth::check()){
            $this->userReview = Review::where([["ticket_id", "=", $this->ticket->id], ["user_id", "=", Auth::user()->id]])->first();
            if ($this->userReview != null){
                $this->reviewRating = $this->userReview->rating;
                $this->reviewText = $this->userReview->comment;
                $this->isEdit = true;
            }
        }
    }

    public function render()
    {
        $reviews = Review::where("ticket_id", "=", $this->ticket->id)->paginate(3);
        if (Auth::check()){
            $reviews = Review::where([["ticket_id", "=", $this->ticket->id], ["user_id", "!=", Auth::user()->id]])->paginate(3);
        }
        return view('livewire.components.the-review', [
            "reviews" => $reviews
        ]);
    }
}
