<?php

namespace App\Http\Controllers\User\Order;

use App\Http\Controllers\Controller;
use App\Models\Pesanan;
use Illuminate\Http\Request;


class FindWorkerController extends Controller
{
    public function __invoke($id_order)
    {
        $order = Pesanan::with(['worker', 'customer', 'tipe_layanan'])->where('id_order', $id_order)->first();
        $userLocation = [
            'latitude' => $order->latitude,
            'longitude' => $order->longitude
        ];

        $workerLocation = [
            'latitude' => $order->worker->latitude,
            'longitude' => $order->worker->longitude
        ];

        $pricePerKm = 3000;

        if ($order->status_order == 'Selesai' && $order->status_pembayaran == 'Berhasil') {
            return redirect()->route('ulasan', $order->id_order);
        }
        return view('user.order.find-worker', [
            "title" => "Cari Pekerja",
            "nama" => session('userData')->customer->nama,
            "role" => session('userData')->role,
            'order' => $order,
            'userLocation' => $userLocation,
            'workerLocation' => $workerLocation,
            'pricePerKm' => $pricePerKm,
            'harga_tipe_layanan' => $order->tipe_layanan->harga_tipe_layanan,
        ]);
    }
}
