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
        Schema::create('Hasil_BI_Checking', function (Blueprint $table) {
            $table->increments('id_bichecking');
            $table->unsignedInteger('id_nasabah');
            $table->date('check_date');
            $table->text('catatan_histori');
            $table->integer('credit_score');

            $table->foreign('id_nasabah')->references('id_nasabah')->on('Nasabah')->onDelete('cascade');
        });//
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Hasil_BI_Checking');
    }
};
