@extends('layouts.dashboard-layout')
@php
    $nomor_urut = ($semuaWorker->currentPage() - 1) * $semuaWorker->perPage();
@endphp
@section('content')
    <div class="w-full mt-6">
        @if (session()->has('success'))
            @include('partial.alert-success', ['message' => session()->get('success')])
        @endif
        @if ($semuaWorker->count() > 0)

            <div class="bg-white overflow-auto">
                <table class="min-w-full leading-normal">
                    <thead>
                        <tr>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-white text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                No
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-white text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Nama
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-white text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Alamat
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-white text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Status Menerima Order
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-white text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Status Verifikasi
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-white text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Jenis Kelamin
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-white text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($semuaWorker as $worker)
                            @php
                                $nomor_urut++;
                            @endphp
                            <tr>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">{{ $nomor_urut }}</p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 w-10 h-10">
                                            <img class="w-full h-full rounded-full object-cover"
                                                src="{{ asset('storage/' . $worker->foto_formal) }}" alt="" />
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                {{ $worker->nama }}
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">Kamal</p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <span
                                        class="relative inline-block px-3 py-1 font-semibold leading-tight {{ $worker->status_menerima_order ? 'text-green-900' : 'text-red-900' }}">
                                        <span aria-hidden
                                            class="absolute inset-0 rounded-full opacity-50 {{ $worker->status_menerima_order ? 'bg-green-200' : 'bg-red-200' }}"></span>
                                        <span
                                            class="relative">{{ $worker->status_menerima_order ? 'Aktif' : 'Tidak aktif' }}</span>
                                    </span>

                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <span
                                        class="relative inline-block px-3 py-1 font-semibold leading-tight {{ $worker->status_verifikasi ? 'text-green-900' : 'text-red-900' }}">
                                        <span aria-hidden
                                            class="absolute inset-0 rounded-full opacity-50 {{ $worker->status_verifikasi ? 'bg-green-200' : 'bg-red-200' }}"></span>
                                        <span
                                            class="relative">{{ $worker->status_verifikasi ? 'Terverifikasi' : 'Belum Terverifikasi' }}</span>
                                    </span>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">Laki-Laki</p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <a href="{{ route('admin-workers-show', $worker->id_worker) }}"
                                        class="mr-2">Detail</a>
                                    <a onclick="return confirm('yakin ingin dihapus ? ')"
                                        href="{{ route('admin-workers-delete', $worker->id_worker) }}">Hapus</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $semuaWorker->links() }}
        @else
            <h1 class="text-center font-bold text-md">MASIH BELUN ADA WORKER</h1>
        @endif
    </div>
@endsection
