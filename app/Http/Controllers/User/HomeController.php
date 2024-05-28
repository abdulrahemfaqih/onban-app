<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Pesan;
use App\Models\Pesanan;
use Illuminate\Http\Request;

use function Laravel\Prompts\select;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $customer = Customer::where('id_customer', session('userData')->customer->id_customer)->first();
        $pendingOrder = Pesanan::where('customer_id', $customer->id_customer)
            ->whereIn('status_order', ['Menunggu Pekerja', 'Diproses'])
            ->first();

        $profileFoto = $customer->foto_profil;
        return view('user.index', [
            'customer' => $customer,
            "title" => "Home",
            "nama" => $customer->nama,
            "pendingOrder" => $pendingOrder
        ]);
    }
}
