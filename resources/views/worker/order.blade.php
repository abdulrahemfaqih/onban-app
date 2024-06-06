@extends('layouts.worker-order-layout')
@section('content')
    <p class="text-center font-bold text-gray-900 text-2xl">Order</p>
    <iframe class="border border-primary my-4 pt-3" width="100%" height="400"
        src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d7917.826116690897!2d{{ $order->longitude }}!3d{{ $order->latitude }}!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sid!2sid!4v1716094381407!5m2!1sid!2sid"
        allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
    </iframe>
    <div class="flex space-x-2">
        <p class="border border-gray-300 p-3 rounded-lg shadow">{{ $order->jarak }}</p>
        <p class="border border-gray-300 p-3 rounded-lg shadow">Estimasi Biaya: {{ round($order->total_harga) }} </p>
    </div>
    <p class="border border-gray-300 p-3 rounded-lg shadow">Lokasi User: {{ $order->alamat }}, {{ $order->catatan }}</p>
@endsection

@section('footer')
    <footer class="sticky bottom-0">
        <div class="max-w-screen mx-7 m-5 text-center bg-secondary rounded-lg shadow">
            <div class="flex justify-between items-center text-white text-sm h-[4rem] px-4 space-x-3">
                <a href=""
                    class="text-sm font-bold text-secondary bg-white hover:bg-gray-400 p-3 rounded-lg w-[50%]">
                    <p>Chat Customer</p>
                </a>
                <a href="{{ route('worker-order-konfirmasi-pembayaran', ['id_order' => $order->id_order]) }}"
                    class="border border-white text-base font-bold hover:bg-gray-900 p-3 rounded-lg w-[50%]">
                    <p>Selesai</p>
                </a>
            </div>
        </div>
    </footer>
@endsection
