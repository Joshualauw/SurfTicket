<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Http;

class PromoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "nama" => $this->faker->name,
            "kode" => $this->faker->word,
            "deskripsi" => $this->faker->text(100),
            "img_dir" => $this->faker->imageUrl(400, 400, "discount", true),
            "diskon" => rand(1, 50)
        ];
    }
}
