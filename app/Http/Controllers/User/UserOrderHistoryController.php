<?php

namespace App\Http\Controllers\User;

use App\Models\Pesanan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserOrderHistoryController extends Controller
{
    public function index()
    {
        $orders = Pesanan::with('customer', 'worker', 'tipe_layanan', 'voucher', 'ulasan')
        ->where('customer_id', auth()->user()->customer->id_customer)
        ->where('status_pembayaran', 'Berhasil')
        ->where('status_order', 'selesai')
        ->get();

        return view('user.orderHistory', [
            "title" => "Histori Order",
            "orders" => $orders
        ]);
    }
}
