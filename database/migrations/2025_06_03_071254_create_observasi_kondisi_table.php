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
        Schema::create('observasi_kondisis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('observasi_id')->constrained('observasis')->onDelete('cascade');
            $table->foreignId('kondisi_id')->constrained('kondisis')->onDelete('cascade');
            $table->integer('nilai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('observasi_kondisis');
    }
};
