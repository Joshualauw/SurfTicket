<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class TheFirst extends Component
{
    public $prefix = ["murah?", "mudah?", "cepat?", "praktis?", "istimewa?", "terpercaya?", "aman?"];
    public $intro;

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
