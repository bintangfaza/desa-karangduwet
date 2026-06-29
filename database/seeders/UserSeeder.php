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
        User::create([
            'nama' => 'Salsabila Aulia',
            'username' => 'Salsa42',
            'email' => 'salsabilaauliaalzzati2004@mail.ugm.ac.id',
            'password' => Hash::make('Salsa42'),
        ]);
        User::create([
            'nama' => 'Fadhlullah Ramadhan',
            'username' => 'ramadhan',
            'email' => 'fadhlullahramadhan@mail.ugm.ac.id',
            'password' => Hash::make('Fadhlullah12'),
        ]);

    }
}
