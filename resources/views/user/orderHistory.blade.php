@extends('layouts.user-layout')

@section('content')
    <a href="{{ route('home') }}">
        < </a>
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

            <div class="w-full  md:w-2/4 mt-4 bg-[#FF802A] h-16 flex justify-center mx-auto my-auto content-center rounded-lg drop-shadow-lg lg:w-2/5 sticky bottom-10"
                id='footbar'>
                <div class="flex w-full h-2/3 justify-center mx-auto content-center  gap-2 my-auto ">
                    <div class="w-[28%]  text-white  h-full  text-center flex flex-col justify-center ">
                        <a href="{{ route('voucher') }}">
                            <img class="w-4/14 lg:w-1/3 mx-auto h-4/14" src="{{ asset('assets/images/voucher.svg') }}"
                                alt="voucher">
                            <p class="text-sm">Voucher</p>
                        </a>
                    </div>
                    <div
                        class="w-[22%] text-white h-full my-auto text-center flex flex-col justify-center mx-auto content-center ">
                        <a href="{{ route('orderHistory') }}" class="flex flex-col mx-auto justify-center content-center">
                            <div>
                                @svg('tni-history', 'w-8 mx-auto')
                            </div>
                            <div>
                                <p class="text-sm">Histori</p>
                            </div>
                        </a>
                    </div>
                    <div
                        class="w-[22%] text-white h-full my-auto text-center flex flex-col justify-center mx-auto content-center ">
                        <a href="{{ route('profile') }}" class="flex flex-col  mx-auto justify-center content-center">
                            <div
                                class="w-[60%] h-[50%] lg:w-[40%] lg:h-[46%] overflow-hidden mx-auto content-center justify-center rounded-full ">
                                <img src="{{ asset('assets/images/alvan-nee-ZCHj_2lJP00-unsplash.jpg') }}" alt=""
                                    class=" object-cover mx-auto">
                            </div>
                            <div>
                                <p class="text-sm">Akun</p>
                            </div>
                        </a>
                    </div>
                    <div
                        class="w-[22%] text-white h-full my-auto text-center flex flex-col justify-center items-center mx-auto">
                        <a href="{{ route('ulasan') }}" class="p-3 rounded-lg">
                            <img src="{{ asset('assets/images/chat.png') }}"
                                class="w-3/6 h-3/6 lg:w-2/5 mx-auto  filter invert" alt="">
                            <p>Ulasan</p>
                        </a>
                    </div>
                    <div class="w-[28%]  text-white  h-full  text-center flex flex-col justify-center ">
                        <a href="{{ route('logout') }}" id="logout"
                            class="w-14 text-white h-full text-center flex flex-col justify-center ">
                            <img class="pl-4 w-3/4 h-3/4" src="{{ asset('assets/images/logout.svg') }}" id="imgLogout"
                                alt="logout">
                            <p class="text-sm">Logout</p>
                        </a>
                    </div>
                </div>
            </div>

            {{-- hide navigation bar when scrolling --}}
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
