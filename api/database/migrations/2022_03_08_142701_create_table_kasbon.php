<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableKasbon extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kasbon', function (Blueprint $table) {
            $table->bigInteger('nomor_faktur')->primary();
            $table->bigInteger('pencatat');
            $table->bigInteger('peminjam');
            $table->double('total');
            $table->enum("Status",["Lunas","Belum"]);
            $table->date("tempo");
            $table->json("riyawat_bayar");
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
        Schema::dropIfExists('table_kasbon');
    }
}
