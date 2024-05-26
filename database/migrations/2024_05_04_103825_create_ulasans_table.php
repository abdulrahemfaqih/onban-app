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
        Schema::create('ulasan', function (Blueprint $table) {
            $table->id('id_ulasan');
            $table->foreignId('customer_id')->references('id_customer')->on('customer')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('worker_id')->references('id_worker')->on('worker')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('order_id')->references('id_order')->on('order')->onDelete('cascade')->onUpdate('cascade');
            $table->text('ulasan');
            $table->float('rating');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ulasan');
    }
};
