<?php

namespace App\Http\Controllers\User\Order;

use App\Models\Pesanan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Voucher;

class KonfirmasiOrderController extends Controller
{
    public function konfirmasiOrder($id_order) {
        $order = Pesanan::with('tipe_layanan')->find($id_order);
        $vouchers = Voucher::all();

        return view("user.order.konfirmasi-order", [
            "title" => "Konfirmasi Order",
            "informasi_order" => $order,
            "vouchers" => $vouchers

        ]);
    }


}
