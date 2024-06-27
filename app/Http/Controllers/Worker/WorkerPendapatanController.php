<?php

namespace App\Http\Controllers\Worker;

use App\Http\Controllers\Controller;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Carbon\Carbon;

class WorkerPendapatanController extends Controller
{
    public function __invoke()
    {
        $id_worker = session('userData')->worker->id_worker;
        $orders = Pesanan::where(['worker_id' => $id_worker, 'status_order' => 'Selesai'])->get();

        // Group orders by month and year
        $ordersByMonth = $orders->groupBy(function($date) {
            return Carbon::parse($date->tanggal)->format('Y-m');
        });

        return view('worker.pendapatan', [
            "title" => "Home",
            "ordersByMonth" => $ordersByMonth,
            "role" => session('userData')->role,
            "worker" => session('userData')->worker
        ]);
    }
}

