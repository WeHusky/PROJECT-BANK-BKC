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
        Schema::create('Notifications', function (Blueprint $table) {
            $table->increments('id_notifikasi');
            $table->string('jenis_notifikasi');
            $table->string('deskripsi_notifikasi');
            $table->string('link_notifikasi');
            $table->unsignedInteger('id_akun');
            $table->foreign('id_akun')->references('id_akun')->on('akun')->onDelete('cascade');
        });//
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Notifications');
    }
};
