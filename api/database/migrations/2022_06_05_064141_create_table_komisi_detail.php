<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableKomisiDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('komisi_detail', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('komisi_id',120);
            $table->bigInteger('pegawai_nip');
            $table->string('produk_id',120)->nullable();

//            $table->foreign('komisi_id_komisi')->references('id_komisi')->on('komisi')->onDelete('cascade');;
//            $table->foreign('pegawai_nip')->references('nip')->on('pegawai')->onDelete('cascade');;
//            $table->foreign('produk_id')->references('id_produk')->on('produk')->onDelete('cascade');;
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
        Schema::dropIfExists('komisi_detail');
    }
}
