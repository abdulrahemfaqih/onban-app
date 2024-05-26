<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function index() {
        return view('user.profile', [
            "title" => "Profil",
            "nama" => session('userData')->customer->nama,
            "role" => session('userData')->role
        ]);
    }
}
