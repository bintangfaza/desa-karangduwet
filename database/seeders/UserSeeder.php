<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'nama' => 'Administrator',
            'username' => 'mimin42',
            'email' => 'fazabintang42@gmail.com',
            'password' => Hash::make('mimin1342'),
        ]);

    }
}
