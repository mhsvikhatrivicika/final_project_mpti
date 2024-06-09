<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePinjamanTable extends Migration
{
    public function up()
    {
        Schema::create('pinjaman', function (Blueprint $table) {
            $table->increments('id_pinjaman');
            $table->integer('id_member')->unsigned()->nullable();
            $table->date('tanggal_transaksi')->nullable();
            $table->date('tanggal_pinjam')->nullable();
            $table->integer('lama_pinjam')->nullable();
            $table->date('tanggal_kembali')->nullable();
            $table->enum('status_pinjam', ['Sedang Diproses', 'Ditolak', 'Diterima', 'Selesai'])->default('Sedang Diproses');
            $table->text('catatan_ditolak')->nullable();
            $table->timestamps();

            // Relasi dengan tabel users
            $table->foreign('id_member')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pinjaman');
    }
}
