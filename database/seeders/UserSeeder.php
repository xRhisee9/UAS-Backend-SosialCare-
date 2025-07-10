<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin Utama',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'), // Ganti dengan password yang kuat di produksi
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Petugas Lapangan',
            'email' => 'petugas@example.com',
            'password' => Hash::make('password'), // Ganti dengan password yang kuat di produksi
            'role' => 'petugas',
        ]);
    }
}