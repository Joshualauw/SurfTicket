<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;

class Settings extends Component
{
    public function render()
    {
        return view('livewire.pages.settings')
            ->extends('layouts.app')
            ->section('content');
    }
}
