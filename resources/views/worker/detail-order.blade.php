@extends('layouts.worker-layout')

@section('content')
<div class="justify-center items-center w-full max-h-full">
    <div class="p-4 w-full">
        <!-- Modal content -->
        <div class=" bg-white rounded-lg shadow">
            <!-- Modal header -->
            <h3 class="text-lg text-gray-800 text-center pt-4 italic">
                ID Order: {{ $order->id_order }}
            </h3>
            <!-- Modal body -->
            <div class="pt-0 text-gray-800">
                <h5 class="text-xl font-semibold text-center text-gray-800">Tambal
                    {{ $order->tipe_layanan->nama_tipe_layanan }}
                </h5>
                <iframe class="border border-primary my-4 pt-3 w-full" height="300" width="100%"
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
                                <td class="font-bold text-right">Rp{{ round($harga) }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Modal footer -->
            <div
                class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                @if ($order->status_order == 'Selesai' || $order->status_order == 'Dibatalkan')
                    <a href="{{ route('worker-home') }}">
                        <button
                            type="button"
                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-orange-300 hover:bg-orange-300 focus:z-10 focus:ring-4 focus:ring-gray-100 ">Kembali
                        </button>
                    </a>
                @else
                    <a id="accept-order" href="{{ route('worker-order', ['id_order' => $order->id_order]) }}">
                        <button
                            type="button"
                            class="text-white bg-primary hover:bg-primary-dark focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Terima
                        </button>
                    </a>
                    <a href="{{ route('worker-home') }}">
                        <button
                            type="button"
                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-orange-300 hover:bg-orange-300 focus:z-10 focus:ring-4 focus:ring-gray-100 ">Kembali
                        </button>
                    </a>
                @endif
            </div>
        </div>
    </div>
</div>
<script>
      // pop up when accept order
        document.getElementById('accept-order').addEventListener('click', function(event) {
            event.preventDefault();
            const hrefValue = event.currentTarget.href;
            Swal.fire({
                title: 'Terima Order ?',
                text: 'Apakah Anda yakin ingin mengambil order ini?',
                icon: 'info',
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
