<?php

namespace App\Http\Controllers\User\Order;

use App\Models\Pesanan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UlasanController extends Controller
{
    public function index(string $id_order)
    {
        $order = Pesanan::with('customer', 'worker', 'tipe_layanan', 'voucher', 'ulasan')
            ->where('customer_id', auth()->user()->customer->id_customer)
            ->where('id_order', $id_order)
            ->where('status_pembayaran', 'Berhasil')
            ->where('status_order', 'Selesai')
            ->firstOrFail();
        return view('user.order.ulasan', [
            "title" => "ulasan",
            "order" => $order
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'rating' => 'required',
            'ulasan' => 'required'
        ]);

        $order = Pesanan::find($request->id_order);
        $order->ulasan()->create([
            'customer_id' => auth()->user()->customer->id_customer,
            'order_id' => $request->id_order,
            'worker_id' => $order->worker_id,
            'rating' => $request->rating,
            'ulasan' => $request->ulasan
        ]);

        return redirect()->route('orderHistory')->with('success', 'Ulasan berhasil ditambahkan!');
    }
}
