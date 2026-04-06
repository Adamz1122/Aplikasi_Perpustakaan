<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // PETUGAS
        User::create([
            'name' => 'Asep',
            'email' => 'Asep@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 'petugas'
        ]);

        // KEPALA
        User::create([
            'name' => 'Iyan',
            'email' => 'Iyan@gmail.com',
            'password' => Hash::make('1234567'),
            'role' => 'kepala'
        ]);
    }
}
