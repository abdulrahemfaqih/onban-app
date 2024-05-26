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
            $table->foreignId('worker_id')->references('id_worker')->on('worker')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('voucher_id')->references('id_voucher')->on('voucher')->onDelete('cascade')->onUpdate('cascade');
            $table->enum('status_order', ['Menunggu Pekerja', 'Diproses', 'Selesai', 'Dibatalkan']);
            $table->foreignId('metode_pembayaran_id')->references('id_metode_pembayaran')->on('metode_pembayaran')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('tipe_layanan_id')->references('id_tipe_layanan')->on('tipe_layanan')->onDelete('cascade')->onUpdate('cascade');
            $table->enum('status_pembayaran', ['Menunggu', 'Berhasil', 'Gagal']);
            $table->integer('total_harga');
            $table->float('jarak');
            $table->text('catatan');
            $table->string('alamat');
            $table->decimal('latitude', 10, 8);
            $table->decimal('longitude', 11, 8);
            $table->date('tanggal');
            $table->time('waktu');
            $table->timestamps();

            // foreign ke kode voucher

            // $table->foreign('kode_voucher')->references('kode_voucher')->on('voucher')->onDelete('cascade')->onUpdate('cascade');
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
