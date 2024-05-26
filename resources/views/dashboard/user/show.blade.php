@extends('layouts.dashboard-layout')

@section('content')
    <div class="w-full my-6 pr-0 lg:pr-2">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h1 class="text-2xl font-bold mb-4">Detail Pelanggan</h1>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <h2 class="text-lg font-semibold">Nama:</h2>
                    <p>{{ $customer->nama }}</p>
                </div>
                <div>
                    <h2 class="text-lg font-semibold">Nomor HP:</h2>
                    <p>{{ $customer->no_hp }}</p>
                </div>
                <div>
                    <h2 class="text-lg font-semibold">Alamat:</h2>
                    <p>{{ $customer->alamat }}</p>
                </div>
                <div>
                    <h2 class="text-lg font-semibold">Jenis Kelamin:</h2>
                    <p>{{ $customer->jenis_kelamin }}</p>
                </div>
                <div class="col-span-2">
                    <h2 class="text-lg font-semibold">Foto Profil:</h2>
                    <img class="mt-2 rounded" src="{{ asset('storage/' . $customer->foto_profil) }}" alt="Foto Profil">
                </div>
            </div>
            <button class="mt-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 focus:outline-none focus:bg-blue-600">
                Lihat Statistik Order Pelanggan
            </button>
        </div>
    </div>
@endsection
