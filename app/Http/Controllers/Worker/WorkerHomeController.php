<?php

namespace App\Http\Controllers\Worker;

use App\Http\Controllers\Controller;
use App\Models\Pesanan;
use App\Models\Worker;

class WorkerHomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $orders = Pesanan::with(['customer', 'tipe_layanan'])->get();
        $worker = Worker::findOrFail(session('userData')->worker->id_worker);
        $order_proses = Pesanan::with(['customer', 'tipe_layanan'])
            ->where('worker_id', $worker->id_worker)
            ->where('status_order', 'Diproses')
            ->get();
        $id_worker = session('userData')->worker->id_worker;
        $status_menerima_order = Worker::findOrFail($id_worker)->status_menerima_order  ;
        return view('worker.index', [
            "title" => "Home",
            "orders" => $orders,
            "role" => session('userData')->role,
            "worker" => session('userData')->worker,
            "status_menerima_order" => $status_menerima_order,
            "order_proses" => $order_proses
        ]);


    }
}
