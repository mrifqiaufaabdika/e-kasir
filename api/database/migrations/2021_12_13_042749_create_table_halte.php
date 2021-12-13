<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableHalte extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('halte', function (Blueprint $table) {
            $table->id();
            $table->string('nama_halte');
            $table->string('alamat');
            $table->string('koordinat');
            $table->string('tipe');
            $table->string('transit');
            $table->string('rute_singgah');
            $table->smallInteger('kapasitas');
            $table->string('status');
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
        Schema::dropIfExists('halte');
    }
}
