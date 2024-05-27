<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\Worker;
use Illuminate\Http\Request;

class WorkerKonfirmasiPembayaranController extends Controller
{
    public function index($id_order){
        $order = Pesanan::with(['customer', 'tipe_layanan', 'voucher'])->findOrFail($id_order);
        return view('worker.konfirmasiPembayaran', [
            "title" => "Konfirmasi pembayaran",
            "order" => $order,
            "role" => session('userData')->role,
            "worker" => session('userData')->worker,
        ]);
    }
}
