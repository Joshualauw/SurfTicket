<?php

namespace App\Http\Livewire\Components;

use Illuminate\Http\Request;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class TheHeader extends Component
{
    public $isOpen;

    public function toogleDropdown()
    {
        $this->isOpen = !$this->isOpen;
    }

    public function signOut(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function mount()
    {
        $this->isOpen = false;
    }

    public function render()
    {
        return view('livewire.components.the-header');
    }
}
