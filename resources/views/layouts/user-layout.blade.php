<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('assets/images/logoUser.svg') }}" type="image/png">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    {{-- link kan ke build yang sudah di public --}}
    <link rel="stylesheet" href="{{ asset('build/assets/app-BPxFg8fj.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('build/assets/app-C9pRe2dr.js') }}"> --}}
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    {{-- ulasan --}}
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />

    {{-- mapbox css --}}
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.css' rel='stylesheet' />


    {{-- Sweetalert2 --}}
    <script src="{{ asset('assets/sweetalert2/sweetalert2.all.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/sweetalert2/sweetalert2.css') }}">

    {{-- maps --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://kit.fontawesome.com/ef4e7032ea.js" crossorigin="anonymous"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    {{-- native css --}}
    <style>
        * {
            /* border: 1px solid black; */
            font-family: 'Poppins'
        }
    </style>

    {{-- jQuery --}}
    <script src="{{ asset('assets/jQuery/jQuery.js') }}"></script>


    {{-- Select2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <title>{{ $title }} | onban</title>

</head>

<body>
    @include('partial.header-user')

    <div class="container px-4 ">
        @yield('content')
    </div>

    @yield('js')
    {{-- mapbox jsnya --}}
    {{-- <script src="{{ asset('build/assets/app-C9pRe2dr.js') }}"></script> --}}
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.js'></script>
</body>

</html>
