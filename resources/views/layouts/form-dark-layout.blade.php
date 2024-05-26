<!-- component -->
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('assets/images/workerLogo.svg') }}" type="image/png">
	<title>{{ $title }} | onbann</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
	<style>
		*{
			/* border: 1px solid white; */
		}
	</style>
</head>
<body class="bg-secondary">
  <div class="border-2 min-h-screen flex flex-col p-6 items-center justify-center">
	<div class="flex justify-center mb-8">
		{{-- <h1 class="text-5xl m-5">Logo</h1> --}}
		<div class="sm:mx-auto sm:w-full sm:max-w-sm">
			<img class="mx-auto h-10 w-auto" src="{{ asset('assets/images/workerLogo.svg') }}" alt="Your Company">
			{{-- <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Admin Login</h2> --}}
		</div>
	  </div>
        @yield("content")
		<p class="text-xs text-white text-center mt-5 justify-end">&copy; 2024 OnBan-Corporation</p>
	</div>
  </div>
</body>
</html>
