@extends('layouts.user-layout')

@section('content')
    <div class="flex justify-center flex-col gap-10 lg:gap-14 md:gap-40 h-full">
        <div id="foto_profile"
            class="mx-auto absolute w-40 h-40 top-28 left-1/2 overflow-hidden right-1/2 translate-x-[-50%] border-white border-4 rounded-full">
            <img src="{{ asset('assets/images/alvan-nee-ZCHj_2lJP00-unsplash.jpg') }}" alt=""
                class="object-cover border-white border-b-2">
        </div>
        <div class="flex justify-center ">
            <h1 class="text-black text-4xl flex mt-20 "> {{ $nama }}</h1>
        </div>
        <div class="flex justify-center text-center text-base md:text-xl">
            <p>Tambal Ban Online: Perbaikan Ban Langsung ke Lokasi Anda!</p>
        </div>
        @if (session()->has('success'))
            @include('partial.alert-success', ['message' => session()->get('success')])
        @endif
        @if ($pendingOrder)
            @if ($pendingOrder->status_order === 'Menunggu Pekerja')
                <div class="flex justify-center text-center text-base md:text-xl text-red-500">
                    <p>Mohon tunggu worker untuk mengambil orderan Anda.</p>
                </div>
            @elseif ($pendingOrder->status_order === 'Diproses')
                <div class="flex justify-center text-center text-base md:text-xl text-yellow-500">
                    <p>Orderan Anda sedang diproses oleh worker.</p>
                </div>
            @endif
        @else
            <div class="flex justify-center w-full h-16 md:h-20 lg:h-14 mt-14 ">
                <a href="{{ route('create-order') }}"
                    class="bg-[#FF802A] text-center lg:w-1/4 xl:w-1/4 md:w-1/2 w-3/4 h-full justify-center flex flex-col px-10 py-6 rounded-lg text-white xl:border-none lg:border-none border-none hover:bg-[#f78000d6] shadow-lg md:text-xl"><b>Pesan
                        Sekarang</b>
                </a>
            </div>
        @endif

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
                        <img src="{{ asset('assets/images/chat.png') }}" class="w-3/6 h-3/6 lg:w-2/5 mx-auto  filter invert"
                            alt="">
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

    @endsection
    @section('js')
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
