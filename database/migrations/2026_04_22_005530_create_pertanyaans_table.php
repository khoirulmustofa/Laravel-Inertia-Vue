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
        Schema::create('pertanyaan', function (Blueprint $table) {
            $table->uuid('id')->primary();
            // Perhatikan: string nama tabel eksplisit di dalam constrained()
            $table->foreignUuid('bank_soal_id')->constrained('bank_soal')->cascadeOnDelete();
            
            $table->string('tipe_soal'); 
            $table->enum('level', ['mudah', 'sedang', 'sulit']);
            $table->json('konten_soal'); 
            $table->json('kunci_jawaban'); 
            $table->integer('bobot_default')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pertanyaan');
    }
};
