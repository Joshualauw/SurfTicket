<?php

namespace App\Http\Livewire\Components;

use App\Models\Promo;
use Livewire\Component;

class TheBanner extends Component
{
    public $image;
    public $imgCounter;
    public $bannerCount;

    public function mount()
    {
        $this->imgCounter = 0;
        $this->image = Promo::pluck('img_dir');
        $this->bannerCount = Promo::all()->count();
    }

    public function swipeLeft()
    {
        $this->imgCounter--;
        if ($this->imgCounter < 0) {
            $this->imgCounter = $this->bannerCount - 1;
        }
    }

    public function swipeRight()
    {
        $this->imgCounter++;
        if ($this->imgCounter > $this->bannerCount - 1) {
            $this->imgCounter = 0;
        }
    }

    public function imageIndex($idx)
    {
        if ($idx < 0) {
            return $this->bannerCount - 1;
        } else if ($idx > $this->bannerCount - 1) {
            return 0;
        }
        return $idx;
    }

    public function render()
    {
        return view('livewire.components.the-banner', [
            "img1" => $this->image[$this->imageIndex($this->imgCounter - 1)],
            "img2" => $this->image[$this->imageIndex($this->imgCounter)],
            "img3" => $this->image[$this->imageIndex($this->imgCounter + 1)]
        ]);
    }
}
