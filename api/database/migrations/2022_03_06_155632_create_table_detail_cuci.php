<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableDetailCuci extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_cuci', function (Blueprint $table) {
            $table->bigInteger('id_detail_cuci');
            $table->bigInteger('id_detail_faktur');
            $table->bigInteger('id_pegawai');
            $table->string('nama_komisi');
            $table->bigInteger('id_kendaraan')->nullable();
            $table->double('nominal_komisi')->nullable();
//            $table->json('dilayani');  //value array of id pegawai

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
        Schema::dropIfExists('detail_cuci');
    }
}
