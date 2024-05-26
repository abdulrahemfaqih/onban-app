<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\StatusPenerimaanWorker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StatusPenerimaanWorkerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StatusPenerimaanWorker::create([
            'status_penerimaan' => true,
            'keterangan' => 'ditutup sampai 23 Mei 2024',
        ]);
    }
}
