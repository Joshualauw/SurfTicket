<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class TheHeader extends Component
{
    public $isOpen;

    public function toogleDropdown()
    {
        $this->isOpen = !$this->isOpen;
    }

    public function mount()
    {
        $this->isOpen = false;
    }

    public function render()
    {
        return view('livewire.components.the-header');
    }
}
