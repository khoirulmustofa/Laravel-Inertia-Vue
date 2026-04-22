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
        Schema::create('ujian_siswa', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('jadwal_ujian_id')->constrained('jadwal_ujian')->cascadeOnDelete();
            $table->foreignUuid('user_id')->constrained('users')->cascadeOnDelete(); // Asumsi model User
            
            // Status Partisipasi
            $table->string('status')->default('belum'); // belum, aktif, selesai, ditutup, dibatalkan
            
            // Waktu
            $table->dateTime('waktu_mulai')->nullable();
            $table->dateTime('waktu_selesai')->nullable();
            $table->integer('durasi_terpakai_detik')->default(0);
            
            // Token (opsional, untuk keamanan akses)
            $table->string('token')->nullable();
            
            // Skor & Hasil
            $table->decimal('nilai_akhir', 5, 2)->nullable(); // Max 100
            
            // Tracking
            $table->boolean('is_aktif')->default(true); // Diabaikan jika status = 'selesai' atau 'ditutup'
            
            // Audit (Opsional)
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
        Schema::dropIfExists('ujian_siswa');
    }
};
