<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable([
    'nama',
    'slug',
    'nim',
    'prodi',
    'fakultas',
    'jabatan',
    'deskripsi',
    'foto',
    'instagram',
])]
class AnggotaKkn extends Model
{
    protected $table = 'anggota_kkn';

    public function programKerja(): HasMany
    {
        return $this->hasMany(ProgramKerja::class);
    }
}
