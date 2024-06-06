@extends("layouts.dashboard-layout")

@section("content")
    <div class="p-4 bg-white shadow-md  flex flex-row ">
        <div class="flex-row  ">
        <h1 class="text-2xl font-bold">{{ $tipeLayanan->nama_tipe_layanan }}</h1>
        <p class="mt-9 ">{{ $tipeLayanan->deskripsi_tipe_layanan }}</p>
        <p class="mt-2">Harga: {{ $tipeLayanan->harga_tipe_layanan }}</p>
        </div>
        <div class="mt-3 flex-row">
            <img src="{{ asset('storage/' . $tipeLayanan->foto_tipe_layanan) }}" alt="gambar_layanan" class="max-w-full h-auto">
        </div>
    </div>
@endsection
