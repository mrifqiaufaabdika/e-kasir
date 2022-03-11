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
            $table->string('id_komisi',120);
            $table->string('nama_grup',200);
            $table->enum('type',['Transaksi','Produk']);
            $table->double('nominal_komisi')->nullable();
            $table->double('persen')->nullable();
            $table->json('pegawai'); //value array of id pegawai
            $table->json('produk')->nullable(); //value array of id produk
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
        Schema::dropIfExists('table_komisi');
    }
}
