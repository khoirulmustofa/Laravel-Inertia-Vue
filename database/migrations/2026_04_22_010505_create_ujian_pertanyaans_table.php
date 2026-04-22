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
        Schema::create('ujian_pertanyaan', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('jadwal_ujian_id')->constrained('jadwal_ujian')->cascadeOnDelete();
            $table->foreignUuid('pertanyaan_id')->constrained('pertanyaan')->cascadeOnDelete();
            
            // 1. Bobot (dapat berbeda dari bank soal)
            $table->integer('bobot')->default(1);
            
            // 2. Urutan Tampilan (opsional, untuk kontrol manual di UI)
            $table->integer('urutan')->default(0); 
            
            // 3. Status Aktif (opsional, untuk mematikan soal tertentu tanpa menghapusnya dari history)
            $table->boolean('is_aktif')->default(true);
            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ujian_pertanyaan');
    }
};
