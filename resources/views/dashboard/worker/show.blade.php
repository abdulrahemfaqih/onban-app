@extends('layouts.dashboard-layout')

@section('content')
    <div class="w-full my-6 pr-0 lg:pr-2">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <div class="mb-4">
                <h1 class="text-xl font-bold mb-2">Detail Pekerja</h1>
                <hr class="border-b-2 border-gray-200">
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <h2 class="text-lg font-semibold">Nama:</h2>
                    <p>{{ $worker->nama }}</p>
                </div>
                <div>
                    <h2 class="text-lg font-semibold">Alamat:</h2>
                    <p>{{ $worker->alamat }}</p>
                </div>
                <div>
                    <h2 class="text-lg font-semibold">Nomor HP:</h2>
                    <p>{{ $worker->no_hp }}</p>
                </div>
                <div>
                    <h2 class="text-lg font-semibold">Jenis Kelamin:</h2>
                    <p>{{ $worker->jenis_kelamin }}</p>
                </div>
                <div>
                    <h2 class="text-lg font-semibold">Latitude:</h2>
                    <p>{{ $worker->latitude }}</p>
                </div>
                <div>
                    <h2 class="text-lg font-semibold">Longitude:</h2>
                    <p>{{ $worker->longitude }}</p>
                </div>
                <div>
                    <h2 class="text-lg font-semibold">Status Menerima Order:</h2>
                    <p>{{ $worker->status_menerima_order ? 'Aktif' : 'Tidak Aktif' }}</p>
                </div>
                <div>
                    <h2 class="text-lg font-semibold">Status Verifikasi:</h2>
                    <p>{{ $worker->status_verifikasi ? 'Terverifikasi' : 'Belum Terverifikasi' }}</p>
                </div>
                <div>
                    <h2 class="text-lg font-semibold">Foto Formal:</h2>
                    <img class="h-40" src="{{ asset('storage/' . $worker->foto_formal) }}" alt="Foto Formal">
                </div>
                <div>
                    <h2 class="text-lg font-semibold">Foto KTP:</h2>
                    <img class="h-40" src="{{ asset('storage/' . $worker->foto_ktp) }}" alt="Foto KTP">
                </div>
            </div>
            <div>
                {{-- buatkan form update status verifikasi worker --}}
                <form action="{{ route('admin-workers-update-status', $worker->id_worker) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="mt-4">
                        <label for="status_verifikasi" class="block text-sm font-medium text-gray-700">Status
                            Verifikasi</label>
                        <select id="status_verifikasi" name="status_verifikasi" autocomplete="status_verifikasi"
                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option value="0" {{ $worker->status_verifikasi == 0 ? 'selected' : '' }}>Belum
                                Terverifikasi</option>
                            <option value="1" {{ $worker->status_verifikasi == 1 ? 'selected' : '' }}>Terverifikasi
                            </option>
                        </select>
                    </div>
                    <div class="mt-4">
                        <button type="submit"
                            class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 focus:outline-none focus:bg-blue-600">
                            Update Status Verifikasi
                        </button>
                    </div>
            </div>
        </div>
    </div>
@endsection
