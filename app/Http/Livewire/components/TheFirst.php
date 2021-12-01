<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class TheFirst extends Component
{
    public $prefix = ["murah?", "mudah?", "cepat?", "praktis?", "istimewa?", "terpercaya?", "aman?"];
    public $backgroundImages = [
        "https://media.istockphoto.com/photos/spire-cove-picture-id1309140666?b=1&k=20&m=1309140666&s=170667a&w=0&h=3XV7byzsCPRqDxCmcgu9VBmJod9XvqKirWgd5D-IVCo=",
        "https://media.istockphoto.com/photos/tropical-white-sand-beach-with-coco-palms-picture-id1181563943?k=20&m=1181563943&s=612x612&w=0&h=r46MQMvFnvrzzTfjVmvZED5nZyTmAYwISDvkdtM2i2A="
    ];
    public $backgroundImage;
    public $isFirstBackground;
    public $intro;

    public function mount()
    {
        $this->isFirstBackground = false;
        $this->backgroundImage = $this->backgroundImages[$this->isFirstBackground];
    }

    public function swapBackground()
    {
        $this->isFirstBackground = !$this->isFirstBackground;
        $this->backgroundImage = $this->backgroundImages[$this->isFirstBackground];
    }

    public function changeIntro()
    {
        do {
            $rand = $this->prefix[array_rand($this->prefix)];
        } while ($this->intro == $rand);

        return $this->intro = $rand;
    }

    public function render()
    {
        return view('livewire.components.the-first', [
            "intro" => $this->changeIntro()
        ]);
    }
}
