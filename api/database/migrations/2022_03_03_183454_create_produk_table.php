<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->string('id_produk')->primary();
            $table->string('nama_produk');
            $table->string('id_kategori_produk');
            $table->string('harga');
            $table->string('kesediaan');
            $table->string('satuan');
            $table->string('deskripsi');
            $table->string('status');
            $table->string('stok');
            $table->string('foto',200)->nullable();
            $table->integer('type_bisnis');
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
        Schema::dropIfExists('produk');
    }
}
