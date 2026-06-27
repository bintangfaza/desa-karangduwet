<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable([
    'nama_kategori',
])]
class KategoriPotensi extends Model
{
    protected $table = 'kategori_potensi';

    public function potensiDesa(): HasMany
{
    return $this->hasMany(PotensiDesa::class);
}
}
