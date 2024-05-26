<?php

namespace App\Http\Controllers\Worker;

use App\Http\Controllers\Controller;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class WorkerPendapatanController extends Controller
{
    public function __invoke()
    {
        $id_worker = session('userData')->worker->id_worker;
        $orders = Pesanan::where(['worker_id' => $id_worker, 'status_order' => 'Selesai'])->get();
        return view('worker.pendapatan', [
            "title" => "Home",
            "orders" => $orders,
            "role" => session('userData')->role,
            "worker" => session('userData')->worker
        ]);
    }
}
