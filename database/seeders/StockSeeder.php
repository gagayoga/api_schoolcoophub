<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            // School Atribute
            [
                'nama_barang' => 'Dasi',
                'harga_barang' => 10000,
                'jumlah_barang' => 50,
                'id_kategori' => 1,
                'tanggal_upload' => now(), // Menggunakan tanggal saat ini
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_barang' => 'Badge Osis',
                'harga_barang' => 10000,
                'jumlah_barang' => 50,
                'id_kategori' => 1,
                'tanggal_upload' => now(), // Menggunakan tanggal saat ini
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_barang' => 'Bendera',
                'harga_barang' => 2500,
                'jumlah_barang' => 50,
                'id_kategori' => 1,
                'tanggal_upload' => now(), // Menggunakan tanggal saat ini
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_barang' => 'Baret',
                'harga_barang' => 12000,
                'jumlah_barang' => 50,
                'id_kategori' => 1,
                'tanggal_upload' => now(), // Menggunakan tanggal saat ini
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_barang' => 'Badge SMK',
                'harga_barang' => 5000,
                'jumlah_barang' => 50,
                'id_kategori' => 1,
                'tanggal_upload' => now(), // Menggunakan tanggal saat ini
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_barang' => 'Topi',
                'harga_barang' => 15000,
                'jumlah_barang' => 50,
                'id_kategori' => 1,
                'tanggal_upload' => now(), // Menggunakan tanggal saat ini
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_barang' => 'Hasduk',
                'harga_barang' => 8000,
                'jumlah_barang' => 50,
                'id_kategori' => 1,
                'tanggal_upload' => now(), // Menggunakan tanggal saat ini
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Drink
            [
                'nama_barang' => 'Coca Cola',
                'harga_barang' => 12000,
                'jumlah_barang' => 50,
                'id_kategori' => 2,
                'tanggal_upload' => now(), // Menggunakan tanggal saat ini
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_barang' => 'Le Minerale',
                'harga_barang' => 2500,
                'jumlah_barang' => 50,
                'id_kategori' => 2,
                'tanggal_upload' => now(), // Menggunakan tanggal saat ini
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_barang' => 'NutriBoost',
                'harga_barang' => 6500,
                'jumlah_barang' => 50,
                'id_kategori' => 2,
                'tanggal_upload' => now(), // Menggunakan tanggal saat ini
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_barang' => 'Teh Pucuk',
                'harga_barang' => 4000,
                'jumlah_barang' => 50,
                'id_kategori' => 2,
                'tanggal_upload' => now(), // Menggunakan tanggal saat ini
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_barang' => 'Pocari Sweet',
                'harga_barang' => 6000,
                'jumlah_barang' => 50,
                'id_kategori' => 2,
                'tanggal_upload' => now(), // Menggunakan tanggal saat ini
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_barang' => 'Frestea',
                'harga_barang' => 5500,
                'jumlah_barang' => 50,
                'id_kategori' => 2,
                'tanggal_upload' => now(), // Menggunakan tanggal saat ini
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_barang' => 'You C1000',
                'harga_barang' => 10000,
                'jumlah_barang' => 50,
                'id_kategori' => 2,
                'tanggal_upload' => now(), // Menggunakan tanggal saat ini
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_barang' => 'GoodDay',
                'harga_barang' => 6500,
                'jumlah_barang' => 50,
                'id_kategori' => 2,
                'tanggal_upload' => now(), // Menggunakan tanggal saat ini
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_barang' => 'Milku',
                'harga_barang' => 3000,
                'jumlah_barang' => 50,
                'id_kategori' => 2,
                'tanggal_upload' => now(), // Menggunakan tanggal saat ini
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_barang' => 'Floridina',
                'harga_barang' => 3000,
                'jumlah_barang' => 50,
                'id_kategori' => 2,
                'tanggal_upload' => now(), // Menggunakan tanggal saat ini
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Other
            [
                'nama_barang' => 'Lakban Bening',
                'harga_barang' => 10000,
                'jumlah_barang' => 20,
                'id_kategori' => 3,
                'tanggal_upload' => now(), // Menggunakan tanggal saat ini
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_barang' => 'Gunting',
                'harga_barang' => 7000,
                'jumlah_barang' => 20,
                'id_kategori' => 3,
                'tanggal_upload' => now(), // Menggunakan tanggal saat ini
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_barang' => 'Lakban Hitam',
                'harga_barang' => 12000,
                'jumlah_barang' => 20,
                'id_kategori' => 3,
                'tanggal_upload' => now(), // Menggunakan tanggal saat ini
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_barang' => 'Kantong Plastik',
                'harga_barang' => 500,
                'jumlah_barang' => 20,
                'id_kategori' => 3,
                'tanggal_upload' => now(), // Menggunakan tanggal saat ini
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_barang' => 'Lem Kertas',
                'harga_barang' => 3000,
                'jumlah_barang' => 20,
                'id_kategori' => 3,
                'tanggal_upload' => now(), // Menggunakan tanggal saat ini
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_barang' => 'Map Kertas',
                'harga_barang' => 2000,
                'jumlah_barang' => 20,
                'id_kategori' => 3,
                'tanggal_upload' => now(), // Menggunakan tanggal saat ini
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_barang' => 'Stepless',
                'harga_barang' => 7000,
                'jumlah_barang' => 20,
                'id_kategori' => 3,
                'tanggal_upload' => now(), // Menggunakan tanggal saat ini
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Masukkan data ke dalam tabel 'stock'
        DB::table('stock')->insert($data);
    }
}