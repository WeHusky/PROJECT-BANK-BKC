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
        Schema::create('Pengajuan_Kredit', function (Blueprint $table) {
            $table->increments('id_pengajuankredit');
            $table->unsignedInteger('id_komite')->nullable();
            $table->unsignedInteger('id_nasabah');
            $table->date('tanggal_pengajuankredit');
            $table->integer('nominal_pengajuankredit');
            $table->string('kategori_pengajuankredit');
            $table->string('status_pengajuankredit');
            $table->string('konfirmasi_pengajuankredit');
            $table->integer('tenor');
            $table->string('status_kelayakan');
            $table->string('rekening_nasabah');

            $table->foreign('id_nasabah')->references('id_nasabah')->on('Nasabah')->onDelete('cascade');
            $table->foreign('id_komite')->references('id_komite')->on('Komite')->onDelete('cascade');
        });//
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
