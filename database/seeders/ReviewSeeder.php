<?php

namespace Database\Seeders;

use App\Models\Review;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Review::factory()->count(20)->state(new Sequence(
            function () {
                return [
                    "user_id" => User::all()->random(),
                    "ticket_id" => Ticket::all()->random()
                ];
            }
        ))->create();
    }
}
