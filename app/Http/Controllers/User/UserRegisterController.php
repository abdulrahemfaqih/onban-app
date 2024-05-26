<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;

class UserRegisterController extends Controller
{
    public function index() {
        return view('register.register-user', [
            "title" => "Register"
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'nama_lengkap' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'konfirmasi_password' => 'required|same:password',
            'alamat' => 'required',
            'no_hp' => 'required',
            'jenis_kelamin' => 'required',
        ]);

        $login = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'user',
        ]);

        Customer::create([
            'login_id' => $login->id,
            'nama' => $request->nama_lengkap,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'jenis_kelamin' => $request->jenis_kelamin,

        ]);
        return redirect(route('login'))->with('success', 'Register Berhasil! Silahkan Login!');
    }
}
