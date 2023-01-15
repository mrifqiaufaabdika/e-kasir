<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableBisnis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bisnis', function (Blueprint $table) {
            $table->id();
            $table->string("nama",200);
            $table->double("saldo");
            $table->string("keterangan",200);
            $table->string("logo",200)->nullable();
            $table->string("alamat");
            $table->string("nomor_hp");
            $table->string("website");
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
        Schema::dropIfExists('bisnis');
    }
}
