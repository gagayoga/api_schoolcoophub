<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        $dataKategori = [
            // Data Kategori
            [
                'nama_kategori' => 'School Atribute',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kategori' => 'Drink',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kategori' => 'Other',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Masukkan data ke dalam tabel 'stock'
        DB::table('kategori')->insert($dataKategori);
    }
}