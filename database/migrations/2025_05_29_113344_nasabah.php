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
            $table->string('nik_nasabah')->unique();
            $table->string('nama_nasabah');
            $table->string('rekening_nasabah')->unique();
            $table->string('card_type')->nullable(); // classic, gold, red
            $table->string('nohp_nasabah')->unique();
            $table->string('gender_nasabah');
            $table->date('tanggallahir_nasabah');
            $table->string('kecamatan_nasabah');
            $table->text('alamat_nasabah');
            $table->string('pekerjaan_nasabah');
            $table->string('penghasilan_nasabah');
            $table->integer('tanggungan_nasabah');
            $table->string('statuskawin_nasabah');
            $table->integer('saldo_nasabah')->default(0);

            $table->foreign('id_akun')->references('id_akun')->on('akun')->onDelete('cascade');
        });//
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nasabah');
    }
};
