<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableDetailTransaksi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_transaksi', function (Blueprint $table) {
            $table->bigInteger('id_detail_faktur')->primary();
            $table->bigInteger('nomor_faktur');
            $table->string('id_produk');
            $table->integer('bisnis');
            $table->double('harga');
            $table->double('qty');
            $table->bigInteger('satuan');
            $table->string('kd_vocher');
            $table->string('sub_total');
            $table->double('potongan');
            $table->double('total');
            $table->text('catatan');
            $table->enum('status',['Aktif','Nonaktif']);
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
        Schema::dropIfExists('detail_transaksi');
    }
}
