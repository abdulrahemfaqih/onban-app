<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\Voucher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserVoucherController extends Controller
{
    public function index()
    {
        $sekarang = Carbon::now()->startOfDay();
        $vouchers = Voucher::where('tanggal_berakhir', '>=', $sekarang->toDateString())->get();

        // Hitung sisa hari
        foreach ($vouchers as $voucher) {
            $tanggalBerakhir = Carbon::parse($voucher->tanggal_berakhir)->startOfDay();
            $voucher->sisa_hari = $tanggalBerakhir->diffInDays($sekarang, true);
        }




        return view('user.voucher', [
            "title" => "Voucher",
            "nama" => session('userData')->customer->nama,
            "role" => session('userData')->role,
            "vouchers" => $vouchers,
        ]);
    }
}
