<?php

namespace Database\Seeders;

use App\Models\HTransaksi;
use App\Models\Jadwal;
use App\Models\Ticket;
use App\Models\Transaksi;
use App\Models\User;
use Database\Factories\TransaksiFactory;
use Faker\Factory;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class HTransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Factory::create();
        for ($i=0; $i < 150; $i++) {
            $j = new HTransaksi();
            $j->status = "dikonfirmasi";
            $j->img_dir = "storage/bukti_transfer/def.jpg";
            $j->kode_unik = strtoupper($faker->regexify('[A-Za-z0-9]{20}'));
            $j->tanggal_acc = date_format($faker->dateTimeThisYear,"Y-m-d");
            $j->user_id = User::all()->random(1)->first()->id;
            $bnyk = rand(1,10);
            $ticket = Ticket::all()->random(1)->first();
            $j->ticket_id = $ticket->id;
            $j->total = $ticket->harga * $bnyk;
            $j->save();

            $k = new Transaksi();
            $k->transaksi_id = $i;
            $k->jumlah = $bnyk;
            $k->jadwal_id = Jadwal::all()->random(1)->first()->id;
            $k->save();
        }

        // HTransaksi::factory()->count(50)->state(new Sequence(
        //     function () {
        //         $bnyk = rand(1,10);
        //         $user = User::all()->random();
        //         $ticket = Ticket::all()->random();
        //         return [
        //             "user_id" => $user,
        //             "ticket_id" => $ticket->id,
        //             "total" => $ticket->harga * $bnyk
        //         ];
        //     }
        // ))
        // ->has(Transaksi::factory()
        //     ->state(new Sequence(
        //         function(){
        //             return[
        //                 "jumlah" => rand(1,5),
        //                 "jadwal_id" => Jadwal::all()->random(),
        //                 "transaksi_id" =>
        //             ];
        //         }
        //     ))
        // )
        // ->create();
    }
}
