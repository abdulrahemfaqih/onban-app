<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('assets/images/onban-icon.png') }}" type="image/png">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel='stylesheet'
        href='https://cdn-uicons.flaticon.com/2.3.0/uicons-regular-rounded/css/uicon xs-regular-rounded.css'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    {{-- css mapbox --}}
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.css' rel='stylesheet' />

        {{-- Sweetalert2 --}}
    <script src="{{ asset('assets/sweetalert2/sweetalert2.all.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/sweetalert2/sweetalert2.css') }}">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    <link rel="stylesheet" href="{{ asset('build/assets/app-BPxFg8fj.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('build/assets/app-C9pRe2dr.js') }}"> --}}
    <title>{{ $title }} | onbann</title>
</head>

<body data-worker-id="{{ $worker->id_worker }}" class="font-poppins">
    <div class="flex flex-col justify-between min-h-screen">
        @include('partial.header-worker')
        <div class="container px-6 space-y-6">
            @yield('content')
        </div>
        @include('partial.footer-worker')
    </div>
    @yield('js')
    <script src="{{ asset('build/assets/app-C9pRe2dr.js') }}"></script>
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.js'></script>
</body>

</html>
