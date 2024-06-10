@extends("layouts.dashboard-layout")

@section("content")
<div class="w-full my-6 pr-0 lg:pr-2">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <div class="mb-4">
                <h1 class="text-xl font-bold mb-2">Detail Voucher</h1>
                <hr class="border-b-2 border-gray-200">
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <h2 class="text-lg font-semibold">Kode Voucher:</h2>
                    <p>{{ $voucher->kode_voucher }}</p>
                </div>  
                <div>
                    <h2 class="text-lg font-semibold">Nama Voucher:</h2>
                    <p>{{ $voucher->nama_voucher }}</p>
                </div>
                <div>
                    <h2 class="text-lg font-semibold">Potongan Harga</h2>
                    <p>{{ $voucher->potongan_harga }}</p>
                </div>
                <div>
                    <h2 class="text-lg font-semibold">Deskripsi:</h2>
                    <p>{{ $voucher->deskripsi }}</p>
                </div>
                <div>
                    <h2 class="text-lg font-semibold">Tanggal Mulai:</h2>
                    <p>{{ $voucher->tanggal_mulai }}</p>
                </div>
                <div>
                    <h2 class="text-lg font-semibold">Tanggal Berakhir:</h2>
                    <p>{{ $voucher->tanggal_berakhir }}</p>
                </div>
@endsection
