<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'user_id',
    'kategori_produk_id',
    'nama_produk',
    'slug',
    'gambar',
    'harga',
    'deskripsi',
    'no_whatsapp',
])]
class ProdukDesa extends Model
{
    protected $table = 'produk_desa';

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function kategoriProduk(): BelongsTo
    {
        return $this->belongsTo(KategoriProduk::class);
    }
}
