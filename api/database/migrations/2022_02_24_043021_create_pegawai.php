<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePegawai extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawai', function (Blueprint $table) {
            $table->bigInteger("nip",false)->primary();
            $table->string("nik",50);
            $table->string("nama",200);
            $table->enum("jenis_kelamin",['pria','wanita']);
            $table->string("tempat_lahir",200);
            $table->string("telepon",50);
            $table->string("agama",50);
            $table->enum("status_nikah",['menikah','belum menikah']);
            $table->text("alamat");
            $table->string("email",200);
            $table->string("id_kategori_pegawai")->nullable();
            $table->double("gaji_pokok");
            $table->date("tanggal_lahir");
            $table->date("tanggal_terima");
            $table->date("tanggal_keluar")->nullable();
            $table->string("foto",100);
            $table->enum("status",['aktif','nonaktif']);
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
        Schema::dropIfExists('pegawai');
    }
}
