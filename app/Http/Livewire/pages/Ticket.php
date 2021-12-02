<?php

namespace App\Http\Livewire\Pages;

use App\Models\Ticket as ModelsTicket;
use Livewire\Component;
use Illuminate\Http\Request;

class Ticket extends Component
{
    public $ticket;

    public function mount(Request $request)
    {
        $this->ticket = ModelsTicket::find($request->id);
    }

    public function render()
    {
        return view('livewire.pages.ticket')
            ->extends('layouts.app')
            ->section('content');
    }
}
