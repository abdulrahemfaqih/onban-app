@extends('layouts.dashboard-layout')

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-8">Detail Order</h1>

        {{-- Order Information --}}
        <div class="bg-white p-6 rounded-lg shadow-md mb-6">
            <h2 class="text-xl font-semibold mb-4">Informasi Order</h2>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <p><strong>Id Order:</strong> {{ $order->id_order }}</p>
                    <p><strong>Status Order:</strong> {{ $order->status_order }}</p>
                    <p><strong>Tipe Layanan:</strong> {{ $order->tipe_layanan->nama_tipe_layanan }}</p>
                    <p><strong>Alamat:</strong> {{ $order->alamat }}</p>
                    <p><strong>Latitude:</strong> {{ $order->latitude }}</p>
                    <p><strong>Longitude:</strong> {{ $order->longitude }}</p>
                </div>
                <div>
                    <p><strong>Tanggal:</strong> {{ $order->tanggal }}</p>
                    <p><strong>Waktu:</strong> {{ $order->waktu }}</p>
                    <p><strong>Catatan:</strong> {{ $order->catatan ?? 'Tidak ada catatan' }}</p>
                    <p><strong>Jarak:</strong> {{ $order->jarak ?? 'Tidak tersedia' }}</p>
                    <p><strong>Total Harga:</strong> {{ $order->total_harga ?? 'Belum dihitung' }}</p>
                </div>
            </div>
        </div>

        {{-- Customer Information --}}
        <div class="bg-white p-6 rounded-lg shadow-md mb-6">
            <h2 class="text-xl font-semibold mb-4">Informasi Customer</h2>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <p><strong>Nama Customer:</strong> {{ $order->customer->nama }}</p>
                    <p><strong>No HP:</strong> {{ $order->customer->no_hp }}</p>
                    <p><strong>Alamat:</strong> {{ $order->customer->alamat }}</p>
                </div>
                <div>
                    <p><strong>Jenis Kelamin:</strong> {{ $order->customer->jenis_kelamin }}</p>
                    <p><strong>Foto Profil:</strong></p>
                    <img src="{{ $order->customer->foto_profil }}" alt="Foto Profil" class="w-32 h-32 rounded-full">
                </div>
            </div>
        </div>

        {{-- Voucher Information --}}
        <div class="bg-white p-6 rounded-lg shadow-md mb-6">
            <h2 class="text-xl font-semibold mb-4">Informasi Voucher</h2>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <p><strong>Nama Voucher:</strong> {{ $order->voucher->nama_voucher }}</p>
                    <p><strong>Kode Voucher:</strong> {{ $order->voucher->kode_voucher }}</p>
                    <p><strong>Deskripsi:</strong> {{ $order->voucher->deskripsi }}</p>
                </div>
                <div>
                    <p><strong>Potongan Harga:</strong> {{ $order->voucher->potongan_harga * 100 }}%</p>
                    <p><strong>Tanggal Mulai:</strong> {{ $order->voucher->tanggal_mulai }}</p>
                    <p><strong>Tanggal Berakhir:</strong> {{ $order->voucher->tanggal_berakhir }}</p>
                </div>
            </div>
        </div>

        {{-- Worker Information --}}
        @if ($order->worker)
            <div class="bg-white p-6 rounded-lg shadow-md mb-6">
                <h2 class="text-xl font-semibold mb-4">Informasi Worker</h2>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <p><strong>Nama Worker:</strong> {{ $order->worker->nama }}</p>
                        <p><strong>No HP:</strong> {{ $order->worker->no_hp }}</p>
                    </div>
                    <div>
                        <p><strong>Alamat:</strong> {{ $order->worker->alamat }}</p>
                    </div>
                </div>
            </div>
        @else
            <div class="bg-white p-6 rounded-lg shadow-md mb-6">
                <h2 class="text-xl font-semibold mb-4">Informasi Worker</h2>
                <p>Belum ada worker yang ditugaskan.</p>
            </div>
        @endif
    </div>
@endsection
