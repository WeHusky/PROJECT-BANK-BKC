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
        Schema::create('Nasabah', function (Blueprint $table) {
            $table->increments('id_nasabah');
            $table->unsignedInteger('id_akun');
            $table->string('nik_nasabah');
            $table->string('nama_nasabah');
            $table->string('nohp_nasabah');
            $table->date('tanggallahir_nasabah');
            $table->text('alamat_nasabah');
            $table->string('pekerjaan_nasabah');
            $table->integer('penghasilan_nasabah');
            $table->string('tanggungan_nasabah');
            $table->string('statuskawin_nasabah');

            $table->foreign('id_akun')->references('id_akun')->on('akun')->onDelete('cascade');
        });//
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Nasabah');
    }
};
