<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableTransaksi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->bigInteger('nomor_faktur')->primary();
            $table->bigInteger('kasir');
            $table->bigInteger('member');
            $table->string('nama',200)->nullable();
            $table->string('nomor_hp',200)->nullable();
            $table->enum('jenis_kelamin',['pria','wanita'])->nullable();
            $table->double('total');
            $table->double('bayar');
            $table->double('kembalian');
            $table->enum('status',['Hold','Lunas']);
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
        Schema::dropIfExists('table_transaksi');
    }
}
