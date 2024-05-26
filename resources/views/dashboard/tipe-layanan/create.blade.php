@extends('layouts.dashboard-layout')

@section('content')
    <div class="w-full  my-6 pr-0 lg:pr-2">
        <div class="leading-loose">
            <form class="p-10 bg-white rounded shadow-xl" method="post" action="{{ route('tipe-layanan.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="mt-2">
                    <label class="block text-sm text-gray-600" for="nama_tipe_layanan">Nama Tipe Layanan</label>
                    <input class="w-full px-5 py-1 text-gray-700 bg-gray-50 rounded" id="nama_tipe_layanan"
                        name="nama_tipe_layanan" type="text" placeholder="Nama Tipe Layanan"
                        value="{{ old('nama_tipe_layanan') }}" />
                    @error('nama_tipe_layanan')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-2">
                    <label class="block text-sm text-gray-600" for="harga_tipe_layanan">Harga Tipe Layanan</label>
                    <input class="w-full px-5 py-1 text-gray-700 bg-gray-50 rounded" id="harga_tipe_layanan"
                        name="harga_tipe_layanan" type="number" placeholder="Harga Tipe Layanan"
                        value="{{ old('deskripsi') }}" />
                    @error('harga_tipe_layanan')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-2">
                    <label class="block text-sm text-gray-600" for="deskripsi">Deskripsi Layanan</label>
                    <input class="w-full px-5 py-5 text-gray-700 bg-gray-50 rounded" id="deskripsi" name="deskripsi_tipe_layanan"
                        type="text" placeholder="Deskripsi" value="{{ old('deskripsi') }}" />
                    @error('deskripsi')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                {{-- buatkan input file sesuaikan dengan inputan yang diatas --}}
                <div class="mt-2">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="foto_type_halaman">Gambar Tipe</label>
                    <input
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        id="foto_type_halaman" type="file" name="foto_tipe_layanan">
                    @error('foto_tipe_layanan')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-6">
                    <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
