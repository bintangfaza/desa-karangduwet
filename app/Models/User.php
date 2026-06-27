<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['nama', 'username', 'email', 'password'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    public function berita(): HasMany
    {
        return $this->hasMany(Berita::class);
    }

    public function potensiDesa(): HasMany
    {
        return $this->hasMany(PotensiDesa::class);
    }

    public function produkDesa(): HasMany
    {
        return $this->hasMany(ProdukDesa::class);
    }

    public function albumGaleri(): HasMany
    {
        return $this->hasMany(AlbumGaleri::class);
    }
}
