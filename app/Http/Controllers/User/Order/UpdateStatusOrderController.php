<?php

namespace App\Http\Controllers\User\Order;

use App\Models\Worker;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use App\Mail\OrderNotification;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class UpdateStatusOrderController extends Controller
{
    public function updateStatusAndPosition(Request $request)
    {
        $jam = date('H:i:s');
        $tanggal = date('Y-m-d');
        $order = Pesanan::findOrFail($request->id_order);
        $order->status_order = $request->status_order;
        $order->latitude = $request->latitude;
        $order->longitude = $request->longitude;
        $order->voucher_id = $request->voucher_id;
        $order->waktu = $jam;
        $order->tanggal = $tanggal;
        $order->alamat = $request->alamat;
        $order->catatan = $request->catatan;
        $order->save();


        // saya ingin ambil semua data worker yang email saja dan yang status terima ordeannya 1 untuk memberitahu bawah ada orderan baru lewat email

        $workers = DB::table('worker')
        ->join('login', 'worker.login_id', '=', 'login.id')
        ->where('worker.status_menerima_order', 1)
        ->select('worker.nama', 'login.email')
        ->get();

        $emailData = [
            "title" => "Ada orderan baru nih, cek sekarang juga!",
            "body" => "Ada orderan baru nih, cek sekarang juga!"
        ];
        foreach ($workers as $worker) {

            $email_worker = $worker->email;
            Mail::to($email_worker)->send(new OrderNotification($emailData));
        }



        return redirect()->route('home')->with('success', 'Orderan berhasil di buat, tunggu Worker mengambil orderan anda.');
    }
}
