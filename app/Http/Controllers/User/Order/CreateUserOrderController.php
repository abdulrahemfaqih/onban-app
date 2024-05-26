<?php

namespace App\Http\Controllers\User\Order;

use App\Models\Pesanan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CreateUserOrderController extends Controller
{
    public function createOrder()
    {
        $id_customer = session('userData')->customer->id_customer;

        $order = Pesanan::create([
            'customer_id' => $id_customer,
        ]);

        return redirect()->route('order-choose-vehicle', ['id_order' => $order->id_order]);
    }

    
}
