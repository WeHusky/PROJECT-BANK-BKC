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
            $table->unsignedInteger('id_pengajuankredit')->nullable();
            $table->text('alasan_peminjaman')->nullable();
            $table->string('kondisi_rumah')->nullable();
            $table->string('kondisi_ekonomi')->nullable();
            $table->foreign('id_pengajuankredit')->references('id_pengajuankredit')->on('pengajuan_kredit')->onDelete('cascade');
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
