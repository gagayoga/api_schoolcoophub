<?php

namespace App\Http\Controllers;

use App\Models\stock;
use App\Models\stockkeluar;
use App\Models\stockmasuk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
        $stockTerbaru = Stock::orderBy('created_at', 'desc')->take(10)->get();

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

    public function tampilStockTerbaruGuest()
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

    public function tampilStockByCategory($idKategori)
    {
        // Mengambil data stok yang diurutkan berdasarkan tanggal terbaru (created_at) dan filter berdasarkan nama kategori
        // Mengambil data stok yang diurutkan berdasarkan tanggal terbaru (created_at) dan filter berdasarkan ID kategori
        $stockByCategory = Stock::whereHas('kategori', function ($query) use ($idKategori) {
            $query->where('id', $idKategori);
        })->orderBy('created_at', 'desc')->get();

        if ($stockByCategory->isEmpty()) {
            return response()->json(['status' => 404, 'message' => 'Stok dengan kategori '.$idKategori.' tidak ditemukan'], 404);
        }

        // Menyiapkan respons dengan data stok berdasarkan kategori
        return response()->json([
            'status' => 200,
            'message' => 'Berhasil Menampilkan Stok Berdasarkan Kategori dengan ID '.$idKategori,
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
        // Mengambil ID user yang sedang login
        $userId = Auth::id();

        // Mengambil data stock keluar berdasarkan ID user yang sedang login
        $stockKeluar = StockKeluar::where('id_user', $userId)->orderBy('created_at', 'desc')->get();

        // Mengecek jika data stock keluar ditemukan
        if ($stockKeluar->isEmpty()) {
            return response()->json(['message' => 'Tidak ada data stock keluar untuk user ini'], 404);
        }

        // Mengubah data stock keluar menjadi format respons yang diinginkan
        $responseData = $stockKeluar->map(function ($item) {
            return [
                'email' => $item->user->email,
                'name' => $item->user->name,
                'nama_barang' => $item->stock->nama_barang,
                'harga_barang' => $item->stock->harga_barang,
                'jumlah_barang' => $item->jumlah,
                'total_harga' => $item->total_harga,
                'status' => $item->status,
                'tanggal_pesan' => $item->tanggal_keluar,
            ];
        });

        // Mengembalikan respons JSON dengan data stock keluar
        return response()->json([
            'status' => 200,
            'message' => 'Berhasil Menampilkan Stock Keluar',
            'data' => $responseData,
        ], 200);
    }

    public function storeStock(Request $request)
    {
        // Validasi input menggunakan Validator
        $validator = Validator::make($request->all(), [
            'id_user' => 'required|exists:users,id',
            'id_stock' => 'required|exists:stock,id',
            'jumlah' => 'required|integer|min:1',
            'total_harga' => 'required|integer|min:0',
            'status' => 'required|in:Pending,Terkirim,Tidak Terkirim',
        ]);

        // Jika validasi gagal, kirimkan respons error
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        // Ambil informasi Stock terkait dengan StockKeluar
        $stock = Stock::find($request->id_stock);

        // Periksa apakah jumlah barang yang diminta kurang dari atau sama dengan jumlah barang yang tersedia
        if ($stock->jumlah_barang >= $request->jumlah) {
            // Simpan data pengeluaran stok ke dalam database dengan tanggal keluar otomatis
            $stockKeluar = new StockKeluar();
            $stockKeluar->id_user = $request->id_user;
            $stockKeluar->id_stock = $request->id_stock;
            $stockKeluar->jumlah = $request->jumlah;
            $stockKeluar->total_harga = $request->total_harga;
            $stockKeluar->tanggal_keluar = now(); // Menggunakan fungsi now() untuk tanggal saat ini
            $stockKeluar->status = $request->status;
            $stockKeluar->save();

            // Kurangi jumlah barang yang tersedia di stok
            $stock->jumlah_barang -= $request->jumlah;
            $stock->save();

            // Ambil informasi User terkait dengan StockKeluar
            $user = User::find($request->id_user);

            // Membuat respons JSON dengan data yang diambil dari objek user, stock, dan stock_keluar
            $response_data = [
                'message' => 'Data pengeluaran stok berhasil disimpan',
                'data' => [
                    'email' => $user->email,
                    'name' => $user->name,
                    'nama_barang' => $stock->nama_barang,
                    'harga_barang' => $stock->harga_barang,
                    'stock_barang' => $stock->jumlah_barang,
                    'jumlah_barang' => $stockKeluar->jumlah,
                    'total_harga' => $stockKeluar->total_harga,
                    'tanggal_keluar' => $stockKeluar->tanggal_keluar,
                ],
            ];

            // Kirimkan respons sukses dalam format JSON
            return response()->json($response_data, 201);
        } else {
            // Jika jumlah barang yang diminta melebihi jumlah barang yang tersedia, kirimkan respons error
            return response()->json(['errors' => 'Jumlah barang yang diminta melebihi stok tersedia'], 400);
        }
    }
}