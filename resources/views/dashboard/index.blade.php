@extends('layouts.dashboard-layout')

@section('content')
    @if (session()->has('success'))
        @include('partial.alert-success', ['message' => session()->get('success')])
    @endif

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <div class="p-4 bg-white shadow-md rounded-lg dark:bg-gray-800">
            <h1 class="text-xl font-semibold">Jumlah Worker Terverifikasi</h1>
            <p class="text-gray-600 dark:text-gray-400">{{ $jumlahWorkerTerverifikasi }}</p>
        </div>
        <div class="p-4 bg-white shadow-md rounded-lg dark:bg-gray-800">
            <h1 class="text-xl font-semibold">Jumlah Worker belum terverifikasi</h1>
            <p class="text-gray-600 dark:text-gray-400">{{ $jumlahWorkerBelumTerverifikasi }}</p>
        </div>
        <div class="p-4 bg-white shadow-md rounded-lg dark:bg-gray-800">
            <h1 class="text-xl font-semibold">Jumlah Worker ON</h1>
            <p class="text-gray-600 dark:text-gray-400">{{ $jumlahWorkerAktif }}</p>
        </div>
        <div class="p-4 bg-white shadow-md rounded-lg dark:bg-gray-800">
            <h1 class="text-xl font-semibold">Jumlah Worker OFF</h1>
            <p class="text-gray-600 dark:text-gray-400">{{ $jumlahWorkerNonAktif }}</p>
        </div>
        <div class="p-4 bg-white shadow-md rounded-lg dark:bg-gray-800">
            <h1 class="text-xl font-semibold">Jumlah User</h1>
            <p class="text-gray-600 dark:text-gray-400">{{ $jumlahCustomer }}</p>
        </div>
    </div>

    <form method="POST" action="{{ route('updateStatusPenerimaan', $status_penerimaan_worker->id) }}" class="bg-white p-6 shadow-md rounded-lg dark:bg-gray-800">
        @csrf
        @method('put')

        <div class="mb-4">
            <label for="status_penerimaan" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Status Penerimaan:</label>
            <select name="status_penerimaan" id="status_penerimaan" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <option value="1" {{ $status_penerimaan_worker->status_penerimaan ? 'selected' : '' }}>Buka</option>
                <option value="0" {{ !$status_penerimaan_worker->status_penerimaan ? 'selected' : '' }}>Tutup</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="deskripsi" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Deskripsi:</label>
            <input type="text" name="keterangan" id="deskripsi" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ $status_penerimaan_worker->keterangan }}">
        </div>

        <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:ring focus:ring-indigo-200 active:bg-indigo-600 disabled:opacity-25 transition">
            Update
        </button>
    </form>
@endsection
