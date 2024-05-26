<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function index()
    {
        return view('login.login-admin', [
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
            if ($user->role === 'admin') {
                $userData = User::with('admin')->find($user->id);
                session(['userData' => $userData]);
                return redirect()->intended(route('admin-dashboard'));
            } else {
                Auth::logout();
                return back()->with('error', 'Hanya Admin yang dapat login di sini!');
            }
        }
        return back()->with('error', 'Login Gagal! Password atau Username salah!');
    }
}
