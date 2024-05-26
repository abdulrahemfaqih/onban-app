<?php

namespace App\Http\Controllers\Worker;

use App\Http\Controllers\Controller;
use App\Models\Worker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WorkerHomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $id_worker = session('userData')->worker->id_worker;
        $status_menerima_order = Worker::findOrFail($id_worker)->status_menerima;
        return view('worker.index', [
            "title" => "Home",
            "orders" => DB::table('order')->get(),
            "role" => session('userData')->role,
            "worker" => session('userData')->worker
        ]);
    }
}
