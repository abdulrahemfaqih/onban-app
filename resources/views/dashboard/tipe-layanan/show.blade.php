@extends("layouts.dashboard-layout")

@section("content")
    <div class="p-4 px-6 bg-white shadow-md flex flex-col md:flex-row gap-6">
        <div class="md:w-1/3">
            <img src="{{ asset('storage/' . $tipeLayanan->foto_tipe_layanan) }}" alt="gambar_layanan" class="w-full h-auto rounded">
        </div>
        <div class="md:w-2/3">
            <h1 class="text-2xl font-bold mb-4">{{ $tipeLayanan->nama_tipe_layanan }}</h1>
            <p class="mb-4">{{ $tipeLayanan->deskripsi_tipe_layanan }}</p>
            <p class="font-semibold">Harga: {{ $tipeLayanan->harga_tipe_layanan }}</p>
        </div>
    </div>
@endsection
