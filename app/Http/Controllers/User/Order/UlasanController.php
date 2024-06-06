<?php

namespace App\Http\Controllers\User\Order;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class UlasanController extends Controller
{
    public function index()
    {
        return view('user.order.ulasan', [
            "title" => "ulasan",
            "nama" => session('userData')->customer->nama,
            "role" => session('userData')->role
        ]);
    }
}
