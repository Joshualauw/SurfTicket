<?php

namespace App\Http\Livewire\Components;

use App\Models\Kota;
use App\Models\Provinsi;
use Livewire\Component;

class TheFilter extends Component
{
    public $searchFilter = "";
    public $provinsiFilter = "all";
    public $kotaFilter = "all";

    public function render()
    {
        $this->emit("filterChanged", [
            "searchFilter" => $this->searchFilter,
            "provinsiFilter" => $this->provinsiFilter,
            "kotaFilter" => $this->kotaFilter
        ]);

        return view('livewire.components.the-filter', [
            "provinsis" => Provinsi::all(),
            "kotas" => Kota::where("provinsi_id", "=", $this->provinsiFilter)->get()
        ]);
    }
}
