<?php

namespace App\Http\Livewire\Pages;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Mytickets extends Component
{
    public $htrans;

    public function mount()
    {
        $this->htrans = Auth::user()->htransaksi;
    }

    public function render()
    {
        return view('livewire.pages.mytickets')
            ->extends('layouts.app')
            ->section('content');;
    }
}
