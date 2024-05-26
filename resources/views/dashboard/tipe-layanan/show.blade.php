@extends("layouts.dashboard-layout")

@section("content")
    <div>
        <h1 class="text-2xl font-bold">{{ $tipeLayanan->nama_tipe_layanan }}</h1>
        <p class="mt-2">{{ $tipeLayanan->deskripsi_tipe_layanan }}</p>
        <p class="mt-2">Harga: {{ $tipeLayanan->harga_tipe_layanan }}</p>
        <div class="mt-4">
            <img src="{{ asset('storage/' . $tipeLayanan->foto_tipe_layanan) }}" alt="gambar_layanan" class="max-w-full h-auto">
        </div>
    </div>
@endsection
