<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('stock_keluar', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user')->nullable(false);
            $table->unsignedBigInteger('id_stock')->nullable(false);
            $table->integer('jumlah')->nullable(false);
            $table->integer('total_harga')->nullable(false);
            $table->date('tanggal_keluar')->nullable(false);
            $table->enum('status', ['Pending', 'Terkirim', 'Tidak Terkirim'])->default('Terkirim');
            $table->timestamps();
        });

        $table->foreign('id_user')->references('id')->on('users');
        $table->foreign('id_stock')->references('id')->on('stock');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_keluar');
    }
};
