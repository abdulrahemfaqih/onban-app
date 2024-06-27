@extends('layouts.worker-layout')
@section('content')
    <div class="container mx-auto px-4 py-8">
        <p class="text-center font-bold text-gray-900 text-3xl mb-6">Ulasan</p>
        
        <div class="text-center mb-6">
            <p class="text-md font-bold text-gray-800">Rata-rata Rating</p>
            <p class="text-3xl font-bold text-primary-dark dark:text-white">{{ number_format($average_rating, 1) }}/5</p>
        </div>

        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <ul role="list" class="divide-y divide-gray-200">
                @foreach ($ulasan as $ulasan_item)
                <li class="px-4 py-5 sm:px-6">
                    <div class="flex justify-between items-center">
                        <div>
                            <h5 class="text-lg font-bold text-gray-900">{{ $ulasan_item->customer->nama }}</h5>
                            <p class="text-sm font-medium text-gray-500">{{ $ulasan_item->order->tanggal }} , {{ $ulasan_item->order->waktu }}</p>
                            <div class="mt-2 flex items-center text-gray-800">
                                <i class="fi fi-rr-comment pr-2 text-green-600"></i>
                                <p class="text-sm">{{ $ulasan_item->ulasan }}</p>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <i class="fi fi-rr-star text-yellow-500"></i>
                            <p class="ml-2 text-lg font-semibold text-gray-900">{{ $ulasan_item->rating }}/5</p>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
