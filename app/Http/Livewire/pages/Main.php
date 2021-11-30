<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;

class Main extends Component
{
    public function render()
    {
        return view('livewire.pages.main')
            ->extends('layouts.app')
            ->section('content');
    }
}
