<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('h_transaksis', function (Blueprint $table) {
            $table->id();
            $table->foreignId("ticket_id");
            $table->foreignId("user_id");
            $table->integer("total");
            $table->enum("status", ["menunggu", "dikonfirmasi", "ditolak"]);
            $table->text("img_dir");
            $table->date('tanggal_acc')->nullable();
            $table->string("kode_unik")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('h_transaksis');
    }
}
