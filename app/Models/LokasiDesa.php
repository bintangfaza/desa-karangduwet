<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable([
    'nama_lokasi',
    'latitude',
    'longitude',
])]
class LokasiDesa extends Model
{
    protected $table = 'lokasi_desa';
}
