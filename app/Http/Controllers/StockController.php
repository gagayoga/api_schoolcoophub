<?php

namespace App\Http\Controllers;

use App\Models\stock;
use App\Models\stockkeluar;
use App\Models\stockmasuk;

class StockController extends Controller
{
    public function tampilStock()
    {
        $stock = stock::get();

        return response(['Status' => 200, 'Message' => 'Berhasil Menampilkan All Stock', 'data' => $stock], 200);
    }

    public function tampilStockTerbaru()
    {
        // Mengambil data stok yang diurutkan berdasarkan tanggal terbaru (created_at)
        $stockTerbaru = Stock::orderBy('created_at', 'desc')->get();

        if ($stockTerbaru->isEmpty()) {
            return response()->json(['status' => 404, 'message' => 'Stok tidak ditemukan'], 404);
        }

        // Menyiapkan respons dengan data stok terbaru
        return response()->json([
            'status' => 200,
            'message' => 'Berhasil Menampilkan Stok Terbaru',
            'data' => $stockTerbaru,
        ], 200);
    }

    public function tampilStockByCategory($namaKategori)
    {
        // Mengambil data stok yang diurutkan berdasarkan tanggal terbaru (created_at) dan filter berdasarkan nama kategori
        $stockByCategory = Stock::whereHas('kategori', function ($query) use ($namaKategori) {
            $query->where('nama_kategori', $namaKategori);
        })->orderBy('created_at', 'desc')->get();

        if ($stockByCategory->isEmpty()) {
            return response()->json(['status' => 404, 'message' => 'Stok dengan kategori '.$namaKategori.' tidak ditemukan'], 404);
        }

        // Menyiapkan respons dengan data stok berdasarkan kategori
        return response()->json([
            'status' => 200,
            'message' => 'Berhasil Menampilkan Stok Berdasarkan Kategori '.$namaKategori,
            'data' => $stockByCategory,
        ], 200);
    }

    public function tampilStockMasuk()
    {
        $stock = stockmasuk::get();

        return response(['Status' => 200, 'Message' => 'Berhasil Menampilkan All Stock', 'data' => $stock], 200);
    }

    public function tampilStockKeluar()
    {
        $stock = stockkeluar::get();

        return response(['Status' => 200, 'Message' => 'Berhasil Menampilkan All Stock', 'data' => $stock], 200);
    }
}