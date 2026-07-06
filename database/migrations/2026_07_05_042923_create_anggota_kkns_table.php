<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('anggota_kkn', function (Blueprint $table) {
            $table->id();
            $table->string('nama',150);
            $table->string('slug')->unique();
            $table->string('nim',30)->unique();
            $table->string('prodi',100);
            $table->string('fakultas',100);
            $table->enum('jabatan',[
                'Koordinator Mahasiswa Unit',
                'Koordinator Mahasiswa SUb Unit',
                'Bendahara',
                'Humas & Publikasi',
                'Perlengkapan Logistik & Konsumsi',
                'Sefty Health Environment',
                'Design & Dokumentasi',
            ]);

            $table->text('deskripsi')->nullable();
            $table->string('foto')->nullable();
            $table->string('instagram')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('anggota_kkn');
    }
};