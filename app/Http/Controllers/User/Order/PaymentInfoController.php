<?php

namespace App\Http\Controllers\User\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentInfoController extends Controller
{
    public function index() {
        return view("user.order.payment-info", [
            "title" => "Rincian Pembayaran",
            "nama" => session('userData')->customer->nama,
            "role" => session('userData')->role

        ]);
    }
}
