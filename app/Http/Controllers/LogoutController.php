<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function __invoke()
    {
        if (auth()->user()->role == 'admin') {
            session()->forget('userData');
            Auth::logout();
            return redirect()->route('login-admin');
        } else if (auth()->user()->role == 'worker') {
            session()->forget('userData');
            Auth::logout();
            return redirect()->route('login-worker');
        } else {
            session()->forget('userData');
            Auth::logout();
            return redirect()->route('login');
        }
    }
}
