<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Admin;
use App\Models\Customer;
use App\Models\MetodePembayaran;
use App\Models\Pekerja;
use App\Models\Pengguna;
use Illuminate\Database\Seeder;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use App\Models\StatusPenerimaanWorker;
use App\Models\TipeLayanan;
use App\Models\Worker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        StatusPenerimaanWorker::create([
            'status_penerimaan' => true,
            'keterangan' => 'ditutup sampai 23 Mei 2024',
        ]);

        MetodePembayaran::create([
            'nama_metode_pembayaran' => 'Bayar di Tempat',
            'deskripsi_metode_pembayaran' => 'Pembayaran dilakukan di tempat',
        ]);

        // TipeLayanan::create([
        //     'nama_tipe_layanan' => 'Motor',
        //     'deskripsi_tipe_layanan' => 'Gas tambal disini',
        //     'harga_tipe_layanan' => 100000,
        //     'foto_tipe_layanan' => 'motor.jpg',
        // ]);
        // TipeLayanan::create([
        //     'nama_tipe_layanan' => 'Mobil',
        //     'deskripsi_tipe_layanan' => 'Gas tambal disini',
        //     'harga_tipe_layanan' => 200000,
        //     'foto_tipe_layanan' => 'mobil.jpg',
        // ]);
        // TipeLayanan::create([
        //     'nama_tipe_layanan' => 'Sepeda',
        //     'deskripsi_tipe_layanan' => 'Gas tambal disini',
        //     'harga_tipe_layanan' => 50000,
        //     'foto_tipe_layanan' => 'sepeda.jpg',
        // ]);
        Worker::factory()->count(10)->create();





    }
}
