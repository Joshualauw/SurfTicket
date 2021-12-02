<?php

namespace App\Http\Livewire\Components;

use App\Models\Ticket;
use Livewire\Component;
use Livewire\WithPagination;

use function PHPUnit\Framework\isEmpty;

class ListTicket extends Component
{
    use WithPagination;

    public $layout = 'grid';
    public $data;
    public $param;

    protected $listeners = [
        "filterChanged"
    ];

    public function filterChanged($param)
    {
        $this->param = $param;
    }

    public function mount($layout)
    {
        $this->layout = $layout;
        $this->param = [
            "searchFilter" => "",
            "provinsiFilter" => "all",
            "kotaFilter" => "all"
        ];
    }

    public function render()
    {
        if ($this->layout == "grid") {
            $queries = [];
            $tickets = Ticket::paginate(12);

            $searchQuery = ["nama", "like", '%' . $this->param["searchFilter"] . '%'];
            $provinsiQuery = ["provinsi_id", "=", $this->param["provinsiFilter"]];
            $kotaQuery = ["kota_id", "=", $this->param["kotaFilter"]];

            if ($this->param["searchFilter"] != "") {
                array_push($queries, $searchQuery);
            }
            if ($this->param["provinsiFilter"] != "all") {
                array_push($queries, $provinsiQuery);
            }
            if ($this->param["provinsiFilter"] != "all" && $this->param["kotaFilter"] != "all") {
                array_push($queries, $kotaQuery);
            }

            if ($queries != []) {
                $tickets = Ticket::where($queries)->paginate(12);
            }
        } else if ($this->layout == 'scroll') {
            $tickets = Ticket::latest()->take(6)->get();
        } else {
            $tickets = Ticket::inRandomOrder()->limit(6)->get();
        }

        return view('livewire.components.list-ticket', [
            "tickets" => $tickets
        ]);
    }
}
