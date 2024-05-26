@extends('layouts.worker-layout')

@section('content')
    {{-- Worker Profile --}}
    <div class="flex">
        <img class="w-[100px] h-[100px] rounded-full border-4 border-primary"
            src="{{ asset('assets/images/alvan-nee-ZCHj_2lJP00-unsplash.jpg') }}" alt="">
        <div class="pl-3">
            <p class="font-bold text-[1.1rem]">Selamat Datang Worker,</p>
            <p class="pb-2"> {{ $worker->nama }}! </p>
            <hr class="border-1 border-gray-500 py-1">
            <p class="text-sm">Telah Bekerja selama 74 Tahun</p>
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
                <p class="text-xs">1 Mei - 30 Mei 2024</p>
                <h1 class="text-2xl text-primary font-bold">Rp{{ $orders->sum('total_harga') }}</h1>
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
                                        Total: Rp{{ $order->total_harga }}
                                    </p>
                                </div>
                                <div class="items-center text-base font-semibold text-gray-900 text-center">
                                    @if ($order->status_order == 'Menunggu Pekerja')
                                        <p class="text-red-500">Menunggu</p>
                                    @elseif ($order->status_order == 'Diproses')
                                        <p class="text-primary">{{ $order->status_order }}</p>
                                    @elseif ($order->status_order == 'Selesai')
                                        <p class="text-green-500">{{ $order->status_order }}</p>
                                    @endif
                                    <div class="pt-1">
                                        <button data-modal-target="default-modal-{{ $order->id_order }}"
                                            data-modal-toggle="default-modal-{{ $order->id_order }}"
                                            class="text-xs bg-primary text-white hover:bg-primary-dark rounded-lg p-2">Lihat
                                            Detail</button>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!-- Main modal -->
                        <div id="default-modal-{{ $order->id_order }}" tabindex="-1" aria-hidden="true"
                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-2xl max-h-full">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow">
                                    <!-- Modal header -->
                                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                            Detail Order
                                        </h3>
                                        <button type="button"
                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center "
                                            data-modal-hide="default-modal-{{ $order->id_order }}">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="p-6 text-gray-800">
                                        <h5 class="text-xl font-bold text-gray-800">Tambal
                                            {{ $order->tipe_layanan->nama_tipe_layanan }}</h5>
                                        <iframe class="border border-primary my-4 pt-3" height="300"
                                            src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d7917.826116690897!2d{{ $order->longitude }}!3d{{ $order->latitude }}!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sid!2sid!4v1716094381407!5m2!1sid!2sid"
                                            allowfullscreen="" loading="lazy"
                                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                                        <div class="px-3">
                                            <table class="table w-full">
                                                <tbody>
                                                    <tr>
                                                        <td class="font-medium w-10">Nama</td>
                                                        <td class="text-right">{{ $order->customer->nama }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="font-medium w-10">Alamat</td>
                                                        <td class="text-right">{{ $order->alamat }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="font-medium w-10">Catatan</td>
                                                        <td class="text-right">{{ $order->catatan }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="font-bold w-10">Total</td>
                                                        <td class="font-bold text-right">Rp{{ $order->total_harga }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- Modal footer -->
                                    <div
                                        class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                        @if ($order->status_order != 'Selesai')
                                            <a href="{{ route('worker-order', ['id_order' => $order->id_order]) }}"><button
                                                    data-modal-hide="default-modal-{{ $order->id_order }}" type="button"
                                                    class="text-white bg-primary hover:bg-primary-dark focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Terima</button></a>
                                        @endif
                                        <button data-modal-hide="default-modal-{{ $order->id_order }}" type="button"
                                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-orange-300 hover:bg-orange-300 focus:z-10 focus:ring-4 focus:ring-gray-100 ">Kembali</button>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                    }, function(error) {
                        console.error("gagal mendapatkan lokasi", error);
                        sendStatusOrder(true, 0, 0, idWorker);
                    });
                } else {
                    alert('Geolocation tidak didukung pada browser anda');
                    sendStatusOrder(true, 0, 0, idWorker);
                }
            } else {
                sendStatusOrder(false, 0, 0, idWorker);
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
