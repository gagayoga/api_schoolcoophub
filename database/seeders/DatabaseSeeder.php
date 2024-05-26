<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Panggil seeder StockSeeder
        $this->call(KategoriSeeder::class);
        $this->call(StockSeeder::class);
    }
}