<?php

namespace App\Http\Controllers\Admin;

use App\Models\TipeLayanan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class TipeLayananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.tipe-layanan.index', [
            "title" => "Tipe Layanan",
            "semuaTipeLayanan" => TipeLayanan::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.tipe-layanan.create', [
            "title" => "Tambah Tipe Layanan"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_tipe_layanan' => 'required',
            'deskripsi_tipe_layanan' => 'required',
            'harga_tipe_layanan' => 'required',
            'foto_tipe_layanan' => 'required|image'
        ]);

        if ($request->hasFile('foto_tipe_layanan')) {
            $fotoTipeLayananPath = $request->file('foto_tipe_layanan')->store('tipe-layanan');
        }

        TipeLayanan::create([
            'nama_tipe_layanan' => $request->nama_tipe_layanan,
            'deskripsi_tipe_layanan' => $request->deskripsi_tipe_layanan,
            'harga_tipe_layanan' => $request->harga_tipe_layanan,
            'foto_tipe_layanan' => $fotoTipeLayananPath ?? null
        ]);

        return redirect()->route('tipe-layanan.index')->with('success', 'Tipe Layanan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('dashboard.tipe-layanan.show', [
            "title" => "Detail Tipe Layanan",
            "tipeLayanan" => TipeLayanan::findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('dashboard.tipe-layanan.update', [
            "title" => "Edit Tipe Layanan",
            "tipeLayanan" => TipeLayanan::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $tipeLayanan = TipeLayanan::findOrFail($id);

        $rules = [
            'nama_tipe_layanan' => 'required',
            'deskripsi_tipe_layanan' => 'required',
            'harga_tipe_layanan' => 'required'
        ];

        if ($request->hasFile('foto_tipe_layanan')) {
            $rules['foto_tipe_layanan'] = 'image';
        }

        $validatedData = $request->validate($rules);

        if ($request->hasFile('foto_tipe_layanan')) {
            if ($tipeLayanan->foto_tipe_layanan) {
                Storage::delete($tipeLayanan->foto_tipe_layanan);
            }
            $validatedData['foto_tipe_layanan'] = $request->file('foto_tipe_layanan')->store('tipe-layanan');
        }

        $tipeLayanan->update($validatedData);

        return redirect()->route('tipe-layanan.index')->with('success', 'Tipe Layanan berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tipeLayanan = TipeLayanan::findOrFail($id);

        if ($tipeLayanan->foto_tipe_layanan) {
            Storage::delete($tipeLayanan->foto_tipe_layanan);
        }

        $tipeLayanan->delete();

        return redirect()->route('tipe-layanan.index')->with('success', 'Tipe Layanan berhasil dihapus');
    }
}
