<?php

namespace Database\Seeders;

use App\Models\Provinsi;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class ProvinsiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $response = Http::get("https://api.binderbyte.com/wilayah/provinsi?api_key=b90b3515a9df03747698b3748cfc2d807379a7bf373b114e94edd18ca427ce9b")->json();
        foreach ($response["value"] as $d) {
            Provinsi::create([
                "id" => $d["id"],
                "nama" => $d["name"]
            ]);
        }
    }
}
