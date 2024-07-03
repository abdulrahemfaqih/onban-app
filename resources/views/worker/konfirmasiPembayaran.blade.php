@extends('layouts.worker-order-layout')
@section('content')
    <p class="text-center font-bold text-gray-900 text-2xl">Silahkan Konfirmasi Pembayaran</p>
    <div class="p-3 border-2 border-black rounded-lg">
        <p class="text-center pb-2">Detail Pembayaran</p>
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
                    <td class="font-bold text-right">Rp{{ round($order->total_harga) }}</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection

@section('footer')
    <footer class="sticky bottom-0">
        <div class="max-w-screen mx-7 m-5 text-center rounded-lg shadow">
            <div class="flex justify-center items-center text-white text-sm h-[4rem] px-4">
                <a id="payment-done" href="{{ route('worker-order-selesai', ['id_order' => $order->id_order]) }}" class="border border-white bg-secondary text-base font-bold hover:bg-gray-900 p-3 rounded-lg w-full">
                    <p>Selesai</p>
                </a>
            </div>
        </div>
    </footer>
    <script>
        // pop up when payment-done
        document.getElementById('payment-done').addEventListener('click', function(event) {
            event.preventDefault();
            const hrefValue = event.currentTarget.href;
            Swal.fire({
                title: 'pembayaran selesai?',
                text: 'Apakah Anda yakin customer sudah membayar?',
                icon: 'warning',
                showCancelButton: true,
                dangerMode: true,
                confirmButtonText: 'Ya!',
                cancelButtonText: 'Tidak'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = hrefValue;
                }
            });
        });
    </script>
@endsection
