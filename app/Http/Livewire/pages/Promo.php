<?php

namespace App\Http\Livewire\Pages;

use App\Models\Promo as ModelsPromo;
use Illuminate\Http\Request;
use Livewire\Component;

class Promo extends Component
{
    public $promo;

    public function mount(Request $request)
    {
        $this->promo = ModelsPromo::find($request->id);
    }

    public function render()
    {
        return view('livewire.pages.promo')
            ->extends('layouts.app')
            ->section('content');
    }
}
