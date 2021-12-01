<?php

namespace Database\Seeders;

use App\Models\Jadwal;
use App\Models\Ticket;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class JadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jadwal::factory()->count(20)->state(new Sequence(
            function () {
                return [
                    "ticket_id" => Ticket::all()->random()
                ];
            }
        ))->create();
    }
}
