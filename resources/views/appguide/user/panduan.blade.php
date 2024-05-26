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
        <div class="w-full flex flex-wrap justify-start">
            <h3 class="font-semibold mb-4 text-slate-400"><a href="{{ route('user-help') }}">Kembali
                    {{-- <span class="flex"><svg
                            class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m4 12 8-8 8 8M6 10.5V19a1 1 0 0 0 1 1h3v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h3a1 1 0 0 0 1-1v-8.5" />
                        </svg>></span> --}}
                </a>
            </h3>
        </div>
        <div class="flex flex-wrap justify-start">
            {{-- Sidebar kiri --}}
            <div class="w-full max-w-[250px] mb-6 lg:mb-8">
                <h3 class="font-semibold text-cyan-500 text-sm hover:text-cyan-700 mb-1 lg:mb-2"><a
                        href="{{ route('user-help') }}">Pengguna</a>
                </h3>
                <h3 class="font-semibold text-cyan-500 text-sm hover:text-cyan-700"><a
                        href="{{ route('worker-help') }}">Pekerja</a></h3>
            </div>
        </div>

    </div>
@endsection
