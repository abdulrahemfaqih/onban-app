@extends('layouts.user-layout')

@section('content')
    <div class="flex flex-col mb-14 ">

        <h1 class="text-center text-2xl font-bold text-white mx-auto absolute w-3/4 h-40 top-28 z-20 left-1/2 right-1/2 translate-x-[-50%]">
            Histori Order
        </h1>

        {{-- list Histori --}}

        @if ($orders->count() > 0)
            @foreach ($orders as $order)
                {{-- Order Card --}}
                <div class="w-full bg-white rounded-lg 800 h-full flex flex-col text-sm shadow-lg md:w-3/4 mx-auto mb-6"
                    x-data="{ open: false }">
                    <div x-on:click="open = ! open" class="lg:gap-52 justify-between  w-full flex md:gap-36 md:p-4">
                        <div class="flex flex-col w-1/3 p-2 gap-2">
                            @php
                                \Carbon\Carbon::setLocale('id');
                            @endphp
                            <p class="text-red-500 opacity-55 mt-2">
                                <time class="text-sm font-normal leading-none text-gray-400 dark:text-gray-500">
                                    {{ \Carbon\Carbon::parse($order->created_at)->translatedFormat('l, j F Y H:i') }}
                                </time>
                            </p>
                            <p class="text-primary">Lihat Detail</p>
                        </div>
                        <div class="flex p-2 pr-2 text-secondary lg:ml-20 flex-col gap-2">
                            <p class="mt-2 text-secondary">{{ $order->worker->nama }}</p>
                        </div>
                    </div>
                    <div x-show="open" x-transition class="flex flex-col md:w-3/4 mx-auto justify-center p-2 w-full">
                        <div class="flex justify-between mx-auto w-3/4">
                            <div>
                                <p class="font-semibold text-primary">harga</p>
                                <p class="font-semibold text-primary ">jarak</p>
                                <p class="font-semibold text-primary">harga/km</p>
                                <p class="font-semibold text-primary ">total</p>
                            </div>
                            <div>
                                <p class="font-semibold">{{ $order->total_harga }}</p>
                                <p class="font-semibold">{{ $order->jarak }}</p>
                                <p class="font-semibold">Rp 3000</p>
                                <p class="font-semibold">{{ $order->total_harga }}</p>
                            </div>
                        </div>
                        <div class="flex flex-col p-2 w-3/4 justify-center text-center mx-auto">
                            @if ($order->ulasan)
                                <div class="flex justify-between">
                                    <p class="font-semibold text-secondary">Rating</p>
                                    <p class="text-primary">{{ $order->ulasan->rating }}/5</p>
                                    <div class="flex flex-col ">
                                        <p class="font-semibold">Ulasan</p>
                                        <p class="text-gray-500">{{ $order->ulasan->ulasan }}</p>
                                    </div>
                                </div>
                            @else
                                <div class="flex flex-col p-2 mx-auto text-center md:w-2/3">
                                    <p class="font-semibold">Tidak ada ulasan</p>
                                    <a class="bg-primary rounded-md text-white p-1 mt-2" href="{{ route('ulasan', $order->id_order) }}">beri ulasan</a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="flex justify-center text-center text-base md:text-xl text-red-500">
                <p class="text-black font-bold">Anda belum pernah melakukan order.</p>
            </div>
        @endif

        {{-- Navigation Bar --}}
        @include('partial.navigation-user')
    </div>
@endsection

@section('js')
    <script>
        const footbar = document.querySelector('#footbar');
        let isScrolling;
        window.addEventListener('scroll', () => {
            clearTimeout(isScrolling);
            footbar.style.display = 'none';
            isScrolling = setTimeout(() => {
                footbar.style.display = 'block';
            }, 500); // Ganti angka ini untuk mengatur waktu delay setelah scrolling berhenti
        });
        // pop up when logout
        document.getElementById('logout').addEventListener('click', function(event) {
            event.preventDefault();
            const hrefValue = event.currentTarget.href;
            Swal.fire({
                title: 'Logout?',
                text: 'Apakah Anda yakin ingin logout?',
                icon: 'warning',
                showCancelButton: true,
                dangerMode: true,
                confirmButtonText: 'Ya!',
                cancelButtonText: 'Tidak'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = hrefValue;
                }
            });
        });
    </script>
@endsection
