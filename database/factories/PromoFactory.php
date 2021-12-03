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
            "kode" => $this->faker->unique()->word,
            "deskripsi" => $this->faker->text(100),
            "img_dir" => 'storage/banner_promo/def.jpg',
            "diskon" => rand(1, 50)
        ];
    }
}
