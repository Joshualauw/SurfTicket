<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class JadwalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $hari = ["senin", "selasa", "rabu", "kamis", "jumat", "sabtu", "minggu"];
        return [
            "hari" => $hari[array_rand($hari)],
            "jam_awal" => $this->faker->time,
            "jam_akhir" => $this->faker->time,
            "kuota" => rand(1, 100)
        ];
    }
}
