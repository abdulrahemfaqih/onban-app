@extends('layouts.user-layout')

@section('content')
    <div class="flex flex-col min-h-screen">

        <h1
            class="text-center text-2xl font-bold text-white mx-auto absolute w-3/4 h-40 top-28 z-20 left-1/2 right-1/2 translate-x-[-50%]">
            Histori Order </h1>

        {{-- list Histori --}}
        <ol class="relative border-s border-gray-200 dark:border-gray-700">
            @if ($orders->count() > 0)
                @foreach ($orders as $order)
                    <li class="mb-8 ms-4">
                        <div
                            class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -start-1.5 border border-white dark:border-gray-900 dark:bg-gray-700">
                        </div>
                        <time class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">February
                            2022</time>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white"></h3>

                        <div class="gap-10 flex">
                            <div class="flex flex-col">
                                <p class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400">
                                    Harga
                                    <br>
                                    Jarak
                                    <br>
                                    harga/km
                                    <br>
                                    Total
                                </p>
                            </div>
                            <div class="flex flex-col">
                                <p class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400">
                                    {{ $order->total_harga }}
                                    <br>
                                    {{ $order->jarak }}
                                    <br>
                                    Rp 3000
                                    <br>
                                    {{ $order->total_harga }}
                                </p>
                            </div>
                        </div>
                        <div class="flex gap-4 text-base font-normal text-gray-500 dark:text-gray-400">
                            <p class="">Worker </p>
                            <p>:</p>
                            <p>{{ $order->worker->nama }}</p>
                        </div>
                    </li>
                @endforeach
            @else
                <div class="flex justify-center text-center text-base md:text-xl text-red-500">
                    <p>Anda belum pernah melakukan order.</p>
                </div>
            @endif

        </ol>



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