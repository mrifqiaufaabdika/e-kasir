<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenggajian extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penggajian', function (Blueprint $table) {
            $table->id();
            $table->integer("id_pegawai")->unsigned();
            $table->date("tanggal");
            $table->text("keterangan");
            $table->double("jumlah_gaji_pokok");
            $table->double("jumlah_gaji_upah");
            $table->double("jumlah_gaji_bonus");
            $table->double("potongan");
            $table->double("total");

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
        Schema::dropIfExists('penggajian');
    }
}
