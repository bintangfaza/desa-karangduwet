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
        Schema::create('potensi_desa', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->foreignId('kategori_potensi_id')
                ->constrained('kategori_potensi')
                ->cascadeOnDelete();

            $table->string('nama_potensi', 150);
            $table->string('slug')->unique();
            $table->string('gambar', 255);
            $table->longText('deskripsi');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('potensi_desa');
    }
};
