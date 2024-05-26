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
        Schema::create('pesan', function (Blueprint $table) {
            $table->id('id_pesan');
            $table->foreignId('customer_id')->references('id_customer')->on('customer')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('worker_id')->references('id_worker')->on('worker')->onDelete('cascade')->onUpdate('cascade');
            $table->text('pesan');
            $table->date('tanggal');
            $table->time('time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesan');
    }
};
