<?php

namespace Database\Seeders;

use App\Models\Kota;
use App\Models\Provinsi;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class KotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        foreach (Provinsi::all() as $provinsi) {
            $response = Http::get("https://api.binderbyte.com/wilayah/kabupaten?api_key=b90b3515a9df03747698b3748cfc2d807379a7bf373b114e94edd18ca427ce9b&id_provinsi=" . $provinsi["id"])->json();
            foreach ($response["value"] as $d) {
                Kota::create([
                    "id" => $d["id"],
                    "provinsi_id" => $d["id_provinsi"],
                    "nama" => $d["name"]
                ]);
            }
        }
    }
}
