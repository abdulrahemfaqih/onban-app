<?php

namespace App\Http\Controllers\User;

use App\Models\Pesanan;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserOrderHistoryController extends Controller
{
    public function index()
    {

        $customer = Customer::where('id_customer', session('userData')->customer->id_customer)->first();
        $orders = Pesanan::with('customer', 'worker', 'tipe_layanan', 'voucher', 'ulasan')

        ->where('customer_id', auth()->user()->customer->id_customer)
        ->where('status_pembayaran', 'Berhasil')
        ->where('status_order', 'selesai')
        ->get();

        return view('user.orderHistory', [
            "title" => "Histori Order",
            "customer" => $customer,
            "orders" => $orders
        ]);
    }
}
