@extends('layouts.form-dark-layout')
@section('content')
    <h1 class="text-2xl font-semibold text-center text-white mt-8 mb-6">Registrasi Worker</h1>
    @if ($status_penerimaan == 0)
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Peringatan!</strong>
            <span class="block sm:inline">Pendaftaran worker sedang ditutup</span>
            <span class="block sm:inline">Cek info update penerimaan worker di instagram kami</span>
        </div>
    @else
        <form class="w-3/4 md:2/3 lg:2/3 xl:2/3 mx-auto" method="post" action="{{ route('register-worker') }}" enctype="multipart/form-data">

            @csrf
            <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="nama_lengkap" id="nama_lengkap"
                    class="block py-2.5 px-0 w-full text-sm text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-primary focus:outline-none focus:ring-0 focus:border-
                primary peer"
                    placeholder=" " required value="{{ old('nama_lengkap') }}" />
                <label for="floating_name"
                    class="peer-focus:font-medium absolute text-sm text-white dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-primary peer-focus:dark:text-primary peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nama
                    Lengkap</label>
                @error('nama_lengkap')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="username" id="username"
                    class="block py-2.5 px-0 w-full text-sm text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-primary focus:outline-none focus:ring-0 focus:border-primary peer"
                    placeholder=" " required value="{{ old('username') }}" />
                <label for="floating_email"
                    class="peer-focus:font-medium absolute text-sm text-white dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-primary peer-focus:dark:text-primary peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Username</label>
                @error('username')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <input type="email" name="email" id="email"
                    class="block py-2.5 px-0 w-full text-sm text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-primary focus:outline-none focus:ring-0 focus:border-primary peer"
                    placeholder=" " required value="{{ old('email') }}" />
                <label for="floating_email"
                    class="peer-focus:font-medium absolute text-sm text-white dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-primary peer-focus:dark:text-primary peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email</label>
                @error('email')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <input type="tel" name="no_hp" id="no_hp"
                    class="block py-2.5 px-0 w-full text-sm text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-primary focus:outline-none focus:ring-0 focus:border-primary peer"
                    placeholder=" " required value="{{ old('no_hp') }}" />
                <label for="no_hp"
                    class="peer-focus:font-medium absolute text-sm text-white dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-primary peer-focus:dark:text-primary peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">No
                    HP</label>
                @error('no_hp')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="alamat" id="alamat"
                    class="block py-2.5 px-0 w-full text-sm text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-primary focus:outline-none focus:ring-0 focus:border-primary peer"
                    placeholder=" " required value="{{ old('alamat') }}" />
                <label for="alamat"
                    class="peer-focus:font-medium absolute text-sm text-white dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-primary peer-focus:dark:text-primary peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Alamat</label>
                @error('alamat')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <input type="password" name="password" id="password"
                    class="block py-2.5 px-0 w-full text-sm text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-primary focus:outline-none focus:ring-0 focus:border-primary peer"
                    placeholder=" " required />
                <label for="password"
                    class="peer-focus:font-medium absolute text-sm text-white dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-primary peer-focus:dark:text-primary peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Password</label>
                @error('password')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <input type="password" name="konfirmasi_password" id="konfirmasi_password"
                    class="block py-2.5 px-0 w-full text-sm text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-primary focus:outline-none focus:ring-0 focus:border-primary peer"
                    placeholder=" " required />
                <label for="konfirmasi_password"
                    class="peer-focus:font-medium absolute text-sm text-white dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-primary peer-focus:dark:text-primary peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Ulangi
                    Password</label>
                @error('konfirmasi_password')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <label class="block mb-2 text-sm font-medium text-white dark:text-white" for="file_input">Upload Foto
                    KTP</label>
                <input
                    class="block w-full text-[12px] text-secondary border border-gray-300 rounded-lg cursor-pointer bg-white dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    id="file_input" type="file" name="foto_ktp" value="{{ old('foto_ktp') }}">
                @error('foto_ktp')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <label class="block mb-2 text-sm font-medium text-white dark:text-white" for="file_input">Upload Foto Formal
                    (3x4) </label>
                <input
                    class="block w-full text-[12px] text-secondary border border-gray-300 rounded-lg cursor-pointer bg-white dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    id="file_input" type="file" name="foto_formal" value="{{ old('foto_formal') }}">
                @error('foto_formal')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex">
                <label for="jenis_kelamin" class="mb-2 text-white"> Jenis Kelamin :</label>
            </div>
            <div class="flex items-center gap-4 me-4 mb-6">
                <div>
                    <input id="orange-radio" type="radio" value="Laki-laki" name="jenis_kelamin"
                        class="w-4 h-4 text-orange-500 bg-gray-100 border-gray-300 focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="orange-radio"
                        class="ms-2 text-sm font-medium text-white dark:text-gray-300">Laki-laki</label>
                </div>
                <div>
                    <input id="orange-radio" type="radio" value="Perempuan" name="jenis_kelamin"
                        class="w-4 h-4 text-orange-500 bg-gray-100 border-gray-300 focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="orange-radio"
                        class="ms-2 text-sm font-medium text-white dark:text-gray-300">Perempuan</label>
                </div>
            </div>
            <div class="flex justify-center flex-col ">
                <button type="submit"
                    class="text-secondary bg-white hover:bg-primary-dark focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-3/4  flex justify-center mx-auto h-10  px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ">Register</button>
            </div>

        </form>
        <div class="inline-flex items-center justify-center w-full">
            <hr class="flex justify-center w-64 h-px my-5 bg-gray-400 border-0 dark:bg-gray-700">
            <span
                class="absolute text-[12px] px-3 font-medium  -translate-x-[4.9rem] lg:-translate-x-[5.5rem]  bg-secondary left-1/2  text-white dark:bg-gray-900">Belum
                Punya Akun?<a href="{{ route('login-worker') }}" class="text-cyan-600"> Login </a></span>
        </div>
    @endif
@endsection
