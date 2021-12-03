<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "username" => "admin",
            "nama" => "Owner",
            "password" => bcrypt('admin'),
            "email" => "owner@gmail.com",
            'isAdmin' => true,
            'img_dir' => "storage/profile_photo/min.jpg"
        ]);
        User::factory()->count(15)->create();
    }
}
