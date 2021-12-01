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
        $response = Http::get("https://dev.farizdotid.com/api/daerahindonesia/provinsi")->json();
        foreach ($response["provinsi"] as $d) {
            Provinsi::create([
                "id" => $d["id"],
                "nama" => $d["nama"]
            ]);
        }
    }
}
