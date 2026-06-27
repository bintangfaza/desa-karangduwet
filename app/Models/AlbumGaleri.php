<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable([
    'user_id',
    'judul',
    'slug',
    'cover',
])]
class AlbumGaleri extends Model
{
    protected $table = 'album_galeri';

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function galeri(): HasMany
    {
        return $this->hasMany(Galeri::class);
    }
}
