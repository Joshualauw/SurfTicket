<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'username' => $this->faker->userName(),
            'nama' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => bcrypt($this->faker->word()), // password
            'alamat' => $this->faker->title(),
            'no_telp' => $this->faker->phoneNumber(),
            "img_dir" => $this->faker->imageUrl(400, 400, "people", true),
            'tanggal_lahir' => $this->faker->date(),
            'isAdmin' => false
        ];
    }
}
