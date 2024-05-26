@extends('layouts.worker-layout')
@section('content')
    <p class="text-center font-bold text-gray-900 text-2xl">Ulasan</p>
    <div class="h-60 overflow-y-auto">
        <ul role="list" class="divide-y divide-gray-300">
            @foreach ($ulasan as $ulasan_item)
            <li class="py-3">
                <div class="flex justify-between">
                    <div>
                        <h5 class="text-md font-bold text-gray-900 dark:text-white">{{ $ulasan_item->customer->nama }}</h5>
                        <p class="text-base font-normal text-gray-500 dark:text-gray-400">{{ $ulasan_item->order->tanggal }} , {{ $ulasan_item->order->waktu }}</p>
                        <div class="flex items-center">
                            <i class="fi fi-rr-comment pr-3 text-green-600"></i>
                            <p class="text-base font-normal text-gray-800 dark:text-gray-400">{{ $ulasan_item->ulasan }}</p>
                        </div>
                    </div>
                    <div class="flex items-center px-2.5 py-0.5 text-base font-semibold text-gray-500 dark:text-green-500 text-center">
                        <i class="fi fi-rr-star"></i>
                        <p class="text-xl">{{ $ulasan_item->rating }}</p>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
@endsection
