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
            $response = Http::get("https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi=" . $provinsi["id"])->json();
            foreach ($response["kota_kabupaten"] as $d) {
                Kota::create([
                    "id" => $d["id"],
                    "provinsi_id" => $d["id_provinsi"],
                    "nama" => $d["nama"]
                ]);
            }
        }
    }
}
