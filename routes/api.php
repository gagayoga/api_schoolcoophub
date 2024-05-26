<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\StockController;
use Illuminate\Support\Facades\Route;

// Route Login And Register
Route::prefix('/users')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/registrasi', [AuthController::class, 'registrasi']);
    Route::get('/guest-tampil-stock', [StockController::class, 'tampilStockTerbaruGuest']);

    Route::group(['middleware' => 'auth:sanctum'], function () {
        Route::get('/stock/tampil', [StockController::class, 'tampilStock']);
        Route::get('/stock/tampil/baru', [StockController::class, 'tampilStockTerbaru']);
        Route::get('/stock/tampil/{id}', [StockController::class, 'tampilStockByCategory']);
        Route::get('/stock/masuk', [StockController::class, 'tampilStockMasuk']);
        Route::get('/stock/kosong', [StockController::class, 'tampilStockKosong']);
        Route::patch('/update/stock/{id}', [StockController::class, 'updateStock']);
        Route::post('/stock/keluar', [StockController::class, 'storeStock']);
        Route::get('/stock/keluar', [StockController::class, 'tampilStockKeluar']);

        Route::get('/kategori', [StockController::class, 'tampilKategori']);

        Route::get('/laporan-penjualan', [StockController::class, 'tampilDataLaporanPenjualan']);
        Route::get('/laporan-all-penjualan', [StockController::class, 'tampilLaporanPenjualan']);

        Route::post('/logout', [AuthController::class, 'logout']);
    });
});