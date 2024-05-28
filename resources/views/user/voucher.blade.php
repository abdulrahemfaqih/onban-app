@extends('layouts.user-layout')
@section('content')
<div class="flex flex-col min-h-screen">
    <div class="flex-grow">
        <h1 class="text-center text-2xl font-bold text-white mx-auto absolute w-3/4 h-40 top-28 left-1/2 right-1/2 translate-x-[-50%]">
            Voucher
        </h1>
        <div class="flex-col flex gap-3 lg:w-2/3 lg:mx-auto mb-9 ">
            @foreach ($vouchers as $voucher)
                <div class="w-full bg-white rounded-lg 800 h-full flex flex-col text-sm shadow-lg" x-data="{ open: false }">
                    <div x-on:click="open = ! open" class="lg:gap-52 justify-between w-full flex md:gap-36 md:p-4">
                        <div class="flex flex-col w-1/2 p-2 rounded-md">
                            <p class="font-semibold text-primary">{{ $voucher->nama_voucher }}</p>
                            <p class="font-semibold text-black text-2xl">{{ $voucher->potongan_harga * 100 }}%</p>
                            <p class="text-red-500 opacity-55 mt-2">exp : {{ $voucher->sisa_hari }} hari lagi</p>
                        </div>
                        <div class="flex content-center my-auto pr-2 text-secondary lg:ml-20">
                            <p class="mt-2.5 font-semibold">{{ $voucher->kode_voucher }}</p>
                            <img src="{{asset('assets/images/arrow_right.svg')}}" alt="arrow" class="w-8 my-auto">
                        </div>
                    </div>
                    <div x-show="open" x-transition class="flex flex-col mx-auto p-2 md:ml-2">
                        <div class="flex flex-col p-2">
                            <p class="font-semibold">Masa Berlaku</p>
                            <p class="text-gray-500">{{ $voucher->tanggal_mulai }} - {{ $voucher->tanggal_berakhir }}</p>
                        </div>
                        <div class="flex flex-col p-2">
                            <p class="font-semibold">Syarat Penggunaan</p>
                            <p class="text-gray-500">{{ $voucher->deskripsi }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    
    {{-- navigation bar --}}
    <div class="mt-auto w-full md:w-2/4 bg-[#FF802A] h-16  bottom-2 justify-center mx-auto my-auto content-center rounded-lg drop-shadow-lg lg:w-2/5 sticky" id='footbar'>
        <div class="flex w-full h-2/3 justify-center mx-auto content-center gap-8 my-auto">
            <div class="w-[28%] text-white h-full text-center flex flex-col justify-center">
                <a href="{{ route('voucher') }}">
                    <img class="w-2/4 lg:w-1/3 mx-auto h-2/3" src="{{ asset('assets/images/voucher.svg') }}" alt="voucher">
                    <p class="text-sm">Voucher</p>
                </a>
            </div>
            <div class="w-[22%] text-white h-full my-auto text-center flex flex-col justify-center mx-auto content-center">
                <a href="{{ route('profile') }}" class="flex flex-col mx-auto justify-center content-center">
                    <div class="w-[60%] h-[50%] lg:w-[40%] lg:h-[46%] overflow-hidden mx-auto content-center justify-center rounded-full">
                        <img src="{{ asset('assets/images/alvan-nee-ZCHj_2lJP00-unsplash.jpg') }}" alt="" class="object-cover mx-auto">
                    </div>
                    <div>
                        <p class="text-sm">Akun</p>
                    </div>
                </a>
            </div>
            <div class="w-[22%] text-white h-full my-auto text-center flex flex-col justify-center mx-auto content-center">
                <a href="{{ route('orderHistory') }}" class="flex flex-col mx-auto justify-center content-center">
                    <div>
                        <img src="{{ asset('assets/images/histri-icon.svg') }}" alt="histori" class="w-10">
                    </div>
                    <div>
                        <p class="text-sm">Histori</p>
                    </div>
                </a>
            </div>
            <div class="w-[28%] text-white h-full text-center flex flex-col justify-center">
                <a href="{{ route('logout') }}" id="logout" class="w-14 text-white h-full text-center flex flex-col justify-center">
                    <img class="pl-4 w-3/4 h-3/4" src="{{ asset('assets/images/logout.svg') }}" id="imgLogout" alt="logout">
                    <p class="text-sm">Logout</p>
                </a>
            </div>
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
            footbar.classList.add('opacity-0', 'transition-opacity', 'duration-500');

            isScrolling = setTimeout(() => {
                footbar.classList.remove('opacity-0');
                footbar.classList.add('opacity-100');
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
