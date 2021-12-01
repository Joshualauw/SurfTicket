<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class TheBanner extends Component
{
    public $image = [
        "https://s-light.tiket.photos/t/01E25EBZS3W0FY9GTG6C42E1SE/discovery-mobile/promo/2021/09/23/6fe44ff2-4895-4fc4-a45b-c09899f1335b-1632392917482-04349ba60c9ed962f4159e3f10938916.png",
        "https://foto.kontan.co.id/UGT1GUE07cQPxVSyYyL-ihLsQ6k=/smart/2021/02/03/985934458p.jpg",
        "https://cdn4.vectorstock.com/i/1000x1000/68/23/special-promotion-buy-now-mega-discount-only-month-vector-23056823.jpg",
        "https://media.istockphoto.com/vectors/flash-sale-discount-banner-template-promotion-design-for-business-vector-id1173515188"
    ];

    public $imgCounter;
    public $bannerCount;

    public function mount()
    {
        $this->imgCounter = 0;
        $this->bannerCount = 4;
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
