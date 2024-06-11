@extends('layouts.dashboard-layout')

@section('content')
    <div class="w-full my-6 pr-0 lg:pr-2">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h1 class="text-2xl font-bold mb-4">Detail Pelanggan</h1>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <h2 class="text-lg font-semibold">Nama:</h2>
                    <p>{{ $customer->nama }}</p>
                </div>
                <div>
                    <h2 class="text-lg font-semibold">Nomor HP:</h2>
                    <p>{{ $customer->no_hp }}</p>
                </div>
                <div>
                    <h2 class="text-lg font-semibold">Alamat:</h2>
                    <p>{{ $customer->alamat }}</p>
                </div>
                <div>
                    <h2 class="text-lg font-semibold">Jenis Kelamin:</h2>
                    <p>{{ $customer->jenis_kelamin }}</p>
                </div>
            </div>

            @if ($orderCount)
                {{-- Year filter --}}
                <form id="yearFilterForm" class="my-8">
                    <label for="year" class="block text-sm font-medium text-gray-700">Select Year</label>
                    <select id="year" name="year"
                        class="mt-1 block w-1/3 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        onchange="document.getElementById('yearFilterForm').submit()">
                        @foreach ($years as $year)
                            <option value="{{ $year }}" {{ $year == $selectedYear ? 'selected' : '' }}>
                                {{ $year }}</option>
                        @endforeach
                    </select>
                </form>

                {{-- Chart Section --}}
                <div class="mt-8">
                    <h2 class="text-lg font-semibold">Frekuensi Order Perbulan</h2>
                    <canvas id="ordersChart" width="400" height="200"></canvas>
                </div>
            @else
                <p class="mt-8 text-center font-bold text-xl">Pelanggan ini belum pernah melakukan order.</p>
            @endif
        </div>
    </div>

    @if ($orderCount)
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            var ctx = document.getElementById('ordersChart').getContext('2d');
            var ordersChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September',
                        'October', 'November', 'December'
                    ],
                    datasets: [{
                        label: 'Frekuensi Order per Bulan',
                        data: {!! json_encode(array_values($orders)) !!},
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
    @endif
@endsection
