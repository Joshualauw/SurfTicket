<?php

namespace App\Http\Livewire\Components;

use App\Models\Ticket;
use Livewire\Component;

class ListTicket extends Component
{
    public $layout = 'grid';
    public $tickets;

    protected $listeners = [
        "filterChanged"
    ];

    public function filterChanged($param)
    {

        $queries = [];
        $searchQuery = ["nama", "like", '%' . $param["searchFilter"] . '%'];
        $provinsiQuery = ["provinsi_id", "=", $param["provinsiFilter"]];
        $kotaQuery = ["kota_id", "=", $param["kotaFilter"]];

        if ($param["searchFilter"] != null) {
            array_push($queries, $searchQuery);
        }
        if ($param["provinsiFilter"] != null) {
            array_push($queries, $provinsiQuery);
        }
        if ($param["kotaFilter"] != null) {
            array_push($queries, $kotaQuery);
        }

        if ($queries != []) {
            $this->tickets = Ticket::where($queries)->get();
        } else {
            $this->tickets = Ticket::all();
        }
    }

    public function mount($layout)
    {
        $this->layout = $layout;
        $this->tickets = Ticket::all();
    }

    public function render()
    {
        return view('livewire.components.list-ticket', [
            "tickets" => $this->tickets
        ]);
    }
}
