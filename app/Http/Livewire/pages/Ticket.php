<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;
use Illuminate\Http\Request;

class Ticket extends Component
{
    public $ticket = [
        "id" => 2,
        "nama" => "Inazuma City",
        "img_dir" => "https://static.wikia.nocookie.net/gensin-impact/images/4/43/Inazuma_City.png",
        "deskripsi" => "Inazuma's most lively and prosperous area, where most of Inazuma's population lives. From Hanamizaka to the streets of the city, you can follow the trail to visit local traditional shops and sample Inazuma specialties.",
        "provinsi" => "Jawa Timur",
        "kota" => "Surabaya",
        "kecamatan" => "Lakarsantri",
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
