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
        Schema::create('observasi_kunjungans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('surveyor_id')->constrained('surveyors')->onDelete('cascade');
            $table->date('tanggal_kunjungan');
            $table->string('nama_tetangga', 100);
            $table->string('alamat')->nullable();
            $table->text('kondisi_teramati');
            $table->text('bentuk_interaksi');
            $table->text('catatan_tambahan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('observasi_kunjungans');
    }
};
