<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class HTransaksiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "status" => "dikonfirmasi",
            "img_dir" => "storage/bukti_transfer/def.jpg",
            "kode_unik" => strtoupper($this->faker->unique()->regexify('[A-Za-z0-9]{20}')),
            "tanggal_acc" => date_format($this->faker->dateTimeThisYear,"Y-m-d")
        ];
    }
}
