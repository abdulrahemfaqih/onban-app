@extends('layouts.dashboard-layout')

@section('content')
    <div class="w-full  my-6 pr-0 lg:pr-2">
        <div class="leading-loose">
            <form class="p-10 bg-white rounded shadow-xl" method="post" action="{{ route('vouchers.store') }}">
                @csrf
                <div class="">
                    <label class="block text-sm text-gray-600" for="kode_voucher">Kode Voucher</label>
                    <input class="w-full px-5 py-1 text-gray-700 bg-gray-50 rounded" id="kode_voucher" name="kode_voucher"
                        type="text" placeholder="Kode Voucher" value="{{ old('kode_voucher') }}"  />
                    @error('kode_voucher')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-2">
                    <label class="block text-sm text-gray-600" for="nama_voucher">Nama Voucher</label>
                    <input class="w-full px-5 py-1 text-gray-700 bg-gray-50 rounded" id="nama_voucher" name="nama_voucher"
                        type="text" placeholder="Nama Voucher" value="{{ old('nama_voucher') }}"  />
                    @error('nama_voucher')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-2 max-w-2xl">
                    <label for="potongan_harga" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Potongan
                        Harga Voucher</label>
                    <select id="potongan_harga" name="potongan_harga"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option disabled selected>Pilih Potongan Harga</option>
                        @foreach ($potonganHarga as $label => $nilai)
                            <option value="{{ $nilai }}">{{ $label }}</option>
                        @endforeach
                    </select>
                    @error('potongan_harga')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-2">
                    <label class="block text-sm text-gray-600" for="deskripsi">Nama Voucher</label>
                    <input class="w-full px-5 py-5 text-gray-700 bg-gray-50 rounded" id="deskripsi" name="deskripsi"
                        type="text" placeholder="Deskripsi" value="{{ old('deskripsi') }}"  />
                    @error('deskripsi')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-2">
                    <label class="block text-sm text-gray-600" for="tanggal_mulai">Tanggal Mulai</label>
                    <input type="date" class=" text-gray-700 bg-gray-50 rounded" name="tanggal_mulai" id="tanggal_mulai" value="{{ old('tanggal_mulai') }}">
                    @error('tanggal_mulai')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-2">
                    <label class="block text-sm text-gray-600" for="tanggal_berakhir">Tanggal Akhir</label>
                    <input type="date" class=" text-gray-700 bg-gray-50 rounded" name="tanggal_berakhir" id="tanggal_berakhir" value="{{ old('tanggal_akhir') }}">
                    @error('tanggal_berakhir')
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
