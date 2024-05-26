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

class WorkerDashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index()
    {
        $semuaWorker = DB::table('worker')->paginate(7);
        return view('dashboard.worker.index', [
            "title" => "Dashboard Worker",
            "semuaWorker" => $semuaWorker,
        ]);
    }

    public function show(string $id)
    {
        $worker = Worker::findOrFail($id);
        return view('dashboard.worker.show', [
            "title" => "Detail Worker",
            "worker" => $worker,
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
