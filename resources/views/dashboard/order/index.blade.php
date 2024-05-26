@extends('layouts.dashboard-layout')

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-8">{{ $title }}</h1>

        {{-- Tabel Menunggu Pekerja --}}
        <h2 class="text-xl font-semibold mb-4">Menunggu Pekerja</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border">
                <thead class="text-left">
                    <tr>
                        <th class="py-2 px-4 border-b">No</th>
                        <th class="py-2 px-4 border-b">Customer Name</th>
                        <th class="py-2 px-4 border-b">Hari</th>
                        <th class="py-2 px-4 border-b">Tanggal</th>
                        <th class="py-2 px-4 border-b">Jam</th>
                        <th class="py-2 px-4 border-b">Lokasi</th>
                        <th class="py-2 px-4 border-b">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders_menunggu_pekerja as $order)
                        <tr>
                            <td class="py-2 px-4 border-b">
                                {{ ($orders_menunggu_pekerja->currentPage() - 1) * $orders_menunggu_pekerja->perPage() + $loop->iteration }}
                            </td>
                            <td class="py-2 px-4 border-b">{{ $order->customer->nama }}</td>
                            <td class="py-2 px-4 border-b">{{ $order->indonesian_day }}</td>

                            <td class="py-2 px-4 border-b">{{ $order->tanggal }}</td>
                            <td class="py-2 px-4 border-b">{{ $order->waktu }}</td>
                            <td class="py-2 px-4 border-b">{{ \Illuminate\Support\Str::limit($order->alamat, 50, '...') }}</td>
                            <td class="py-2 px-4 border-b"><a href="{{ route('admin-orders-show', $order->id_order) }}"
                                    class="text-blue-500 hover:underline">View</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $orders_menunggu_pekerja->appends(['di_proses_page' => $orders_di_proses->currentPage(), 'selesai_page' => $orders_selesai->currentPage()])->links('pagination::tailwind') }}
        </div>

        {{-- Tabel Di Proses --}}
        <h2 class="text-xl font-semibold mb-4 mt-8">Di Proses</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border">
                <thead class="text-left">
                    <tr>
                        <th class="py-2 px-4 border-b">No</th>
                        <th class="py-2 px-4 border-b">Order ID</th>
                        <th class="py-2 px-4 border-b">Customer Name</th>
                        <th class="py-2 px-4 border-b">Worker Name</th>
                        <th class="py-2 px-4 border-b">Status</th>
                        <th class="py-2 px-4 border-b">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders_di_proses as $order)
                        <tr>
                            <td class="py-2 px-4 border-b">
                                {{ ($orders_di_proses->currentPage() - 1) * $orders_di_proses->perPage() + $loop->iteration }}
                            </td>
                            <td class="py-2 px-4 border-b">{{ $order->id }}</td>
                            <td class="py-2 px-4 border-b">{{ $order->customer->nama }}</td>
                            <td class="py-2 px-4 border-b">{{ $order->worker->nama }}</td>
                            <td class="py-2 px-4 border-b">{{ $order->status_order }}</td>
                            <td class="py-2 px-4 border-b"><a href="{{ route('admin-orders-show', $order->id_order) }}"
                                    class="text-blue-500 hover:underline">View</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $orders_di_proses->appends(['menunggu_pekerja_page' => $orders_menunggu_pekerja->currentPage(), 'selesai_page' => $orders_selesai->currentPage()])->links('pagination::tailwind') }}
        </div>

        {{-- Tabel Selesai --}}
        <h2 class="text-xl font-semibold mb-4 mt-8">Selesai</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border">
                <thead class="text-left">
                    <tr>
                        <th class="py-2 px-4 border-b">No</th>
                        <th class="py-2 px-4 border-b">Order ID</th>
                        <th class="py-2 px-4 border-b">Customer Name</th>
                        <th class="py-2 px-4 border-b">Worker Name</th>
                        <th class="py-2 px-4 border-b">Status</th>
                        <th class="py-2 px-4 border-b">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders_selesai as $order)
                        <tr>
                            <td class="py-2 px-4 border-b">
                                {{ ($orders_selesai->currentPage() - 1) * $orders_selesai->perPage() + $loop->iteration }}
                            </td>
                            <td class="py-2 px-4 border-b">{{ $order->id }}</td>
                            <td class="py-2 px-4 border-b">{{ $order->customer->nama }}</td>
                            <td class="py-2 px-4 border-b">{{ $order->worker->nama }}</td>
                            <td class="py-2 px-4 border-b">{{ $order->status_order }}</td>
                            <td class="py-2 px-4 border-b"><a href="{{ route('admin-orders-show', $order->id_order) }}"
                                    class="text-blue-500 hover:underline">View</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $orders_selesai->appends(['menunggu_pekerja_page' => $orders_menunggu_pekerja->currentPage(), 'di_proses_page' => $orders_di_proses->currentPage()])->links('pagination::tailwind') }}
        </div>
    </div>
@endsection
