<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Main extends Component
{
    protected $listeners = [
        'loginFailed',
        'loginSuccess',
        'registerSuccess'
    ];

    public function registerSuccess()
    {
        session()->flash("flash", ["title" => 'Sukses!', "message" => "Berhasil Mendaftar", "type" => "success"]);
    }

    public function loginSuccess($request)
    {
        dd("test");
        $request->session()->regenerate();
        session()->flash("flash", ["title" => 'Sukses!', "message" => "Berhasil login", "type" => "success"]);
        if (Auth::user()->isAdmin) {
            return redirect()->to("/admin");
        }
        return redirect()->to('/home');
    }

    public function loginFailed()
    {
        dd("test");
        session()->flash("flash", ["title" => 'Gagal!', "message" => "invalid credentials", "type" => "error"]);
    }

    public function render()
    {
        return view('livewire.pages.main')
            ->extends('layouts.app')
            ->section('content');
    }
}
