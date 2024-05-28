<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserProfileController extends Controller
{
    public function index()
    {
        $profile = Customer::with('user')->where('login_id', session('userData')->id)->first();
        return view('user.profile', [
            "title" => "Profil",
            "profile" => $profile
        ]);
    }


    public function updateProfile(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'nama' => 'required',
            'email' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
        ]);

        $userId = Auth::id();
        $login = User::find($userId);
        $profile = Customer::where('login_id', $userId)->first();


        $login->username = $request->username;
        $login->email = $request->email;

        $profile->nama = $request->nama;
        $profile->no_hp = $request->no_hp;
        $profile->alamat = $request->alamat;

        if ($request->hasFile('foto_profil') && $profile->foto_profil) {
            Storage::delete($profile->foto_profil);
        }

        if ($request->hasFile('foto_profil')) {
            $fotoProfilPath = $request->file('foto_profil')->store('foto-profil');
            $profile->foto_profil = $fotoProfilPath;
        }

        $login->save();
        $profile->save();

        return redirect()->back()->with('success', 'Profil berhasil diperbarui.');

    }
}
