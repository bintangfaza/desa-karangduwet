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
        Schema::create('produk_desa', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->foreignId('kategori_produk_id')
                ->constrained('kategori_produk')
                ->cascadeOnDelete();

            $table->string('nama_produk', 150);
            $table->string('slug')->unique();
            $table->string('gambar', 255);
            $table->decimal('harga', 12, 2);
            $table->longText('deskripsi');
            $table->string('no_whatsapp', 20)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk_desa');
    }
};
