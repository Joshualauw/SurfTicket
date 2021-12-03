<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class TheModal extends Component
{
    public $title;
    public $message;
    public $type;

    public function mount($flash)
    {
        $this->title = $flash['title'];
        $this->message = $flash['message'];
        $this->type = $flash['type'];
    }

    public function render()
    {
        return view('livewire.components.the-modal');
    }
}
