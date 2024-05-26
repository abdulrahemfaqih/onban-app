<?php

namespace App\Http\Controllers\User\Order;

use App\Models\Pesanan;
use App\Models\TipeLayanan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChooseVehicleController extends Controller
{
    public function chooseVehicle($id_order)
    {
        $allTipeLayanan = TipeLayanan::all();
        return view('user.order.order-choose-vehicle', [
            "title" => "Pilih Kendaraan",
            "nama" => session('userData')->customer->nama,
            "role" => session('userData')->role,
            "allTipeLayanan" => $allTipeLayanan,
            "id_order" => $id_order
        ]);
    }

    public function updateTypeLayananOrder($id_order, $id_tipe_layanan)
    {
        $order = Pesanan::find($id_order);
        $order->update([
            'tipe_layanan_id' => $id_tipe_layanan,
        ]);
        return redirect()->route('konfirmasi-order', ['id_order' => $order->id_order]);
    }

}
