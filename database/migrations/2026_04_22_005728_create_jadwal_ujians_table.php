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
        Schema::create('jadwal_ujian', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nama_ujian'); 
            $table->string('kategori')->nullable(); // 'harian', 'uts', 'uas', 'tryout'
            $table->string('keterangan')->nullable();
            $table->dateTime('waktu_mulai');
            $table->dateTime('waktu_selesai');
            $table->integer('durasi_menit');
            $table->boolean('acak_soal')->default(false);
            $table->boolean('terampilkan_kunci')->default(false);
            $table->string('token');
            $table->boolean('is_aktif')->default(true);
            $table->integer('waktu_per_soal_detik')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_ujian');
    }
};
