@extends('layouts.user-layout')
@section('content')
<div class="pb-12 w-full lg:w-2/3 flex flex-col space-y-6 min-h-full md:mx-auto">
    <h1 class="text-center text-2xl font-bold text-primary mx-auto absolute w-3/4 h-40 top-28 left-1/2 right-1/2 translate-x-[-50%] ">Silahkan Pilih Jenis Kendaraan</h1>
    <div class="space-y-4 h-full py-12 md:w-3/4 w-full flex mx-auto flex-col">
        <div>
            <a href="{{ route('order-detail') }}" >
                <button class="bg-primary hover:bg-primary-dark rounded-lg w-full p-6 font-bold text-white flex justify-between" value="sepeda">
                    <div>
                        <p class="py-2 text-2xl">Sepeda</p>
                        <p class="text-lg">Rp 5000</p>
                    </div>
                    <img src="{{ asset('assets/images/sepeda.svg') }}" alt="" class="drop-shadow-md" width="130px">
                </button>
            </a>
        </div>
        <div>
            <a href="{{ route('order-detail') }}">
                <button class="bg-primary hover:bg-primary-dark rounded-lg w-full p-6 font-bold text-white flex justify-between" value="motor">
                    <div>
                        <p class="py-2 text-2xl">Motor</p>
                        <p class="text-lg">Rp 10000</p>
                    </div>
                    <img src="{{ asset('assets/images/motor.svg') }}" alt="" class="drop-shadow-md" width="130px">
                </button>
            </a>
        </div>
        <div>
            <a href="{{ route('order-detail') }}">
                <button class="bg-primary hover:bg-primary-dark rounded-lg w-full p-6 font-bold text-white flex justify-between" value="mobil">
                    <div>
                        <p class="py-2 text-2xl">Mobil</p>
                        <p class="text-lg">Rp 30000</p>
                    </div>
                    <img src="{{ asset('assets/images/mobil.svg') }}" alt="" class="drop-shadow-md" width="130px">
                </button>
            </a>
        </div>
    </div>
    <a href="{{ route('home') }}" class="flex justify-center md:w-2/3 md:mx-auto">
        <button class="bg-primary hover:bg-primary-dark text-white font-bold py-2 px-4 mt-8 w-3/4 mx-auto rounded-lg">
            Batal
        </button>
    </a>

</div>
@endsection
