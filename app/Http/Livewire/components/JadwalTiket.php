<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class JadwalTiket extends Component
{
    public $buyTickets;
    public $totalBiaya;
    public $hargaTiket;

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
        ],
        [
            "id" => 4,
            "hari" => "kamis",
            "jam" => "08.00 - 12.00",
            "kuota" => 20
        ],
        [
            "id" => 5,
            "hari" => "sabtu",
            "jam" => "08.00 - 12.00",
            "kuota" => 20
        ],
        [
            "id" => 6,
            "hari" => "minggu",
            "jam" => "08.00 - 12.00",
            "kuota" => 20
        ],
    ];

    public function mount()
    {
        $this->totalBiaya = 0;
        $this->buyTickets = [];
        $this->hargaTiket = 100000;

        for ($i = 0; $i < count($this->jadwal); $i++) {
            $this->buyTickets[$i] = 0;
        }
    }

    public function updateTotalBiaya()
    {
        $biaya = 0;
        for ($i = 0; $i < count($this->jadwal); $i++) {
            $biaya += $this->buyTickets[$i] * $this->hargaTiket;
        }
        $this->totalBiaya = $biaya;
    }

    public function decrementKuota($ctr)
    {
        if ($this->buyTickets[$ctr] > 0) {
            $this->buyTickets[$ctr]--;
            $this->updateTotalBiaya();
        }
    }

    public function incrementKuota($ctr)
    {
        if ($this->buyTickets[$ctr] < $this->jadwal[$ctr]['kuota']) {
            $this->buyTickets[$ctr]++;
            $this->updateTotalBiaya();
        }
    }

    public function render()
    {
        return view('livewire.components.jadwal-tiket');
    }
}
