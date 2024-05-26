@extends('layouts.user-layout')
@section('content')
<div class="container px-8 space-y-6">
    <h1 class="text-center text-2xl font-bold text-primary">Silahkan Pilih Jenis Kendaraan</h1>
    <div class="space-y-4">
        <div>
            <a href="{{ route('order-detail') }}">
                <button class="bg-primary hover:bg-primary-dark rounded-lg w-full p-6 font-bold text-white flex justify-between">
                    <div>
                        <p class="py-2 text-2xl">Sepeda</p>
                        <p class="text-lg">Rp5000</p>
                    </div>
                    <img src="{{ asset('assets/images/sepeda.jpg') }}" alt="" class="border-2 border-red-900" width="130px">
                </button>
            </a>
        </div>
        <div>
            <a href="#">
                <button class="bg-primary hover:bg-primary-dark rounded-lg w-full p-6 font-bold text-white flex justify-between">
                    <div>
                        <p class="py-2 text-2xl">Motor</p>
                        <p class="text-lg">Rp10000</p>
                    </div>
                    <img src="{{ asset('assets/images/sepeda.jpg') }}" alt="" class="border-2 border-red-900" width="130px">
                </button>
            </a>
        </div>
        <div>
            <a href="#">
                <button class="bg-primary hover:bg-primary-dark rounded-lg w-full p-6 font-bold text-white flex justify-between">
                    <div>
                        <p class="py-2 text-2xl">Mobil</p>
                        <p class="text-lg">Rp30000</p>
                    </div>
                    <img src="{{ asset('assets/images/sepeda.jpg') }}" alt="" class="border-2 border-red-900" width="130px">
                </button>
            </a>
        </div>
    </div>
    <a href="{{ route('home') }}">
        <button class="bg-primary hover:bg-primary-dark text-white font-bold py-2 px-4 mt-8 w-full rounded-lg">
            Batal
        </button>
    </a>
</div>
@endsection
