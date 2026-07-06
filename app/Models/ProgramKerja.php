<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'anggota_kkn_id',
    'judul',
    'slug',
    'deskripsi',
    'thumbnail',
    'tanggal_mulai',
    'tanggal_selesai',
])]


class ProgramKerja extends Model
{
    protected $table = 'program_kerja';

    protected $casts = [
        'tanggal_mulai' => 'date',
        'tanggal_selesai' => 'date',
    ];

    public function anggota(): BelongsTo
    {
        return $this->belongsTo(AnggotaKkn::class,'anggota_kkn_id');
    }
}