@extends('layouts.worker-layout')
@section('content')
{{-- Name Card --}}
<h1 class="text-center font-bold text-gray-900 text-2xl">Total Pendapatan</h1>

<div class="p-4 text-center bg-orange-100 shadow-lg">
    <p class="text-md font-bold text-gray-800">Pendapatan Bulan Ini</p>
    <p class="text-sm font-normal text-gray-500 dark:text-gray-400 pb-2">1 Mei 2024 - 31 Mei 2024</p>
    <p class="text-3xl font-bold text-primary-dark dark:text-white pb-2">Rp{{ $orders->sum('total_harga') }}</p>
</div>

<div class="max-w-sm w-full bg-white rounded-lg shadow-lg p-4 md:p-6">
    <p class="text-md font-bold text-gray-800 pb-3 text-center">Januari 2024</p>
    <div class="h-60 overflow-y-auto">
        <ul role="list" class="divide-y divide-gray-300">
            @foreach ($orders as $order)
            <li class="py-3">
                <div class="flex justify-between">
                    <div>
                        <p class="text-base font-normal text-gray-500 dark:text-gray-400">{{ $order->tanggal }}</p>
                        <div class="flex items-center">
                            <i class="fi fi-rr-dollar pr-3 text-green-600"></i>
                            <h5 class="text-xl font-bold text-gray-900 dark:text-white">{{ $order->total_harga }}</h5>
                        </div>
                    </div>
                    <div class="flex items-center px-2.5 py-0.5 text-base font-semibold text-gray-500 dark:text-green-500 text-center">
                        {{ $order->waktu }}
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
    </div>



</div>

@endsection
