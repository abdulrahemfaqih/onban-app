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
        $id_worker = session('userData')->worker->id_worker;
        $status_menerima_order = Worker::findOrFail($id_worker)->status_menerima_order  ;
        return view('worker.index', [
            "title" => "Home",
            "orders" => $orders,
            "role" => session('userData')->role,
            "worker" => session('userData')->worker,
            "status_menerima_order" => $status_menerima_order
        ]);
    }
}
