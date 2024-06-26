<?php

namespace App\Http\Controllers\Worker;

use App\Http\Controllers\Controller;
use App\Models\Pesanan;
use App\Models\Worker;
use GuzzleHttp\Client;

class WorkerHomeController extends Controller
{
    public function getMapboxDistance($latWorker, $longWorker, $latCustomer, $longCustomer)
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

    public function hitungHarga($id_order){
        $order = Pesanan::with(['customer', 'tipe_layanan'])->findOrFail($id_order);
        $worker = Worker::findOrFail(session('userData')->worker->id_worker);

        $latWorker = $worker->latitude;
        $longWorker = $worker->longitude;
        $latCustomer = $order->latitude;
        $longCustomer = $order->longitude;
        $jarak = $this->getMapboxDistance($latWorker, $longWorker, $latCustomer, $longCustomer);
        $voucher = $order->voucher->potongan_harga ?? 0;

        $hargaPerKm = 3000;

        $hargaLayanan = $order->tipe_layanan->harga_tipe_layanan;
        $totalHarga = ($hargaLayanan + $hargaPerKm * $jarak);

        $potongan = $totalHarga * $voucher;
        $totalHarga -= $potongan;
        return $totalHarga;
    }

    public function orderDetail($id_order)
    {
        $order = Pesanan::with(['customer', 'tipe_layanan'])->findOrFail($id_order);
        return view('worker.detail-order', [
            "title" => "Detail order",
            "role" => session('userData')->role,
            "worker" => session('userData')->worker,
            "order" => $order,
            "harga" => $this->hitungHarga($id_order),
        ]);
    }

    public function __invoke()
    {
        // menampilkan list order yang ada
        $orders = Pesanan::with(['customer', 'tipe_layanan'])->orderBy('status_order', 'ASC')->get();

        $worker = Worker::findOrFail(session('userData')->worker->id_worker);

        // menampilkan order yang sedang diproses oleh worker yang nerima
        $order_proses = Pesanan::with(['customer', 'tipe_layanan'])
            ->where('worker_id', $worker->id_worker)
            ->where('status_order', 'Diproses')
            ->get();
        $id_worker = session('userData')->worker->id_worker;

        // mengambil status menerima order
        $status_menerima_order = Worker::findOrFail($id_worker)->status_menerima_order;

        // menampilkan order yang selesai
        $orders_selesai = Pesanan::where(['worker_id' => $id_worker, 'status_order' => 'Selesai'])->get();
        $total_pendapatan = $orders_selesai->sum('total_harga');


        // hitung harga
        foreach($orders as $order){
            if($order->status_order == "Menunggu Pekerja"){
                if ($status_menerima_order == 1){
                    $order->total_harga = 1;
                    $order->total_harga = $this->hitungHarga($order->id_order);
                }
            }
        }

        return view('worker.index', [
            "title" => "Home",
            "orders" => $orders,
            "role" => session('userData')->role,
            "worker" => session('userData')->worker,
            "status_menerima_order" => $status_menerima_order,
            "order_proses" => $order_proses,
            "total_pendapatan" => $total_pendapatan,
        ]);
    }
}
