<?php

namespace App\Http\Livewire\Pages;

use App\Models\HTransaksi;
use Illuminate\Http\Request;
use Livewire\Component;

class Invoice extends Component
{
    public $ht;

    public function mount(Request $request)
    {
        $this->ht = HTransaksi::find($request->id);
    }

    public function render()
    {
        return view('livewire.pages.invoice');
    }
}
