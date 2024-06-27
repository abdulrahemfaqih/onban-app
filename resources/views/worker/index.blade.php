@extends('layouts.worker-layout')

@section('content')
    {{-- Worker Profile --}}
    <div class="flex">
        <img class="w-[100px] h-[100px] rounded-full border-4 border-primary"
            src="{{ asset('storage/' . $worker->foto_formal) }}" alt="">
        <div class="pl-3">
            <p class="font-bold text-[1.1rem]">Selamat Datang Worker,</p>
            <p class="pb-2"> {{ $worker->nama }}! </p>
            <hr class="border-1 border-gray-500 py-1">
            <p class="text-sm">Sebagai Worker OnBan</p>
        </div>
    </div>

    {{-- Main Card --}}
    @if (session()->has('success'))
        {{-- @include('partial.alert-success', ['message' => session()->get('success')]) --}}
        {{ session()->get('success') }}
    @endif
    <div class="border-4 border-primary rounded-lg py-4 px-5 shadow-2xl">
        <div class="flex justify-between">
            <div class="flex flex-col justify-center">
                <p class="text-lg text-gray-800 font-bold leading-6">Total Pendapatan</p>
                <h1 class="text-2xl text-primary font-bold">Rp{{ number_format(round($total_pendapatan), 0, ',', '.') }}</h1>
            </div>
            <div class="">
                <p class="text-center">Status Work</p>
                <div class="border-2 border-gray-500 rounded-lg p-3 mx-3 space-y-3 flex flex-col items-center">
                    <p class="text-center font-bold leading-4 text-gray-800">Terima Orderan?</p>
                    <form action="" id="formChangeStatusTerimaOrderan">
                        <label class="justify-center inline-flex items-center cursor-pointer">
                            {{-- cek jika status penerimaan order = true maka di cheked --}}
                            <input type="checkbox" {{ $status_menerima_order ? 'checked' : '' }} id="checkedOrderan"
                                value="" class="sr-only peer">
                            <div
                                class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-orange-300 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary">
                            </div>
                        </label>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Detail Order List --}}
    @if ($status_menerima_order)
        <div class="w-full max-w-md p-4 bg-white border border-gray-400 rounded-lg shadow">
            <div class="flex items-center justify-between mb-2">
                <h5 class="text-xl font-bold text-gray-800">Daftar Pesanan</h5>
            </div>
            {{-- <div class="flex mb-4 space-x-2">
                <button onclick="filterOrders('Menunggu')" class="px-3 py-1 text-white bg-yellow-500 rounded-lg">Menunggu</button>
                <button onclick="filterOrders('Diproses')" class="px-3 py-1 text-white bg-blue-500 rounded-lg">Diproses</button>
                <button onclick="filterOrders('Selesai')" class="px-3 py-1 text-white bg-green-500 rounded-lg">Selesai</button>
                <button onclick="filterOrders('')" class="px-3 py-1 text-white bg-gray-500 rounded-lg">Semua</button>
            </div> --}}
            <div class="flow-root h-40 overflow-y-auto">
                @if ($orders->isEmpty())
                    <div class="flex items-center justify-center h-full">
                        <p class="text-gray-500">Belum Ada Pesanan</p>
                    </div>
                @else
                    <ul role="list" class="divide-y divide-gray-300">
                        @foreach ($orders as $order)
                            @if ($status_menerima_order)
                            @endif
                            <li class="py-3">
                                <div class="flex items-center">
                                    <div class="flex-1 min-w-0 ">
                                        <p class="text-sm font-sm text-gray-900 truncate">
                                            Tambal {{ $order->tipe_layanan->nama_tipe_layanan }}
                                        </p>
                                        <p class="text-sm font-sm text-gray-900 truncate">
                                            {{ $order->alamat }} ({{ $order->jarak }}km)
                                        </p>
                                        <p class="text-sm font-sm font-bold text-gray-900 truncate">
                                            {{-- @if ()

                                            @endif --}}
                                            {{ $worker -> la }}
                                            Total: Rp{{ number_format(round($order->total_harga), 0, ',', '.') }}
                                        </p>
                                    </div>
                                    <div class="items-center text-base font-semibold text-gray-900 text-center">
                                        @if ($order->status_order == 'Menunggu Pekerja')
                                            <p class="text-yellow-500">Menunggu</p>
                                        @elseif ($order->status_order == 'Diproses')
                                            <p class="text-primary">{{ $order->status_order }}</p>
                                        @elseif ($order->status_order == 'Selesai')
                                            <p class="text-green-500">{{ $order->status_order }}</p>
                                        @elseif ($order->status_order == 'Dibatalkan')
                                            <p class="text-red-500">{{ $order->status_order }}</p>
                                        @endif

                                        @if ($order->status_order == 'Diproses' && isset($order_proses))
                                            <a href="{{ route('worker-order-detail', ['id_order' => $order->id_order]) }}">
                                                <button
                                                    class="text-xs bg-primary text-white hover:bg-primary-dark rounded-lg p-2">Lanjutkan
                                                    Orderan</button>
                                            </a>
                                        @else
                                            <div class="pt-1">
                                                <a href="{{ route('worker-order-detail', ['id_order' => $order->id_order]) }}">
                                                <button data-modal-target="default-modal-{{ $order->id_order }}"
                                                    data-modal-toggle="default-modal-{{ $order->id_order }}"
                                                    class="text-xs bg-primary text-white hover:bg-primary-dark rounded-lg p-2">Lihat
                                                    Detail</button>
                                                </a>
                                            </div>
                                        @endif

                                    </div>
                                </div>
                            </li>
                            <!-- Main modal -->

                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    @else
        <h1 class="text-center">Hidupkan terima orderan untuk melihat list orderan</h1>
    @endif


@endsection

@section('js')
    <script>
        const statusTerimaOrderan = document.getElementById('checkedOrderan');
        const idWorker = document.body.getAttribute('data-worker-id');
        statusTerimaOrderan.addEventListener('change', function() {
            let isChecked = statusTerimaOrderan.checked;
            if (isChecked) {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function(position) {
                        const latitude = position.coords.latitude;
                        const longitude = position.coords.longitude;
                        sendStatusOrder(true, latitude, longitude, idWorker)
                        location.reload(true);
                    }, function(error) {
                        console.error("gagal mendapatkan lokasi", error);
                        sendStatusOrder(true, 0, 0, idWorker);
                        location.reload(true);
                    });
                } else {
                    alert('Geolocation tidak didukung pada browser anda');
                    sendStatusOrder(true, 0, 0, idWorker);
                    location.reload(true);
                }
            } else {
                sendStatusOrder(false, 0, 0, idWorker);
                location.reload(true);
            }
        });

        function sendStatusOrder(status, latitude, longitude, idWorker) {
            const data = {
                status: status,
                latitude: latitude,
                longitude: longitude,
                idWorker: idWorker
            };
            const url = `/worker/status-terima-order`;
            fetch(url, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify(data)
            }).then(response => response.json()).then(data => {
                console.log(data);
            }).catch(error => {
                console.log(error);
            })
        }
    </script>
@endsection
