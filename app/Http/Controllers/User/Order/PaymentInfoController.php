<?php

namespace App\Http\Controllers\User\Order;

use App\Models\Pesanan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentInfoController extends Controller
{
    public function index(string $id_order) {

        $order = Pesanan::with(['customer', 'tipe_layanan', 'voucher'])->findOrFail($id_order);
        return view("user.order.payment-info", [
            "title" => "Rincian Pembayaran",
            "nama" => session('userData')->customer->nama,
            "role" => session('userData')->role,
            "order" => $order

        ]);
    }
}
