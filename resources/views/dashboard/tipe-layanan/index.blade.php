@extends('layouts.dashboard-layout')


@section('content')
    <div class="flex flex-col">
        <div class="flex justify-end mb-4 "  >
            <a href="{{ route('tipe-layanan.create') }} "
                class="bg-primary inline-block px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition duration-200">Tambah
                Tipe Layanan</a>
        </div>


        <div class="w-full mt-2">
            @if (session()->has('success'))
                @include('partial.alert-success', ['message' => session()->get('success')])
            @endif
            @if ($semuaTipeLayanan->count() > 0)
                <div class="bg-white overflow-auto">
                    <table class="text-left w-full border-collapse">
                        <thead>
                            <tr>
                                <th
                                    class="py-4 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    No</th>
                                <th
                                    class="py-4 px-16 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    Nama Tipe Layanan</th>
                                <th
                                    class="py-4 px-16 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    Harga Tipe</th>
                                <th
                                    class=" py-4 px-36  bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($semuaTipeLayanan as $tipeLayanan)
                                <tr class="hover:bg-grey-lighter">
                                    <td class="py-4 px-6 border-b border-grey-light">{{ $loop->iteration }}</td>
                                    <td class="py-4 px-16 border-b border-grey-light">{{ $tipeLayanan->nama_tipe_layanan }}
                                    </td>
                                    <td class="py-4 px-16 border-b border-grey-light">{{ $tipeLayanan->harga_tipe_layanan }}
                                    </td>
                                    {{-- buatkan action  show, edit dan delete --}}
                                    <td class=" py-4 px-16 border-b border-grey-light">
                                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                        <a href="{{ route('tipe-layanan.show', $tipeLayanan->id_tipe_layanan) }}"
                                            class="text-white ">Show</a>
                                        </button>
                                        <button class="ml-1 bg-[#d3d514] hover:bg-[#b9bb12] text-white font-bold py-2 px-4 rounded">
                                        <a href="{{ route('tipe-layanan.edit', $tipeLayanan->id_tipe_layanan) }}"
                                            class="text-white ">Edit</a>    
                                        </button>
                                        <form action="{{ route('tipe-layanan.destroy', $tipeLayanan->id_tipe_layanan) }}"
                                            method="post" class="inline">
                                            @csrf
                                            @method('delete')  
                                            <button type="submit" class="ml-1 bg-[#e21717] hover:bg-[#bc1212] font-bold py-2 px-4 rounded text-white ">Delete</button>
                                        </form>     
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            @else
                <h1 class="text-center font-bold text-md">Tipe Layanan Kosong</h1>
            @endif
        </div>
    </div>
@endsection
