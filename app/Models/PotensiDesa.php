<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'user_id',
    'kategori_potensi_id',
    'nama_potensi',
    'slug',
    'gambar',
    'deskripsi',
])]
class PotensiDesa extends Model
{
    protected $table = 'potensi_desa';

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    
    public function kategoriPotensi(): BelongsTo
    {
        return $this->belongsTo(KategoriPotensi::class);
    }
}
