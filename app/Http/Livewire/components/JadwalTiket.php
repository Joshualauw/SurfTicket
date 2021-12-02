<?php

namespace App\Http\Livewire\Components;

use App\Models\Jadwal;
use Livewire\Component;

class JadwalTiket extends Component
{
    public $totalBiaya;
    public $totalTicket;
    public $totalJadwal;

    public $buyTickets;
    public $hargaTiket;
    public $jadwal;

    public function mount($ticket)
    {
        $this->totalBiaya = 0;
        $this->totalTicket = 0;
        $this->buyTickets = [];
        $this->hargaTiket = $ticket->harga;
        $this->jadwal = Jadwal::where("ticket_id", "=", $ticket->id)->get();
        $this->totalJadwal = count($this->jadwal);

        for ($i = 0; $i < count($this->jadwal); $i++) {
            $this->buyTickets[$i] = 0;
            $this->totalTicket += $this->jadwal[$i]->kuota;
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
