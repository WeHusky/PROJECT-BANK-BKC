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
        Schema::create('Komite', function (Blueprint $table) {
            $table->increments('id_komite');
            $table->unsignedInteger('id_akun');
            $table->string('nama_komite');

            $table->foreign('id_akun')->references('id_akun')->on('akun')->onDelete('cascade');
        });//
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Komite');
    }
};
