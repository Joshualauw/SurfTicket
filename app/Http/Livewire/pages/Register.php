<?php

namespace App\Http\Livewire\Pages;

use App\Models\User;
use Livewire\Component;
use Illuminate\Http\Request;

class Register extends Component
{
    public $username;
    public $name;
    public $email;
    public $alamat;
    public $no_telp;
    public $confirm_password;


    public function registerUser(Request $request)
    {
    }

    public function render()
    {
        return view('livewire.pages.register')
            ->extends('layouts.app')
            ->section('content');
    }
}
