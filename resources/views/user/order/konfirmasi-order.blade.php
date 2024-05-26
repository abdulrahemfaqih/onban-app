@extends('layouts.user-layout')
@section('content')
    <div data-order-id="{{ $informasi_order->id_order }}"></div>
    <img src="{{ asset('storage/' . $informasi_order->tipe_layanan->foto_tipe_layanan) }}" alt="kendaraan"
        class="absolute top-28 left-20 md:left-1/2 lg:right-1/2 lg:translate-x-[-50%]">
    <div class="bg-primary rounded-lg px-8 py-4 mx-4 mt-10 md:w-3/4 md:mx-auto lg:w-1/3 lg:mx-auto">
        <p class="text-2xl text-white font-bold text-center">Informasi Order</p>
        <div class="flex justify-between text-lg py-4">
            <div class="text-orange-300">
                <p>Kendaraan</p>
                <p>Harga</p>
                <p>Harga per km</p>
            </div>
            <div class="text-right text-white">
                <p>{{ $informasi_order->tipe_layanan->nama_tipe_layanan }}</p>
                <p>{{ $informasi_order->tipe_layanan->harga_tipe_layanan }}</p>
                <p>Rp 3000</p>
            </div>
        </div>
    </div>

    <div class="flex flex-col text-center py-8 md:py-10 space-y-4 md:gap-10 font-bold w-full">
        <form action="{{ route('update-location') }}" method="post">
            @csrf
            <div x-data="{ open: false }" class="md:gap-4 w-2/3 md:w-2/4 lg:w-1/3 mx-auto md:mx-auto h-20">
                <input type="hidden" name="id_order" value="{{ $informasi_order->id_order }}">
                <input type="hidden" name="latitude">
                <input type="hidden" name="longitude">
                <input type="hidden" name="alamat">
                <input type="hidden" name="status_order" value="Menunggu Pekerja">
                <select class="w-full h-20 " id="voucher" name="voucher_id" >
                    @foreach ($vouchers as $voucher)
                        <option value="{{ $voucher->id_voucher }}">{{ $voucher->nama_voucher }}</option>
                    @endforeach
                </select>
            </div>

            {{-- buatkan inputan catatan order --}}
            <textarea name="catatan" placeholder="catatan order"  class="w-3/4 h-20 rounded-md mb-4 md:w-1/2 md:h-40 lg:w-1/3"></textarea>

            <div class="flex flex-col gap-4 md:gap-6 md:w-2/3 md:mx-auto lg:w-1/3">
                <button id="confirmOrder"
                    class="bg-white border-4 border-primary content-center text-primary mx-16 p-2 rounded-lg hover:text-orange-400 hover:border-orange-400">Konfirmasi</button>
                <a href="{{ route('order-choose-vehicle', ['id_order' => $informasi_order->id_order]) }}"
                    class="bg-primary text-white mx-16 p-2 content-center rounded-lg hover:bg-orange-400">kembali</a>
            </div>
        </form>
    </div>

@endsection
@section('js')
    <script>
        document.getElementById('confirmOrder').addEventListener('click', async function(event) {
            event.preventDefault();
            const hrefValue = event.currentTarget.href;
            const result = await Swal.fire({
                title: 'Order Confirmation',
                text: 'Is your order correct?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes!',
                cancelButtonText: 'No',
                cancelButtonColor: '#d33',
                confirmButtonColor: '#3085d6'
            });
            if (result.isConfirmed) {
                await getLocation();
                document.querySelector('form').submit();
            }
        });

        $(document).ready(function() {
            $('#voucher').select2({
                placeholder: "Use Voucher",
                allowClear: true
            });
        });

        async function getLocation() {
            if (navigator.geolocation) {
                const position = await new Promise((resolve, reject) => {
                    navigator.geolocation.getCurrentPosition(resolve, reject);
                });
                const lat = position.coords.latitude;
                const long = position.coords.longitude;
                const alamat = await getAlamat(lat, long);

                document.querySelector('input[name="latitude"]').value = lat;
                document.querySelector('input[name="longitude"]').value = long;
                document.querySelector('input[name="alamat"]').value = alamat;
            } else {
                alert("Geolocation is not supported by this browser.");
            }
        }

        async function getAlamat(lat, long) {
            const url = `https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${long}`;
            try {
                const response = await fetch(url);
                const data = await response.json();
                if (data && data.display_name) {
                    return data.display_name;
                } else {
                    return 'No results found';
                }
            } catch (error) {
                return 'Geocoder failed due to: ' + error;
            }
        }
    </script>
@endsection
