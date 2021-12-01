<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class SignUp extends Component
{
    public $computedLogin;
    public $computedRegister;

    public function mount()
    {
        $this->computedLogin = "font-semibold text-lg";
    }

    public function setNavTab($active)
    {
        $this->computedLogin = $active === "login" ? "font-semibold text-lg" : "";
        $this->computedRegister = $active === "register" ? "font-semibold text-lg" : "";
    }

    public function render()
    {
        return view('livewire.components.sign-up');
    }
}
