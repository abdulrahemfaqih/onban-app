<?php

namespace App\Http\Controllers\Worker;

use App\Models\Pesanan;
use App\Http\Controllers\Controller;
use App\Models\Worker;
use GuzzleHttp\Client;

class WorkerOrderController extends Controller
{

    private function getMapboxDistance($latWorker, $longWorker, $latCustomer, $longCustomer)
    {
        $accessToken = env('MAPBOX_ACCESS_TOKEN');
        $client = new Client();
        $url = "https://api.mapbox.com/directions/v5/mapbox/driving/$longWorker,$latWorker;$longCustomer,$latCustomer?geometries=geojson&access_token=$accessToken";

        $response = $client->get($url);
        $data = json_decode($response->getBody(), true);

        if (isset($data['routes'][0]['distance'])) {
            $distance = $data['routes'][0]['distance'] / 1000;
            return $distance;
        } else {
            return null;
        }
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
        $jarak = $this->getMapboxDistance($latWorker, $longWorker, $latCustomer, $longCustomer);

        // ambil voucher yang dipakai
        $voucher = $order->voucher->potongan_harga ?? 0;

        // harga per km
        $hargaPerKm = 3000;

        // hitung total harga
        $hargaLayanan = $order->tipe_layanan->harga_tipe_layanan;
        $totalHarga = $hargaLayanan + ($hargaPerKm * $jarak) * $voucher;

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

    public function konfirmasiPembayaran($id_order)
    {
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
