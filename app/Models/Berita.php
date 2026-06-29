<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
'user_id',
'judul',
'slug',
'gambar',
'isi',
'views',
'status',
])]

class Berita extends Model
{
    protected $table = 'berita';

    public function user(): BelongsTo
{
    return $this->belongsTo(User::class);
}
}
