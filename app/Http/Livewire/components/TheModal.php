<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class TheModal extends Component
{
    public $message;
    public $type;

    public function mount($flash)
    {
        $this->message = $flash[0];
        $this->type = $flash[1];
    }

    public function render()
    {
        return view('livewire.components.the-modal');
    }
}
