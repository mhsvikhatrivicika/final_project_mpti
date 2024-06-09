<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataBarangTable extends Migration
{
    public function up()
    {
        Schema::create('data_barang', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode_barang', 13)->unique();
            $table->string('nama_barang', 100);
            $table->string('tipe_barang', 250);
            $table->integer('jmlh_stok');
            $table->string('lokasi', 100);
            $table->date('tgl_regist');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('data_barang');
    }
}
