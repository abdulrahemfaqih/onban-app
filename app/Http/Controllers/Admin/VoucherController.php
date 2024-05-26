<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Voucher;
use Illuminate\Http\Request;

class VoucherController extends Controller
{

    protected $potonganHarga = [
        "10%" => 0.10,
        "15%" => 0.15,
        "20%" => 0.20,
        "25%" => 0.25,
        "30%" => 0.30,
        "35%" => 0.35,
        "40%" => 0.40,
        "45%" => 0.45,
        "50%" => 0.50,
    ];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('dashboard.voucher.index', [
            "title" => "Dashboard Voucher",
            "vouchers" => Voucher::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()

    {
        // isi dengan 10% -> 0.10, terus 15% dan selanjutnya
        // key nya 10%, valuenya = 0.10 sampai 100%

        return view("dashboard.voucher.create", [
            "title" => "Tambah Voucher",
            "potonganHarga" => $this->potonganHarga
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "kode_voucher" => "min:8|required|unique:voucher,kode_voucher",
            "potongan_harga" => "required",
            "nama_voucher" => "required",
            "tanggal_mulai" => "required",
            "tanggal_berakhir" => "required",
            "deskripsi" => "required"
        ]);

        Voucher::create($validatedData);
        return redirect()->route('vouchers.index')->with('success', 'Voucher berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $kode_voucher)
    {
        return view('dashboard.voucher.show', [
            "title" => "Detail Voucher",
            "voucher" => Voucher::where('kode_voucher', $kode_voucher)->first(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $kode_voucher)
    {
        return view('dashboard.voucher.update', [
            "title" => "Edit Voucher",
            "voucher" => Voucher::where('kode_voucher', $kode_voucher)->first(),
            "potonganHarga" => $this->potonganHarga
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $kode_voucher)
    {
        $validatedData = $request->validate([
            "kode_voucher" => "min:8|required",
            "potongan_harga" => "required",
            "nama_voucher" => "required",
            "tanggal_mulai" => "required",
            "tanggal_berakhir" => "required",
            "deskripsi" => "required"
        ]);

        Voucher::where('kode_voucher', $kode_voucher)->update($validatedData);
        return redirect()->route('vouchers.index')->with('success', 'Voucher berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $kode_voucher)
    {
        Voucher::where('kode_voucher', $kode_voucher)->delete();
        return redirect()->route('vouchers.index')->with('success', 'Voucher berhasil dihapus');
    }

}
