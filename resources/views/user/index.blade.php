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
                    <a href="{{ route('worker-find', $pendingOrder->id_order) }}">klik untuk menuju pesanana anda, worker telah di temukan</a>
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
        {{-- <div id='map' style='width: 400px; height: 300px;'></div> --}}
        {{-- navigation bar --}}
        @include('partial.navigation-user')
    </div>
@endsection
@section('js')
    {{-- hide navigation bar when scrolling --}}
    <script>
        // mapboxgl.accessToken = 'pk.eyJ1IjoiYWJkdWxyYWhlbWZhcWloIiwiYSI6ImNsd3l4Nm5pNjAxZzYyanNlaGp1eW41dmQifQ.fyJP2_k7LV4_3NCH9sAFWw';
        // var map = new mapboxgl.Map({
        //     container: 'map',
        //     style: 'mapbox://styles/mapbox/streets-v11'
        // });

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
