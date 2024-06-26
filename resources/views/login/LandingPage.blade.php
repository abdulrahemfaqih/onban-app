<!-- component -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('assets/images/onban-icon.png') }}" type="image/png">
    <title>{{ $title }} | onban</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        * {
            /* border: 1px solid black; */

        }
    </style>
</head>

<body class="bg-white ">

    <div class=" w-screen flex flex-col  h-screen gap-20">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm ">
            <img class="mx-auto h-10 w-auto mt-4" src="{{ asset('assets/images/logoUser.svg') }}" alt="Your Company">
        </div>
        <div class="w-full h-40 bg-opacity-60 mt-2  content-center flex flex-col">
          
            <div>
                <img src="{{ asset('assets/images/landing.svg') }}" alt="" class="w-2/3 mx-auto">
            </div>
            <div class="w-2/3  text-center text-gray-600 text-lg font-bold my-auto h-1/2 mx-auto ">
                <p><b class="text-primary">Onban</b> layanan tambal ban online </p>
            </div>
        </div>
        <div class="w-screen h-16 flex content-center justify-center gap-8 p-2 mt-36 ">
            <div class="">
                <a href="{{ route('login') }}"
                    class="text-primary w-40 border-2 border-primary py-4 px-10 hover:py-5 hover:px-11 rounded-md">
                    Login</a>
            </div>
            <div class="">
                <a href="{{ route('register') }}"
                    class=" text-white w-40 bg-primary py-5 px-6 hover:py-6 hover:px-7 rounded-md"> Get Started </a>
            </div>
        </div>
    </div>
   
</body>

</html>
