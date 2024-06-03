<?php

namespace App\Http\Controllers\User\Order;

use App\Http\Controllers\Controller;
use App\Models\Pesanan;
use Illuminate\Http\Request;


class FindWorkerController extends Controller
{
    public function __invoke($id_order)
    {
        $order = Pesanan::find($id_order);
        return view('user.order.find-worker', [
            "title" => "Cari Pekerja",
            "nama" => session('userData')->customer->nama,
            "role" => session('userData')->role,
            'order' => $order
        ]);
    }
}
