<?php

namespace App\Http\Controllers\User\Order;

use App\Models\Pesanan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CancelUserOrderController extends Controller
{
    public function cancelOrder($id_order)
    {
        $order = Pesanan::find($id_order);
        $order->update([
            'status_order' => 'Dibatalkan',
        ]);
        return redirect()->route('home');
    }
}
