<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class Home extends Component
{
    public function render()
    {
        return view('livewire.pages.home')
            ->extends('layouts.app')
            ->section('content');
    }
}
