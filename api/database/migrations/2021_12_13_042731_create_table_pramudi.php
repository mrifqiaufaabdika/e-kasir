<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePramudi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pramudi', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pramudi');
            $table->string('alamat');
            $table->string('ktp');
            $table->string('jenis_kelamin');
            $table->date('tanggal_lahir');
            $table->string('nomor_hp');
            $table->string('foto');
            $table->string('status');
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
        Schema::dropIfExists('pramudi');
    }
}
