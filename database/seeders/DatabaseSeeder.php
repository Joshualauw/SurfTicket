<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            ProvinsiSeeder::class,
            KotaSeeder::class,
            PromoSeeder::class,
            UserSeeder::class,
            TicketSeeder::class,
            JadwalSeeder::class,
            ReviewSeeder::class,
            TransaksiSeeder::class
        ]);
    }
}
