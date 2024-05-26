<?php

namespace Database\Seeders;

use App\Models\TipeLayanan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TipeLayananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TipeLayanan::create([
            'nama_tipe_layanan' => 'Motor',
            'deskripsi_tipe_layanan' => 'Motor',
            'harga_tipe_layanan' => 10000,
            'foto_tipe_layanan' => '/tipe-layanan/iJBRCQSCWQdfr5dIvKWDZ8y8e82aMUmt2zMDFRB5.png',
        ]);
        TipeLayanan::create([
            'nama_tipe_layanan' => 'Sepeda',
            'deskripsi_tipe_layanan' => 'Sepeda',
            'harga_tipe_layanan' => 20000,
            'foto_tipe_layanan' => '/tipe-layanan/iQuAu8DUtSp7zaK08cAq0BOjjpYcrJDFEL1sMCTz.png',
        ]);
        TipeLayanan::create([
            'nama_tipe_layanan' => 'Mobil',
            'deskripsi_tipe_layanan' => 'Mobil',
            'harga_tipe_layanan' => 40000,
            'foto_tipe_layanan' => '/tipe-layanan/eEedB75XeTrjXyOemmIpdSuWVynaTjCSB4z8EqYE.png',
        ]);
    }
}
