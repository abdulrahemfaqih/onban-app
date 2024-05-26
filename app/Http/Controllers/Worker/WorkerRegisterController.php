<?php

namespace App\Http\Controllers\Worker;

use App\Models\User;
use App\Models\Worker;
use App\Mail\kirimEmail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\StatusPenerimaanWorker;
use Illuminate\Support\Facades\Mail;

class WorkerRegisterController extends Controller
{
    public function index()
    {
        $status_penerimaan = StatusPenerimaanWorker::first();
        return view('register.register-worker', [
            "title" => "Register",
            "status_penerimaan" => $status_penerimaan->status_penerimaan,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'username' => 'required|unique:login,username',
            'alamat' => 'required',
            'no_hp' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'konfirmasi_password' => 'required|same:password',
            "foto_ktp" => "file|max:2048",
            "foto_formal" => "file|max:2048",
            "jenis_kelamin" => "required"
        ]);

        if ($request->hasFile('foto_ktp')) {
            $fotoKtpPath = $request->file('foto_ktp')->store('worker');
        }

        if ($request->hasFile('foto_formal')) {
            $fotoFormalPath = $request->file('foto_formal')->store('worker');

        }
        $login = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'worker',
        ]);

        Worker::create([
            'login_id' => $login->id,
            'nama' => $request->nama_lengkap,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'foto_ktp' => $fotoKtpPath ?? null,
            'jenis_kelamin' => $request->jenis_kelamin,
            'foto_formal' => $fotoFormalPath ?? null,
        ]);

        $emailData = [
            "title" => "Mail Dari onban_app",
            "body" => "berikut proses lebih lanjut setelah anda membuat akun sebagai worker agar dapat login ke aplikasi."
        ];

        Mail::to($request->email)->send(new kirimEmail($emailData));

        return redirect(route('login-worker'))->with('success', 'Pembuatan Akun Worker berhasil, anda bisa login setelah admin mengkonfirmasi akun anda!, silahkan cek email anda untuk informasi lebih lanjut.');
    }
}
