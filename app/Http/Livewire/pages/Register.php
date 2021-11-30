<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;

class Register extends Component
{
    public $username;
    public $name;
    public $email;
    public $alamat;
    public $no_telp;


    public function registerUser()
    {
    }

    public function render()
    {
        return view('livewire.pages.register')
            ->extends('layouts.app')
            ->section('content');
    }
}
