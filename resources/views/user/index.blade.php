@extends('layouts.user-layout')

@section('content')
    <div class="flex justify-center flex-col gap-10 lg:gap-14 md:gap-40 h-full">
        <div id="foto_profile"
            class="mx-auto absolute w-40 h-40 top-28 left-1/2 overflow-hidden right-1/2 translate-x-[-50%] border-white border-4 rounded-full">
            <img src="{{ isset($customer->foto_profil) ? asset('storage/' . $customer->foto_profil) : asset('assets/images/alvan-nee-ZCHj_2lJP00-unsplash.jpg') }}"
                alt="" class="object-cover border-white border-b-2">
        </div>
        <div class="flex justify-center ">
            <h1 class="text-black text-4xl flex mt-20 "> {{ $nama }}</h1>
        </div>
        <div class="flex justify-center text-center text-base md:text-xl">
            <p>Tambal Ban Online: Perbaikan Ban Langsung ke Lokasi Anda!</p>
        </div>


        <div class="lg:w-1/3 mx-auto absolute  translate-x-[-50%] left-1/2 right-1/2 w-3/4 lg:top-[55%] top-[65%] ">
            @if (session()->has('success'))
                @include('partial.alert-success', ['message' => session()->get('success')])
            @endif
            {{-- <div id="alert-3"
            class="flex items-center p-4 mb-4 text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
            role="alert">
            <div class="ms-3 text-sm font-medium">
                {{ session()->get('success') }}
            </div>
            <button type="button"
                class="ms-auto -mx-1.5 -my-1.5 bg-blue-50 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-blue-400 dark:hover:bg-gray-700"
                data-dismiss-target="#alert-3" aria-label="Close">
       
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button> --}}
        </div>

    </div>
    @if ($pendingOrder)
        @if ($pendingOrder->status_order === 'Menunggu Pekerja')
            <div class="flex justify-center w-full h-16  md:h-24 lg:h-24 mt-14 ">
                <a href=""
                class="bg-[#FF802A] text-center lg:w-1/4 xl:w-1/4 md:w-1/2 text-sm w-3/4 h-full justify-center flex flex-col px-10 py-6 rounded-lg text-white xl:border-none lg:border-none border-none hover:bg-[#f78000d6] shadow-lg md:text-xl"><b>Mohon tunggu worker untuk mengambil orderan Anda.</b>
            </a>
            </div>
            
        @elseif ($pendingOrder->status_order === 'Diproses')
            <div class="flex justify-center w-full h-16  md:h-24 lg:h-24 mt-14 ">
                <a href="{{route('worker-find', $pendingOrder->id_order)}}"
                class="bg-primary text-center rounded-md h-full lg:w-1/4 xl:w-1/4 md:w-1/2 w-3/4 content-center text-white" ><b>Orderan Anda sedang diproses oleh worker</b>
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

    </div>
    {{-- navigation bar --}}
    @include('partial.navigation-user')
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
