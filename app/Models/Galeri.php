<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'album_galeri_id',
    'gambar',
])]

class Galeri extends Model
{
    protected $table = 'galeri';

    public function albumGaleri(): BelongsTo
    {
        return $this->belongsTo(AlbumGaleri::class);
    }
}
