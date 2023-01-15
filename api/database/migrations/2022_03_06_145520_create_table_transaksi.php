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
            $table->bigInteger('member')->nullable();
            $table->double('total')->nullable();
            $table->double('bayar')->nullable();
            $table->double('kembalian')->nullable();
            $table->string('metode_pembayaran')->nullable();
            $table->string('no_faktur_transfer')->nullable();
            $table->integer('bisnis');
            $table->enum('status',['Belum Lunas','Lunas','Batal']);
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
        Schema::dropIfExists('transaksi');
    }
}
