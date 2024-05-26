@extends('layouts.form-dark-layout')
@section('content')
    <h1 class="text-2xl font-semibold text-center text-white mt-8 mb-6">Login Worker</h1>
    @if (session()->has('success'))
    <div id="alert-3" class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">  
        <div class="ms-3 text-sm font-medium">
            {{ session()->get('success') }}
        </div>
        <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-3" aria-label="Close">
         
          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
          </svg>
        </button>
      </div>
    @endif
    @if (session()->has('error'))
        <div class="bg-red-500 text-white p-3 rounded-lg text-center mb-10">
            {{ session()->get('error') }}
        </div>
    @endif

    <form class="max-w-md mx-auto w-3/4" method="post" action="{{ route('login-worker') }}" autocomplete="off">
        @csrf
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="username" id="username"
                class="block py-2.5 px-0 w-full text-sm text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-primary focus:outline-none focus:ring-0 focus:border-primary peer"
                placeholder=" " required />
            <label for="username"
                class="peer-focus:font-medium absolute text-sm text-white dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-primary peer-focus:dark:text-primary peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Username</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input type="password" name="password" id="password"
                class="block py-2.5 px-0 w-full text-sm text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-primary focus:outline-none focus:ring-0 focus:border-primary peer"
                placeholder=" " required />
            <label for="password"
                class="peer-focus:font-medium absolute text-sm text-white dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-primary peer-focus:dark:text-primary peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Password</label>
        </div>

        <div class="mx-auto my-5 flex justify-center relative w-full">
            <button type="submit" class="text-secondary bg-white hover:bg-primary-dark focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-3/4 mx-8  px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ">Login</button>
        </div>

        <div class="inline-flex items-center justify-center w-full">
            <hr class="flex justify-center w-64 h-px my-5 bg-gray-400 border-0 dark:bg-gray-700">
            <span class="absolute text-[12px] px-3 font-medium  -translate-x-[4.9rem] lg:-translate-x-[5.5rem]  bg-secondary left-1/2  text-white dark:bg-gray-900">Belum Punya Akun?<a href="{{ route('register-worker') }}" class="text-cyan-600"> Register </a></span>
        </div>

        {{-- <a href="{{ route('register-worker') }}"
            class=" text-secondary text-md bg-white hover:bg-primary focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Register</a> --}}

        <div class="text-center">
            <p class="text-sm mt-10 text-white">Login Sebagai User? <a href="{{ route('login') }}" class="text-cyan-600">Login User</a></p>
        </div>
    </form>
@endsection
