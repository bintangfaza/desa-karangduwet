<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('program_kerja', function (Blueprint $table) {

            $table->id();

            $table->foreignId('anggota_kkn_id')
                ->constrained('anggota_kkn')
                ->cascadeOnDelete();

            $table->string('judul',150);
            $table->string('slug')->unique();
            $table->text('deskripsi');
            $table->string('thumbnail')->nullable();
            $table->date('tanggal_mulai')->nullable();
            $table->date('tanggal_selesai')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('program_kerja');
    }
};