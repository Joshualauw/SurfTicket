<?php

namespace Database\Seeders;

use App\Models\Kota;
use App\Models\Provinsi;
use App\Models\Ticket;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ticket::factory()->count(20)->state(new Sequence(
            function () {
                $provinsi = Provinsi::all()->random();
                return [
                    "provinsi_id" => $provinsi,
                    "kota_id" => Kota::where("provinsi_id", "=", $provinsi->id)->get()->random()
                ];
            }
        ))->create();
    }
}
