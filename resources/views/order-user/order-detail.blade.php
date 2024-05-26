@extends('layouts.user-layout')
@section('content')
    <img src="{{ asset('assets/images/motor.svg')}}" alt="kendaraan" class="absolute top-28 left-20 md:left-1/2 lg:right-1/2 lg:translate-x-[-50%]">
    <div class="bg-primary rounded-lg px-8 py-4 mx-4 mt-10 md:w-3/4 md:mx-auto lg:w-1/3 lg:mx-auto">
        <p class="text-2xl text-white font-bold text-center">Informasi Order</p>
        <div class="flex justify-between text-lg py-4">
            <div class="text-orange-300">
                <p>Kendaraan</p>
                <p>Harga</p>
                <p>Harga per km</p>
            </div>
            <div class="text-right text-white">
                <p>Mobil</p>
                <p>Rp 30000</p>
                <p>Rp 3000</p>
            </div>
            
        </div>
    </div>

    <div class="flex flex-col text-center py-8 md:py-10 space-y-4 md:gap-10 font-bold ">
        <div x-data="{ open: false }" class="md:gap-4">
            <div x-on:click="open = ! open" class="border-primary w-3/4 md:w-96 flex gap-6 p-4 justify-between rounded-md mx-auto h-10 border-2 text-center content-center">
                <a href="#" class="text-primary content-center ">Gunakan Voucher</a>
                <img src="{{asset('assets/images/downArrow.svg')}}" alt="arrow">
              
            </div>
            <form x-show="open" x-transition class="flex flex-col  mx-auto">
                <input type="submit" value="potongan harga 5%" class=" text-primary border-gray-500 w-3/4 md:w-96 hover:text-orange-400  mx-auto h-10 border-b-2 text-center content-center">
                <input type="submit" value="potongan harga 5%" class=" text-primary border-gray-500 w-3/4 md:w-96 hover:text-orange-400  mx-auto h-10 border-b-2 text-center content-center">
                <input type="submit" value="potongan harga 5%" class=" text-primary border-gray-500 w-3/4 md:w-96 hover:text-orange-400  mx-auto h-10 border-b-2 text-center content-center">
                <input type="submit" value="potongan harga 5%" class=" text-primary border-gray-500 w-3/4 md:w-96 hover:text-orange-400  mx-auto h-10 border-b-2 text-center content-center">
            </form>
        </div>
        <div class="flex flex-col gap-4 md:gap-6 md:w-2/3 md:mx-auto lg:w-1/3">
            <a href="{{route('worker-find')}}" class="bg-white border-4 border-primary text-primary mx-16 p-2 rounded-lg hover:text-orange-400 hover:border-orange-400">Konfirmasi</a>
            <a href="{{route('order-pilih-kendaraan')}}" class="bg-primary text-white mx-16 p-2 rounded-lg hover:bg-orange-400">kembali</a>
        </div>
    </div>
    
@endsection
