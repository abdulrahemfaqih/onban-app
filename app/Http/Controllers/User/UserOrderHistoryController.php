<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserOrderHistoryController extends Controller
{
    public function index()
    {
        return view('user.orderHistory', [
            "title" => "Histori Order",
            "nama" => session('userData')->customer->nama,
            "role" => session('userData')->role
        ]);
    }
}
