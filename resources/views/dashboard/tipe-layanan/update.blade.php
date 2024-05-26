@extends('layouts.dashboard-layout')


@section('content')
    <form class="flex flex-col max-w-2xl gap-y-4" action="{{ route('tipe-layanan.update', $tipeLayanan->id_tipe_layanan) }}" method="post" enctype="multipart/form-data">
        @method('put')
        @csrf
        <input type="text" name="nama_tipe_layanan" value="{{ $tipeLayanan->nama_tipe_layanan }}">
        <input type="text" name="deskripsi_tipe_layanan" value="{{ $tipeLayanan->deskripsi_tipe_layanan }}">
        <input type="number" name="harga_tipe_layanan" value="{{ $tipeLayanan->harga_tipe_layanan }}">
        <img class="h-40 w-32" src="{{ asset('storage/' . $tipeLayanan->foto_tipe_layanan) }}" alt="gambar_layanan">
        <input type="file" name="foto_tipe_layanan" >
        <button  type="submit">Submit</button>
    </form>
@endsection
