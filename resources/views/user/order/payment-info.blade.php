@extends('layouts.user-layout')
@section('content')
    <div class="mx-auto top-32 w-full z-30 absolute content-center left-1/2 right-1/2 translate-x-[-50%] text-center">
        <h1 class="text-2xl font-semibold ">Informasi Pembayaran</h1>
    </div>
    <div class="flex-col flex flex-wrap justify-center md:w-2/3 lg:w-1/2 mx-auto">
        <div
            class=" bg-primary z-0 w-1/4 h-8 top-52  blur-sm absolute  content-center left-1/2 right-1/2 translate-x-[-50%] rounded-lg mx-auto">
            <div class="w-1/4 h-4 "></div>
        </div>
        <div
            class=" bg-primary z-0 w-1/4 h-10 top-48 absolute content-center left-1/2 right-1/2 translate-x-[-50%] rounded-lg mx-auto">
            <div class="w-1/4 h-4 "></div>
        </div>
        <div class="flex flex-col rounded-lg mx-auto w-3/4 h-80 backdrop-blur-lg bg-sky-100 opacity-85">
            <p class="text-black pt-2 mx-auto text-lg font-bold">{{ $order->customer->nama }}</p>
            <div class="flex gap-6 mx-auto pt-2 px-2 ">
               <div class="flex flex-col text-gray-500 flex-wrap text-sm gap-1">
                <p>Jenis Kendaraan</p>
                @if (isset($order->voucher_id))
                    <p>Potongan Voucher</p>
                @endif
                <p>Harga</p>
                <p>Jarak</p>
                <p>Harga per KM</p>
               </div>
                <div class="flex flex-col text-black flex-wrap text-sm gap-1 ">
                    <p>{{ $order->tipe_layanan->nama_tipe_layanan }}</p>
                    <p>{{ $order->voucher->potongan_harga *100 }}%</p>
                    <p>Rp {{ $order->tipe_layanan->harga_tipe_layanan }}</p>
                    <p>{{ $order->jarak }} km</p>
                    <p>Rp 3000</p>
                </div>
            </div>
            <div class="w-full  mt-5 gap-1 flex">
                <div class="absolute top-[52%]  bg-white rounded-r-full w-6 h-10"></div>
                <div class="absolute top-[52%] right-0  bg-white rounded-l-full w-6 h-10"></div>
                <hr class="border-gray-600 border-dashed  w-full">

            </div>
            <div class="flex mt-8  gap-8 w-full justify-center">
                <div class="flex flex-col w-1/2 ">
                    <p class="text-sm text-gray-500">Total</p>
                    <p class="text-lg font-medium text-black">Rp {{ $order->total_harga }}</p>
                </div>
                <div class="flex">
                    <img src="{{asset('assets/images/page.svg')}}" alt="">
                </div>
            </div>
        </div>
        <a class="mx-auto bg-primary p-2  mt-5 rounded-md" href="{{ route('worker-find', $order->id_order) }}">kembali</a>
    </div>


@endsection
