<?php

namespace App\Http\Controllers\User\Order;

use App\Models\User;
use App\Models\Worker;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\MailCancelOrderForWorker;
use Illuminate\Support\Facades\Mail;

class CancelUserOrderController extends Controller
{
    public function cancelOrder($id_order)
    {
        $order = Pesanan::with(['worker', 'customer'])->where('id_order', $id_order)->first();
        $order_worker_login_id = $order->worker->login_id;

        $email_worker = User::with('worker')->where('id', $order_worker_login_id)->first()->email;
        $emailData = [
            'title' => 'Orderan dibatalkan',
            'body' => 'Orderan anda telah dibatalkan oleh ' . $order->customer->nama,
        ];


        Mail::to($email_worker)->send(new MailCancelOrderForWorker($emailData));

        $order->update([
            'status_order' => 'Dibatalkan',
            'status_pembayaran' => 'Gagal'
        ]);


        return redirect()->route('home');
    }
}
