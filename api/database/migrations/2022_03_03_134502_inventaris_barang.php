<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InventarisBarang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('inventaris_barang', function (Blueprint $table) {
            $table->string("id_inventaris_barang")->primary();
            $table->string("id_barang");
            $table->string("id_pencatat",200);
            $table->string("jumlah");
            $table->string("jenis_inventaris");
            $table->string("keterangan");
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
        //
        Schema::dropIfExists('inventaris_barang');
    }
}
