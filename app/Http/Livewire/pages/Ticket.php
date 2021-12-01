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

    public $jadwal = [
        [
            "id" => 1,
            "hari" => "senin",
            "jam" => "08.00 - 12.00",
            "kuota" => 20
        ],
        [
            "id" => 2,
            "hari" => "senin",
            "jam" => "14.00 - 16.00",
            "kuota" => 20
        ],
        [
            "id" => 3,
            "hari" => "rabu",
            "jam" => "08.00 - 12.00",
            "kuota" => 20
        ]
    ];

    public $buyTickets;

    public function mount()
    {
        $this->buyTickets = [];
        for ($i = 0; $i < count($this->jadwal); $i++) {
            $this->buyTickets[$i] = 0;
        }
    }

    public function decKuota($ctr)
    {
        $this->buyTickets[$ctr]--;
    }

    public function incKuota($ctr)
    {
        $this->buyTickets[$ctr]++;
    }

    public function render()
    {
        return view('livewire.pages.ticket')
            ->extends('layouts.app')
            ->section('content');
    }
}
