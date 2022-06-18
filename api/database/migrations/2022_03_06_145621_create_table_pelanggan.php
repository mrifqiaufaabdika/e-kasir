<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePelanggan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelanggan', function (Blueprint $table) {
            $table->bigInteger('id_member')->primary();
            $table->string('nama',200);
            $table->string('nomor_hp',200);
            $table->enum('jenis_kelamin',['pria','wanita']);
            $table->text('alamat');
            $table->date('tanggal_lahir')->nullable();
            $table->integer('jumlah_transaksi');
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
        Schema::dropIfExists('pelanggan');
    }
}
