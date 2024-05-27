<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function index() {
        $profile = Customer::with('user')->where('login_id', session('userData')->id)->first();
        return view('user.profile', [
            "title" => "Profil",
            "profile" => $profile
        ]);
    }


    public function updateProfile(Request $request) {
        $profile = Customer::where('login_id', session('userData')->id)->first();
        $profile->nama = $request->nama;
        $profile->no_hp = $request->no_hp;
        $profile->alamat = $request->alamat;
        $profile->jenis_kelamin = $request->jenis_kelamin;
        $profile->save();

        return redirect()->route('profile')->with('success', 'Profil berhasil diubah');
    }
}
