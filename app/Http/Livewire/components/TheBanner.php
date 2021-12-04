<?php

namespace App\Http\Livewire\Components;

use App\Models\Promo;
use Livewire\Component;

class TheBanner extends Component
{
    public $images;

    public function mount()
    {
        $this->images = Promo::all();
    }

    public function render()
    {
        return view('livewire.components.the-banner');
    }
}
