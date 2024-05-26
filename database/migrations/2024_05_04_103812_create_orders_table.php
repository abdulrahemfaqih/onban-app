<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('order', function (Blueprint $table) {
            $table->id('id_order');
            $table->foreignId('customer_id')->references('id_customer')->on('customer')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('worker_id')->nullable()->references('id_worker')->on('worker')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('voucher_id')->nullable()->references('id_voucher')->on('voucher')->onDelete('cascade')->onUpdate('cascade');
            $table->enum('status_order', ['Menunggu Pekerja', 'Diproses', 'Selesai', 'Dibatalkan'])->nullable();
            $table->foreignId('tipe_layanan_id')->nullable()->references('id_tipe_layanan')->on('tipe_layanan')->onDelete('cascade')->onUpdate('cascade');
            $table->enum('status_pembayaran', ['Menunggu', 'Berhasil', 'Gagal'])->nullable();
            $table->decimal('total_harga', 15, 2)->nullable();
            $table->float('jarak')->nullable();
            $table->text('catatan')->nullable();
            $table->text('alamat')->nullable();
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->date('tanggal')->nullable();
            $table->time('waktu')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};
