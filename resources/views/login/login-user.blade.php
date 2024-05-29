@extends('layouts.form-layout')
@section('content')
    @if (session()->has('success'))
        @include('partial.alert-success', ['message' => session()->get('success')])
    @endif

    <h1 class="text-2xl font-semibold text-center text-gray-500 mt-8 mb-6">Login</h1>
    @if (session()->has('error'))
        <div class="bg-red-500 text-white p-3 rounded-lg text-center mb-10">
            {{ session()->get('error') }}
        </div>
    @endif




    <form class="max-w-md mx-auto" method="post" action={{ route('login') }} autocomplete="off">
        @csrf
        <div class="">
            <div class="relative z-0 w-full mb-5 group">
                <input type="text" autofocus name="username" id="username"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " required />
                <label for="floating_email"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Username</label>
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <input type="password" name="password" id="password"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " required />
                <label for="floating_password"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Password</label>
            </div>
            <div class="mx-auto my-5 relative w-full">
                <button type="submit"
                    class="text-white bg-primary hover:bg-primary-dark focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-3/4 mx-8  px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ">Login</button>
            </div>

            <div class="inline-flex items-center justify-center w-full">
                <hr class="flex justify-center w-64 h-px my-5 bg-gray-400 border-0 dark:bg-gray-700">
                <span
                    class="absolute text-[12px] px-3 font-medium text-gray-900 -translate-x-[4.9rem] lg:-translate-x-[4.6rem]  bg-white left-1/2  dark:text-white dark:bg-gray-900">Belum
                    Punya Akun?<a href="{{ route('register') }}" class="text-cyan-600"> Register </a></span>
            </div>

            {{-- <a href="{{ route('register') }}" class=" text-white bg-primary hover:bg-primary-dark focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Register</a> --}}

            <div class="text-center">
                <p class="text-sm mt-10">Login Sebagai Pekerja? <a href="{{ route('login-worker') }}"
                        class="text-cyan-600">Login Pekerja</a></p>
            </div>

            <div class="text-center text-slate-600">
                <p class="text-xs mt-2"><a href="{{ route('user-help') }} ">Panduan penggunaan
                        aplikasi</a></p>
            </div>
        </div>
    </form>
@endsection
