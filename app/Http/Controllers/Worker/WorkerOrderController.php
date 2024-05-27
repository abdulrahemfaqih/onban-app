<?php

namespace App\Http\Controllers\Worker;

use App\Models\Pesanan;
use App\Http\Controllers\Controller;
use App\Models\Worker;
use GuzzleHttp\Client;

class WorkerOrderController extends Controller
{

    public function hitungJarak($latCustomer, $longCustomer, $latWorker, $longWorker)
    {
        $earthRadius = 6371; // Radius of the earth in kilometers

        $latFrom = deg2rad($latCustomer);
        $lonFrom = deg2rad($longCustomer);
        $latTo = deg2rad($latWorker);
        $lonTo = deg2rad($longWorker);

        $latDelta = $latTo - $latFrom;
        $lonDelta = $lonTo - $lonFrom;

        $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) +
            cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
        return $angle * $earthRadius;
    }
    public function ambilOrder(string $id_order)
    {
        // ambil pesanan id_order yang mau di ambil
        $order = Pesanan::with(['customer', 'tipe_layanan', 'voucher'])->findOrFail($id_order);
        // ambil data worker yang nerima order
        $worker = Worker::findOrFail(session('userData')->worker->id_worker);
        $latWorker = $worker->latitude;
        $longWorker = $worker->longitude;
        $latCustomer = $order->latitude;
        $longCustomer = $order->longitude;

        // hitung jarak antara worker dan customer
        $jarak = $this->hitungJarak($latWorker, $longWorker, $latCustomer, $longCustomer);


        // harga per km
        $hargaPerKm = 3000;

        // hitung total harga
        $hargaLayanan = $order->tipe_layanan->harga_tipe_layanan;
        $totalHarga = $hargaLayanan + ($hargaPerKm * $jarak);

        // update order
        $order->total_harga = $totalHarga;
        $order->jarak = $jarak;



        $order->worker_id = $worker->id_worker;
        $order->status_order = 'Diproses';
        $order->save();


        return view('worker.order', [
            "title" => "Order",
            "order" => $order,
            "role" => session('userData')->role,
            "worker" => session('userData')->worker,
            "latWorker" => $latWorker,
            "longWorker" => $longWorker

        ]);
    }

    public function konfirmasiPembayaran($id_order){
        $order = Pesanan::with(['customer', 'tipe_layanan'])->findOrFail($id_order);
        return view('worker.konfirmasiPembayaran', [
            "title" => "Konfirmasi pembayaran",
            "order" => $order,
            "role" => session('userData')->role,
            "worker" => session('userData')->worker,
        ]);
    }

    public function finishedOrder($id_order)
    {
        $order = Pesanan::with(['customer', 'tipe_layanan'])->findOrFail($id_order);
        $order->status_order = 'Selesai';
        $order->status_pembayaran = 'Berhasil';
        $order->save();
        return redirect()->route('worker-home');
    }

}
