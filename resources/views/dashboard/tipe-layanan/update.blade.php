@extends('layouts.dashboard-layout')


@section('content')
    <form class="flex flex-col max-w-2xl gap-y-4" action="{{ route('tipe-layanan.update', $tipeLayanan->id_tipe_layanan) }}" method="post" enctype="multipart/form-data">
        @method('put')
        @csrf
        <h2> Nama Tipe Layanan</h2>
        <input type="text" name="nama_tipe_layanan" value="{{ $tipeLayanan->nama_tipe_layanan }}">
        <h2> Deskripsi Tipe Layanan</h2>
        <input type="text" name="deskripsi_tipe_layanan" value="{{ $tipeLayanan->deskripsi_tipe_layanan }}">
        <h2> Harga Tipe Layanan</h2>
        <input type="number" name="harga_tipe_layanan" value="{{ $tipeLayanan->harga_tipe_layanan }}">
        <img class="h-40 w-32" src="{{ asset('storage/' . $tipeLayanan->foto_tipe_layanan) }}" alt="gambar_layanan">
        <input type="file" name="foto_tipe_layanan" >
        <button  type="submit" class="bg-primary hover:bg-blue-700 font-bold py-2 px-4 rounded text-black">Submit</button>
    </form>
@endsection
