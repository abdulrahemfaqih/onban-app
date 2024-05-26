@extends('layouts.user-layout')
@php
    $title = 'Help';
@endphp
@section('content')
    <div class="flex flex-wrap">
        <div class="w-full px-4">
            <div class="max-w-xl mx-auto text-center mb-16 mt-7">
                <h2 class="font-bold text-dark text-3xl mb-4 text-primary">Anda memerlukan bantuan?</h2>
                <p class="font-medium text-md text-secondary">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus
                    doloribus molestias, ipsum omnis ad vitae!
                </p>
            </div>
        </div>
    </div>
    <div class="w-full px-4">
        <div class="flex flex-wrap">
            {{-- Sidebar kiri --}}
            <div class="w-full max-w-[250px] mb-6 lg:mb-8 justify-start">
                <h3 class="font-semibold text-cyan-500 text-sm hover:text-cyan-700 mb-1 lg:mb-2"><a
                        href="{{ route('user-help') }}">Pengguna</a>
                </h3>
                <h3 class="font-semibold text-cyan-500 text-sm hover:text-cyan-700"><a
                        href="{{ route('worker-help') }}">Pekerja</a></h3>
            </div>
            <hr class="text-dark">
            {{-- Menu Kanan --}}
            <div class="w-full max-w-full lg:max-w-[320px]">
                <h3 class="font-semibold text-cyan-500 md:text-lg hover:text-cyan-700 mb-2 lg:mb-2"><a
                        href="#">Panduan
                        Pembuatan Akun
                        Pekerja</a>
                </h3>
                <h3 class="font-semibold text-cyan-500 md:text-lg hover:text-cyan-700 mb-2 lg:mb-2"><a
                        href="#">Panduan
                        menerima orderan</a>
                </h3>
                <h3 class="font-semibold text-cyan-500 md:text-lg hover:text-cyan-700 mb-2 lg:mb-2"><a
                        href="#">Bagaimana
                        cara melihat
                        riwayat
                        pendapatan saya</a>
                </h3>
            </div>
            {{-- Baris paling kanan --}}
            {{-- <div class="w-full max-w-full lg:max-w-[320px] lg:ml-16">
                
            </div> --}}
        </div>
    </div>
@endsection
