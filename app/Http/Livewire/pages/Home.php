<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class Home extends Component
{
    public function render()
    {
        // dd(Http::get("https://api.unsplash.com/photos/random?topics=tour&client_id=Utqk-F4JBnop-vjs7aLzcowMOoXnwqs4ikZLy-X5V5c")->json()["urls"][]);
        return view('livewire.pages.home')
            ->extends('layouts.app')
            ->section('content');
    }
}
