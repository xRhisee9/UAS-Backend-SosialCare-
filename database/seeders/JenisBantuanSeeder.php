<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\JenisBantuan; // Pastikan ini diimport

class JenisBantuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        JenisBantuan::create([
            'nama_bantuan' => 'Sembako',
            'deskripsi' => 'Bantuan berupa kebutuhan pokok seperti beras, minyak, gula, dll.',
        ]);

        JenisBantuan::create([
            'nama_bantuan' => 'Bantuan Tunai Langsung (BLT)',
            'deskripsi' => 'Bantuan uang tunai untuk kebutuhan sehari-hari.',
        ]);

        JenisBantuan::create([
            'nama_bantuan' => 'Kesehatan',
            'deskripsi' => 'Bantuan untuk biaya pengobatan atau peralatan kesehatan.',
        ]);

        JenisBantuan::create([
            'nama_bantuan' => 'Pendidikan',
            'deskripsi' => 'Bantuan untuk biaya sekolah, buku, atau seragam.',
        ]);
    }
}