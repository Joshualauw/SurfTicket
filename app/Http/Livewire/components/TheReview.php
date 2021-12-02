<?php

namespace App\Http\Livewire\Components;

use App\Models\Review;
use Livewire\Component;

class TheReview extends Component
{
    public $reviews;
    public $averageScore;

    public function mount($reviews)
    {
        $this->reviews = $reviews;
        $this->averageScore = $reviews->pluck('rating')->avg();
    }

    public function render()
    {
        return view('livewire.components.the-review');
    }
}
