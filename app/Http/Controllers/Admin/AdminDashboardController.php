<?php

namespace App\Http\Controllers\Admin;

use App\Models\Worker;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\StatusPenerimaanWorker;

class AdminDashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {

        $jumlahWorkerAktif = Worker::where('status_menerima_order', 1)->count();
        $jumlahWorkerNonAktif = Worker::where('status_menerima_order', 0)->count();
        $jumlahCustomer = Customer::count();
        $status_penerimaan_worker = StatusPenerimaanWorker::first();
        $jumlahWorkerTerverifikasi = Worker::where('status_verifikasi', 1)->count();
        $jumlahWorkerBelumTerverifikasi = Worker::where('status_verifikasi', 0)->count();

        return view('dashboard.index', [
            "title" => "Dashboard",
            "jumlahWorkerAktif" => $jumlahWorkerAktif,
            "jumlahWorkerNonAktif" => $jumlahWorkerNonAktif,
            "jumlahCustomer" => $jumlahCustomer,
            "status_penerimaan_worker" => $status_penerimaan_worker,
            "jumlahWorkerTerverifikasi" => $jumlahWorkerTerverifikasi,
            "jumlahWorkerBelumTerverifikasi" => $jumlahWorkerBelumTerverifikasi
        ]);
    }
}
