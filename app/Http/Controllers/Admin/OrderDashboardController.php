<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class OrderDashboardController extends Controller
{
    public function index()
    {
        $orders_menunggu_pekerja = Pesanan::with(['worker', 'customer'])
            ->where('status_order', 'Menunggu Pekerja')
            ->paginate(10, ['*'], 'menunggu_pekerja_page');

        $orders_di_proses = Pesanan::with(['worker', 'customer'])
            ->where('status_order', 'Di Proses')
            ->paginate(10, ['*'], 'di_proses_page');

        $orders_selesai = Pesanan::with(['worker', 'customer'])
            ->where('status_order', 'Selesai')
            ->paginate(10, ['*'], 'selesai_page');

        return view('dashboard.order.index', [
            "title" => "Order",
            "orders_menunggu_pekerja" => $orders_menunggu_pekerja,
            "orders_di_proses" => $orders_di_proses,
            "orders_selesai" => $orders_selesai
        ]);
    }

    public function show(string $id_order)
    {
        $order = Pesanan::with(['worker', 'customer', 'tipe_layanan', 'voucher'])
            ->find($id_order);

        return view('dashboard.order.show', [
            "title" => "Order",
            "order" => $order
        ]);
    }
}
