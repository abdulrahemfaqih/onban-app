@extends('layouts.dashboard-layout')


@section('content')
    <div class="flex flex-col">
        <div class="flex justify-end"><a class="text-blue-600" href="{{ route('metode-pembayaran.create') }}">Tambah Metode
                Pembayaran</a></div>
        <div class="w-full mt-6">
            @if ($semuaMetodePembayaran->count() > 0)
                <div class="bg-white overflow-auto">
                    <table class="text-left w-full border-collapse">
                        <thead>
                            <tr>
                                <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    No</th>
                                <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    Nama Metode Pembayaran</th>
                                <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    Deskripsi</th>
                                <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($semuaMetodePembayaran as $metode)
                                <tr class="hover:bg-grey-lighter">
                                    <td class="py-4 px-6 border-b border-grey-light">{{ $loop->iteration }}</td>
                                    <td class="py-4 px-6 border-b border-grey-light">{{ $metode->nama_metode_pembayaran }}</td>
                                    <td class="py-4 px-6 border-b border-grey-light">{{ $metode->deskripsi_metode_pembayaran }}</td>
                                    <td class="py-4 px-6 border-b border-grey-light">
                                        <a href="{{ route('metode-pembayaran.edit', $metode->id_metode_pembayaran) }}"
                                            class="text-blue-600">Edit</a>
                                        <form action="{{ route('metode-pembayaran.destroy', $metode->id_metode_pembayaran) }}" method="post"
                                            class="inline">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="text-red-600">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            @else
                <h1 class="text-xl text-center font-semibold">Data Metode Pembayaran Kosong</h1>
            @endif
        </div>
    </div>
@endsection
