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
        Schema::create('observasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('surveyor_id')->constrained('users')->onDelete('cascade');
            $table->date('tanggal_kunjungan');
            $table->string('nama_tetangga');
            $table->text('alamat');
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
        Schema::dropIfExists('observasis');
    }
};
