<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableKomisi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('komisi', function (Blueprint $table) {
            $table->string('id',120)->primary();
            $table->string('nama_grup',200);
            $table->enum('type',['Transaksi','Produk']);
            $table->double('nominal_komisi')->nullable();
            $table->double('persen')->nullable();
            $table->enum("status",["Aktif","Nonaktif"]);
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
        Schema::dropIfExists('komisi');
    }
}
