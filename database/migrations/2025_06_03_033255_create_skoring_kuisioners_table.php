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
        Schema::create('skoring_kuisioners', function (Blueprint $table) {

            $table->id();
            $table->integer('nilai_awal');      // nilai batas bawah
            $table->integer('nilai_akhir');     // nilai batas atas
            $table->string('keterangan');       // misal: Sangat Baik, Baik, dll
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skoring_kuisioners');
    }
};
