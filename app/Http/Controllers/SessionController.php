<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function __invoke()
    {
        if (session('userData')) {
            if (session('userData')->role == 'admin') {
                return redirect()->route('admin-dashboard');
            } elseif (session('userData')->role == 'user') {
                return redirect()->route('home');
            } elseif (session('userData')->role == 'worker') {
                return redirect()->route('worker-home');
            }
        } else {
            return redirect()->route('login');
        }
    }
}
