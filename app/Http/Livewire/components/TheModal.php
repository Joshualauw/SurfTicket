<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class TheModal extends Component
{
    public $message;
    public $type;
    // public $bgColor;

    public function mount($flash)
    {
        $this->message = $flash[0];
        $this->type = $flash[1];
        // if ($this->type == "success") {
        //     $this->bgColor = "bg-green-500";
        // } else {
        //     $this->bgColor = "bg-red-500";
        // }
    }

    public function render()
    {
        return view('livewire.components.the-modal');
    }
}
