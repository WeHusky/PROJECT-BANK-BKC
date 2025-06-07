<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('Survei', function (Blueprint $table) {
            $table->increments('id_survei');
            $table->unsignedInteger('id_komite');
            $table->unsignedInteger('id_nasabah');
            $table->text('alasan_peminjaman');
            $table->string('kondisi_rumah');
            $table->string('kondisi_ekonomi');

            $table->foreign('id_komite')->references('id_komite')->on('Komite')->onDelete('cascade');
            $table->foreign('id_nasabah')->references('id_nasabah')->on('Nasabah')->onDelete('cascade');
        });//
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Survei');
    }
};
