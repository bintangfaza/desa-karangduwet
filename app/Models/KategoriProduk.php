<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable([
    'nama_kategori',
])]
class KategoriProduk extends Model
{
    protected $table = 'kategori_produk';

    public function produkDesa(): HasMany
    {
        return $this->hasMany(ProdukDesa::class);
    }
}
