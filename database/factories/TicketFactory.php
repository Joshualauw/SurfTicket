<?php

namespace Database\Factories;

use Illuminate\Support\Facades\Http;
use Illuminate\Database\Eloquent\Factories\Factory;

class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "nama" => $this->faker->word(),
            "img_dir" => "storage/banner_ticket/def.jpg",
            "deskripsi" => $this->faker->text(200),
            "harga" => rand(1, 10) * 50000
        ];
    }
}
