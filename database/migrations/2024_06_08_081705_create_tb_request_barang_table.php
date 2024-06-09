<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbRequestBarangTable extends Migration
{
    public function up()
    {
        Schema::create('tb_request_barang', function (Blueprint $table) {
            $table->increments('id_request');
            $table->integer('id_pinjaman')->unsigned()->nullable();
            $table->integer('id_barang')->unsigned()->nullable();
            $table->string('jumlah_brg', 11)->nullable();
            $table->timestamps();

            // Relasi dengan tabel pinjaman dan data_barang
            $table->foreign('id_pinjaman')->references('id_pinjaman')->on('pinjaman')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_barang')->references('id')->on('data_barang')->onDelete('set null')->onUpdate('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_request_barang');
    }
}
