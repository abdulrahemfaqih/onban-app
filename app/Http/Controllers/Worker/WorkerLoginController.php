<?php

namespace App\Http\Controllers\Worker;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WorkerLoginController extends Controller
{
    public function index() {
        return view('login.login-worker', [
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
            if ($user->role === 'worker') {
                $userData = User::with('worker')->find($user->id);
                if (!$userData->worker->status_verifikasi) {
                    Auth::logout();
                    return back()->with('error', 'Akun anda belum diaktivasi oleh admin!');
                }
                session(['userData' => $userData]);
                return redirect()->intended(route('worker-home'));
            } else {
                Auth::logout();
                return back()->with('error', 'Hanya Worker yang dapat login di sini!');
            }
        }

        return back()->with('error', 'Login Gagal! Silahkan cek username dan password anda!');
    }
}
