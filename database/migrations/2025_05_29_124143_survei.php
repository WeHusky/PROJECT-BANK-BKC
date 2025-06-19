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
            $table->date('tanggal_survei')->nullable();
            $table->unsignedInteger('id_komite')->nullable();
            $table->unsignedInteger('id_nasabah')->nullable();
            $table->text('alasan_peminjaman')->nullable();
            $table->string('kondisi_rumah')->nullable();
            $table->string('kondisi_ekonomi')->nullable();
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
