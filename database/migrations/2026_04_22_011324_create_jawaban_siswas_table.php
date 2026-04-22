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
        Schema::create('jawaban_siswa', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('ujian_siswa_id')->constrained('ujian_siswa')->cascadeOnDelete();
            $table->foreignUuid('ujian_pertanyaan_id')->constrained('ujian_pertanyaan')->cascadeOnDelete();
            
            $table->json('jawaban')->nullable(); // Bisa string, array, atau JSON tergantung tipe soal
            $table->boolean('is_benar')->nullable(); // Hasil penilaian
            $table->decimal('bobot_didapat', 5, 2)->nullable(); // Penyesuaian bobot jika ada
                     
            // Timer Jawaban (opsional, untuk melacak waktu per soal)
            $table->integer('waktu_detik')->nullable();
            
            // Audit
            $table->foreignUuid('dibuat_oleh')->nullable()->constrained('users');
            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jawaban_siswa');
    }
};
