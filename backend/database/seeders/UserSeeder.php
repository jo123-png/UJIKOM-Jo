<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'id' => 1,
                'name' => 'Administrator',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
            ],
            [
                'id' => 2,
                'name' => 'Admin App',
                'email' => 'admin@app.com',
                'password' => Hash::make('password123'),
                'role' => 'admin',
            ],
            [
                'id' => 3,
                'name' => 'Petugas Lab',
                'email' => 'petugas@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'petugas',
            ],
            [
                'id' => 4,
                'name' => 'Siswa 1',
                'email' => 'siswa1@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'peminjam',
            ],
            [
                'id' => 5,
                'name' => 'Siswa 2',
                'email' => 'siswa2@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'peminjam',
            ],
        ];

        foreach ($users as $user) {
            User::updateOrCreate(['id' => $user['id']], $user);
        }
    }
}