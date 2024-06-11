<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Worker;
use Illuminate\Http\Request;
use App\Mail\beritahuVerifikasi;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

use function PHPUnit\Framework\returnSelf;

class WorkerDashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index(Request $request)
    {
        $query = DB::table('worker');

        if ($request->has('status_verifikasi')) {
            $status_verifikasi = $request->input('status_verifikasi');
            if ($status_verifikasi != 'all') {
                $query->where('status_verifikasi', $status_verifikasi);
            }
        }

        if ($request->has('status_menerima_order')) {
            $status_menerima_order = $request->input('status_menerima_order');
            if ($status_menerima_order != 'all') {
                $query->where('status_menerima_order', $status_menerima_order);
            }
        }

        $semuaWorker = $query->paginate(7);

        return view('dashboard.worker.index', [
            "title" => "Dashboard Worker",
            "semuaWorker" => $semuaWorker,
        ]);
    }


    public function show(Request $request, string $id)
    {
        $worker = Worker::findOrFail($id);

        $selectedYear = $request->input('year', Carbon::now()->year);

        $orders = DB::table('order')
        ->select(DB::raw('COUNT(*) as count'), DB::raw('MONTH(created_at) as month'))
        ->where('worker_id', $id)
        ->whereYear('created_at', $selectedYear)
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->get()
            ->pluck('count', 'month')
            ->toArray();

        $months = [];
        for ($i = 1; $i <= 12; $i++) {
            $months[$i] = $orders[$i] ?? 0;
        }
        // return $months;
    
        $years = DB::table('order')
        ->select(DB::raw('DISTINCT YEAR(created_at) as year'))
        ->where('worker_id', $id)
        ->orderBy('year', 'desc')
            ->pluck('year')
            ->toArray();

        return view('dashboard.worker.show', [
            "title" => "Detail Worker",
            "worker" => $worker,
            "orders" => $months,
            "years" => $years,
            "selectedYear" => $selectedYear

        ]);
    }

    public function destroy(string $id)
    {
        $worker = Worker::findOrFail($id);
        $foto_ktp_path = $worker->foto_ktp;
        $foto_formal_path = $worker->foto_formal;
        Storage::delete([$foto_ktp_path, $foto_formal_path]);
        $login_id = $worker->login_id;
        $worker->delete();
        $login = User::findOrFail($login_id);
        $login->delete();
        return redirect()->route('admin-workers')->with('success', 'Worker berhasil dihapus!');
    }

    public function updateStatus(string $id)
    {
        $worker = Worker::findOrFail($id);
        $worker->status_verifikasi = !$worker->status_verifikasi;
        $worker->save();

        $email_worker = User::findOrFail($worker->login_id)->email;
        // saya ingin memberitahukan kepada worker bahwa status verifikasi akunnya telah diubah
        if ($worker->status_verifikasi) {
            $emailData = [
                "title" => "Notifikasi Verifikasi Akun",
                "body" => "Akun Worker anda telah diverifikasi!"
            ];
            Mail::to($email_worker)->send(new beritahuVerifikasi($emailData));
            return redirect()->route('admin-workers')->with('success', 'Status verifikasi worker berhasil diubah!');
        } else {
            $emailData = [
                "title" => "Notifikasi Nonaktifkan Akun",
                "body" => "Akun Worker anda telah dinonaktifkan!"
            ];
            Mail::to($email_worker)->send(new beritahuVerifikasi($emailData));
            return redirect()->route('admin-workers')->with('success', 'Status verifikasi worker berhasil diubah!');
        }
    }
}
