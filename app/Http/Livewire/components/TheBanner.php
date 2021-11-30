<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class TheBanner extends Component
{
    public $image = ["https://oyster.ignimgs.com/mediawiki/apis.ign.com/genshin-impact/0/01/2020-11-10_Farewell_of_Snezhnaya.jpg?width=1280", "https://foto.kontan.co.id/UGT1GUE07cQPxVSyYyL-ihLsQ6k=/smart/2021/02/03/985934458p.jpg", "https://assets.pikiran-rakyat.com/crop/0x0:0x0/x/photo/2020/10/18/1335768913.jpg", "https://gamedaim.com/wp-content/uploads/2021/07/Gentry-of-Hermitage-2-800x395.jpg"];

    public $imgCounter = 0;
    public $bannerCount = 4;

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
