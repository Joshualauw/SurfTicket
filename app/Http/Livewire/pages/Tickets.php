<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;

class Tickets extends Component
{
    public function render()
    {
        return view('livewire.pages.tickets')
            ->extends('layouts.app')
            ->section('content');;
    }
}
