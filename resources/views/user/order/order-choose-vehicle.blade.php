@extends('layouts.user-layout')
@section('content')
    <div class="pb-12 w-full lg:w-2/3 flex flex-col space-y-6 min-h-full md:mx-auto">
        <h1
            class="text-center text-2xl font-bold text-primary mx-auto absolute w-3/4 h-40 top-28 left-1/2 right-1/2 translate-x-[-50%] ">
            Silahkan Pilih Jenis Kendaraan</h1>
        <div class="space-y-4 h-full py-12 md:w-3/4 w-full flex mx-auto flex-col">
            @if ($allTipeLayanan->count() > 0)
                @foreach ($allTipeLayanan as $tipeLayanan)
                    <div>
                       <a href="{{ route('update-type', ['id_order' => $id_order, 'id_tipe_layanan' => $tipeLayanan->id_tipe_layanan]) }}">
                            <button
                                class="bg-primary hover:bg-primary-dark rounded-lg w-full p-6 font-bold text-white flex justify-between"
                                value="sepeda">
                                <div>
                                    <p class="py-2 text-2xl">{{ $tipeLayanan->nama_tipe_layanan }}</p>
                                    <p class="text-lg text-left">{{ $tipeLayanan->harga_tipe_layanan }}</p>
                                </div>
                                <img src="{{ asset('storage/' . $tipeLayanan->foto_tipe_layanan) }}" alt="" class="drop-shadow-md"
                                    width="130px">
                            </button>
                        </a>
                    </div>
                @endforeach
            @else
                <div class="flex justify-center">
                    <p class="text-center text-lg">Tidak ada tipe layanan yang tersedia</p>
                </div>
            @endif
        </div>
        <a href="{{ route('cancel-order', ['id_order' => $id_order ]) }}" class="flex justify-center md:w-2/3 md:mx-auto">
            <button class="bg-primary hover:bg-primary-dark text-white font-bold py-2 px-4 mt-8 w-3/4 mx-auto rounded-lg">
                Batal
            </button>
        </a>

    </div>
@endsection
