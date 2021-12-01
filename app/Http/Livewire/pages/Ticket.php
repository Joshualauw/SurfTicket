<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;
use Illuminate\Http\Request;

class Ticket extends Component
{
    public $ticket = [
        "id" => 2,
        "nama" => "Eco Green Park",
        "img_dir" => "https://tempatasik.com/wp-content/uploads/2019/08/eco-green-park.jpg",
        "deskripsi" => "Di tempat wisata ini kalian bisa puas mengelilingi banyak wahana yang ada sekaligus belajar banyak tentang alam. Tentunya semua wahana yang ada di Eco Green Park bisa dinikmati oleh semua anggota keluarga.",
        "provinsi" => "Jawa Timur",
        "kota" => "Batu",
        "kecamatan" => "Batu",
        "harga" => 100000
    ];

    public function render()
    {
        return view('livewire.pages.ticket')
            ->extends('layouts.app')
            ->section('content');
    }
}
