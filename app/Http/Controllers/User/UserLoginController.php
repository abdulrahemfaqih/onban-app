<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserLoginController extends Controller
{
    public function index()
    {
        return view('login.login-user', [
            "title" => "Login"
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        if (auth()->attempt($credentials)) {
            $user = Auth::user();
            if ($user->role === 'user') {
                $userData = User::with('customer')->find($user->id);
                session(['userData' => $userData]);
                return redirect()->intended(route('home'));
            } else {
                Auth::logout();
                return back()->with('error', 'Hanya pelanggan yang dapat login di sini!');
            }
        }
        return back()->with('error', 'Login Gagal! Silahkan cek username dan password anda!');
    }
}
