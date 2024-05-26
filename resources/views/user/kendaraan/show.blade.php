@extends('layouts.user-layout')
@section('content')
    <img src="{{ asset('assets/images/sepeda.jpg') }}" alt="" class="">
    <div class="bg-primary rounded-lg px-8 py-4 mx-4">
        <p class="text-2xl text-white font-bold text-center">Informasi Order</p>
        <div class="flex justify-between text-white text-lg py-4">
            <div class="">
                <p>Kendaraan</p>
                <p>Harga</p>
                <p>Harga perkm</p>
            </div>
            <div class="text-right font-bold">
                <p>Mobil</p>
                <p>Rp30000</p>
                <p>Rp3000</p>
            </div>
        </div>
    </div>

    <div class="flex flex-col text-center py-12 space-y-4 font-bold">
        <a href="#" class="bg-white border-4 border-primary text-primary mx-16 p-2 rounded-lg">dawd</a>
        <a href="#" class="bg-primary text-white mx-16 p-2 rounded-lg">dawd</a>
    </div>

@endsection
