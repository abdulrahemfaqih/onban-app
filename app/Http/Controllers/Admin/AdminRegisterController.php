<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminRegisterController extends Controller
{
    public function index() {
        return view('register.register-admin');
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'nama_lengkap' => 'required',
        //     'username' => 'required',
        //     'email' => 'required|email',
        //     'password' => 'required',
        //     'konfirmasi_password' => 'required|same:password',
        //     'alamat' => 'required',
        //     'no_hp' => 'required',
        // ]);

        $login = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'admin',
        ]);

        Admin::create([
            'login_id' => $login->id,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,

        ]);

        return redirect(route('login-admin'))->with('success', 'Register Berhasil! Silahkan Login!');
    }
}
