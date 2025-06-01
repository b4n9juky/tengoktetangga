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
        // database/migrations/xxxx_xx_xx_create_kegiatans_table.php
        Schema::create('kegiatans', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('deskripsi');
            $table->string('lokasi');
            $table->dateTime('waktu_mulai');
            $table->dateTime('waktu_selesai');

            $table->foreignId('bentuk_id')->constrained('bentuk_kegiatans')->onDelete('cascade');
            $table->foreignId('dibuat_oleh')->constrained('users')->onDelete('cascade'); // pelaksana

            $table->foreignId('pembina_id')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('koordinator_id')->nullable()->constrained('users')->nullOnDelete();

            $table->enum('status', [
                'draft',
                'diajukan',
                'disetujui_pembina',
                'disetujui_koordinator',
                'ditolak'
            ])->default('draft');

            $table->text('evaluasi')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kegiatans');
    }
};
