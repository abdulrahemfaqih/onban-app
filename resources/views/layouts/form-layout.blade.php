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
		*{
			/* border: 1px solid black; */

		}
	</style>
</head>
<body class="bg-white">
	<div class="min-h-screen w-screen flex flex-col p-6 items-center justify-center">
		<div class="flex justify-center mb-8">
			{{-- <h1 class="text-5xl m-5">Logo</h1> --}}
			<div class="sm:mx-auto sm:w-full sm:max-w-sm">
				<img class="mx-auto h-10 w-auto" src="{{ asset('assets/images/logoUser.svg') }}" alt="Your Company">
				{{-- <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Admin Login</h2> --}}
			</div>
	  	</div>
			@yield("content")
		<p class="text-xs text-gray-600 text-center mt-5 justify-end">&copy; 2024 OnBan-Corporation</p>
	</div>
</body>
</html>
