<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Pesan;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $userId = session('userData')->customer->id_customer;
        $pendingOrder = Pesanan::where('customer_id', $userId)
            ->whereIn('status_order', ['Menunggu Pekerja', 'Diproses'])
            ->first();

        return view('user.index', [
            "title" => "Home",
            "nama" => session('userData')->customer->nama,
            "pendingOrder" => $pendingOrder
        ]);
    }
}
