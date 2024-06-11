@extends('layouts.worker-order-layout')
@section('content')
    <p class="text-center font-bold text-gray-900 text-2xl">Order</p>
    <div id="map" style='width: 100%; height: 400px;'></div>
    <div class="flex space-x-2">
        <p class="border border-gray-300 p-3 rounded-lg shadow">{{ $order->jarak }} KM</p>
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

@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            mapboxgl.accessToken =
                'pk.eyJ1IjoiYWJkdWxyYWhlbWZhcWloIiwiYSI6ImNsd3l4Nm5pNjAxZzYyanNlaGp1eW41dmQifQ.fyJP2_k7LV4_3NCH9sAFWw';
            var map = new mapboxgl.Map({
                container: 'map',
                style: 'mapbox://styles/mapbox/streets-v11',
                center: [{{ $order->longitude }}, {{ $order->latitude }}],
                zoom: 12
            });

            map.on('load', function() {
                var userMarkerElement = document.createElement('div');
                userMarkerElement.innerHTML =
                    '<div class="marker"><div class="label">Customer</div><div class="icon" style="background-color: blue;"></div></div>';
                userMarkerElement.className = 'marker-container';

                var workerMarkerElement = document.createElement('div');
                workerMarkerElement.innerHTML =
                    '<div class="marker"><div class="label">Anda</div><div class="icon" style="background-color: red;"></div></div>';
                workerMarkerElement.className = 'marker-container';

                new mapboxgl.Marker(userMarkerElement)
                    .setLngLat([{{ $order->longitude }}, {{ $order->latitude }}])
                    .addTo(map);

                new mapboxgl.Marker(workerMarkerElement)
                    .setLngLat([{{ $longWorker }}, {{ $latWorker }}])
                    .addTo(map);

                var directionsUrl =
                    `https://api.mapbox.com/directions/v5/mapbox/driving/{{ $order->longitude }},{{ $order->latitude }};{{ $longWorker }},{{ $latWorker }}?geometries=geojson&access_token=${mapboxgl.accessToken}`;

                axios.get(directionsUrl)
                    .then(response => {
                        // Mengambil koordinat rute dari respons axios
                        const route = response.data.routes[0].geometry.coordinates;

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
