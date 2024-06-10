@extends('layouts.user-layout')
@section('content')
    <div id="distance-container" class="mt-4 w-full text-center absolute z-40 top-14 left-1/2 translate-x-[-50%]">
        <div class="mx-auto gap-3 flex w-3/4 lg:w-1/3 md:w-2/3">
            <p class="bg-white w-1/2 mx-auto rounded-md py-2 text-secondary">Jarak worker: <b>{{ $order->jarak }}km</b>
            </p>
            <p class="bg-white w-1/2 mx-auto rounded-md py-2 text-secondary">Harga: <b>Rp {{ $order->total_harga }}</b>
            </p>
        </div>

    </div>
    <div class="w-full h-full pt-20 flex flex-col flex-wrap">
        <div class="w-[90%] absolute top-24 left-1/2 translate-x-[-50%] rounded-lg lg:w-2/3 md:w-3/4">
            <div id='map' style='width: 100%; height: 400px;'></div>
        </div>

        <div class="w-full mx-auto h-56 bg-primary mt-56 rounded-md flex flex-col flex-wrap lg:w-2/3 md:w-3/4">


            <div class="w-full h-3/4  flex lg:px-32">
            <div class="w-20 ml-2 rounded-full h-14 md:h-20 flex justify-center overflow-hidden content-center">
                    <img class="w-full h-full object-cover mx-auto mt-2 border-gray-300 rounded-full"
                        src="{{ asset('storage/' . $order->worker->foto_formal) }}" alt="">
                </div>
                <div class="text-white flex-wrap">
                    <p class="font-bold pl-2 pt-2">Profile Worker</p>
                    <p class="pl-2 pt-2">Nama: {{ $order->worker->nama }}</p>
                    <p class="pl-2 pt-2">No Telepon: {{ $order->worker->no_hp }}</p>
                    <p class="pl-2 pt-2">Rating: {{ $rataRataRating }}/5</p>
                </div>
            </div>
            <div class="w-full flex justify-between py-2.5 lg:px-32 px-2 h-1/4">
                <div class="flex justify-center content-center h-1/2">
                    <a href="{{ route('cancel-order', $order->id_order) }}" id="cancel-link"
                        class="my-auto hover:text-gray-200 hover:border-gray-200 border-white border-2 mx-auto text-white p-1 rounded-md">Batalkan</a>
                </div>
                <div class="flex justify-center content-center h-1/2">
                    <a href="{{ route('userChat') }}"
                        class="my-auto hover:text-gray-200 hover:border-gray-200 border-white border-2 mx-auto text-white p-1 rounded-md">Chat
                        Worker</a>
                </div>
                <div class="flex justify-center content-center h-1/2">
                    <a href="{{ route('payment-info', $order->id_order) }}"
                        class="my-auto hover:text-orange-400 hover:bg-gray-200 bg-white hover:border-orange-400 border-primary border-2 mx-auto text-primary p-1 rounded-md">Pembayaran</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            mapboxgl.accessToken =
                'pk.eyJ1IjoiYWJkdWxyYWhlbWZhcWloIiwiYSI6ImNsd3l4Nm5pNjAxZzYyanNlaGp1eW41dmQifQ.fyJP2_k7LV4_3NCH9sAFWw';
            var map = new mapboxgl.Map({
                container: 'map',
                style: 'mapbox://styles/mapbox/streets-v12',
                center: [{{ $userLocation['longitude'] }}, {{ $userLocation['latitude'] }}],
                zoom: 12
            });

            map.on('load', function() {
                var userMarkerElement = document.createElement('div');
                userMarkerElement.innerHTML =
                    '<div class="marker"><div class="label">Anda</div><div class="icon" style="background-color: blue;"></div></div>';
                userMarkerElement.className = 'marker-container';

                var workerMarkerElement = document.createElement('div');
                workerMarkerElement.innerHTML =
                    '<div class="marker"><div class="label">Work    er</div><div class="icon" style="background-color: red;"></div></div>';
                workerMarkerElement.className = 'marker-container';

                new mapboxgl.Marker(userMarkerElement)
                    .setLngLat([{{ $userLocation['longitude'] }}, {{ $userLocation['latitude'] }}])
                    .addTo(map);

                new mapboxgl.Marker(workerMarkerElement)
                    .setLngLat([{{ $workerLocation['longitude'] }}, {{ $workerLocation['latitude'] }}])
                    .addTo(map);

                var directionsUrl =
                    `https://api.mapbox.com/directions/v5/mapbox/driving/{{ $userLocation['longitude'] }},{{ $userLocation['latitude'] }};{{ $workerLocation['longitude'] }},{{ $workerLocation['latitude'] }}?geometries=geojson&access_token=${mapboxgl.accessToken}`;

                axios.get(directionsUrl)
                    .then(response => {
                        var data = response.data.routes[0];
                        var route = data.geometry.coordinates;
                        var distance = data.distance / 1000; // Jarak dalam kilometer
                        var pricePerKm = {{ $pricePerKm }};
                        var totalPrice = (distance * pricePerKm) + {{ $harga_tipe_layanan }};

                        map.addLayer({
                            id: 'route',
                            type: 'line',
                            source: {
                                type: 'geojson',
                                data: {
                                    type: 'Feature',
                                    properties: {},
                                    geometry: {
                                        type: 'LineString',
                                        coordinates: route
                                    }
                                }
                            },
                            layout: {
                                'line-join': 'round',
                                'line-cap': 'round'
                            },
                            paint: {
                                'line-color': '#888',
                                'line-width': 6
                            }
                        });
                    })
                    .catch(error => {
                        console.error('Error fetching directions:', error);
                        alert('Gagal mengambil directions. Periksa console untuk detailnya.');
                    });
            });

            document.getElementById('cancel-link').addEventListener('click', function(event) {
                event.preventDefault();
                Swal.fire({
                    title: 'Apakah anda yakin ingin membatalkan?',
                    text: 'Mohon chat dahulu worker anda sebelum membatalkan.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Batalkan!',
                    cancelButtonText: 'Tidak, saya tetap lanjutkan'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = event.target.href;
                    }
                });
            });
        });
    </script>

    <style>
        .marker-container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .marker .label {
            font-size: 12px;
            font-weight: bold;
            margin-bottom: 4px;
            text-align: center;
            color: #000;
            background: rgba(255, 255, 255, 0.8);
            padding: 2px 4px;
            border-radius: 3px;
        }

        .marker .icon {
            width: 20px;
            height: 20px;
            border-radius: 50%;
        }
    </style>
@endsection
