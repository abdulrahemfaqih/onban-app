@extends('layouts.user-layout')
@section('content')
    <nav class="bg-gradient-to-b from-[#F67E00] min-h-96 z-10  top-0 w-full  absolute left-1/2 right-1/2 translate-x-[-50%]">
        <a href="{{ route('home') }}"><img class="h-10 ml-4 mt-5 w-auto " src="{{ asset('assets/images/logoUser.svg') }}"
                alt="Your Company"></a>
    </nav>
    <h1
        class="text-center text-2xl font-medium text-white mx-auto absolute w-3/4 h-40 top-20 z-20 left-1/2 right-1/2 translate-x-[-50%]">
        Profile </h1>

    <div
        class="absolute top-28 lg:top-28 rounded-full md:top-48 mt-2 mx-auto w-32 h-32 left-1/2 right-1/2 translate-x-[-50%] z-40 overflow-hidden content-center">
        <img src="{{ isset($profile->foto_profil) ? asset('storage/' . $profile->foto_profil) : asset('assets/images/default-foto.jpg') }}" alt="profile" class="object-cover w-full h-full">

    </div>

    <div class="z-40 absolute left-1/2 right-1/2 translate-x-[-50%] w-3/4 mx-auto top-[38%] font-bold text-center">
        <p class="text-lg">{{ $profile->nama }}</p>
        <p class="text-secondary text-sm opacity-40">{{ $profile->alamat }}</p>
    </div>

    <div class="z-40 absolute left-1/2  justify-center  right-1/2 content-center translate-x-[-50%] w-3/4 mx-auto top-[50%] font-bold text-center"
        x-data="{ open: false }">
        <div class="mx-auto w-1/2 text-secondary flex flex-col" x-on:click="open = ! open">
            <img src="{{asset('assets/images/edit-profile.svg')}}" alt="Edit" class="w-6 mx-auto">
            <p class="text-sm">Edit Profile</p>
            <hr class="w-24 border-1 mt-2 border-black mx-auto">
        </div>
        <div class="mt-4 w-full">
            <div class="lg:w-2/3 w-72 mx-auto">
                @if (session()->has('success'))
                    @include('partial.alert-success', ['message' => session()->get('success')])
                @endif
            </div>
        </div>

        {{-- form edit profile --}}
        <form class="w-full max-w-lg mx-auto mt-6 p-6 " x-show="open" method="post" action="{{ route('udpate-profile')}}" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full  px-3 mb-6 md:mb-0 ">
                    <label class="block uppercase text-start tracking-wide text-gray-700 text-xs font-bold mb-2"
                        for="grid-first-name">
                        Username
                    </label>
                    <input
                        class="appearance-none block w-full  border-b-gray-400 border-t-0 border-x-0 text-gray-700  py-3 px-4 mb-3 leading-tight focus:outline-none focus:ring-0 focus:bg-white focus:border-gray-500"
                        id="grid-first-name" type="text" name="username" value="{{ $profile->user->username }}">
                </div>
                <div class="w-full  px-3">
                    <label class="block uppercase text-start tracking-wide text-gray-700 text-xs font-bold mb-2"
                        for="grid-last-name">
                        Nama
                    </label>
                    <input
                        class="appearance-none block w-full  text-gray-700 border border-b-gray-400 border-t-0 border-x-0  py-3 px-4 leading-tight focus:outline-none focus:ring-0 focus:bg-white focus:border-gray-500"
                        id="grid-last-name" type="text"  name="nama" value="{{ $profile->nama }}">
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label class="block uppercase text-start tracking-wide text-gray-700 text-xs font-bold mb-2"
                        for="grid-password">
                        Email
                    </label>
                    <input
                        class="appearance-none block w-full  text-gray-700 border border-b-gray-400 border-t-0 border-x-0  py-3 px-4 mb-3 leading-tight focus:outline-none focus:ring-0 focus:bg-white focus:border-gray-500"
                        id="grid-password" type="email" name="email" value="{{ $profile->user->email }}">

                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-2">
                <div class="w-full  px-3 mb-6 md:mb-0">
                    <label class="block uppercase text-start tracking-wide text-gray-700 text-xs font-bold mb-2"
                        for="grid-city">
                        Alamat
                    </label>
                    <input
                        class="appearance-none block w-full  text-gray-700 border border-b-gray-400 border-t-0 border-x-0  py-3 px-4 leading-tight focus:outline-none focus:ring-0 focus:bg-white focus:border-gray-500"
                        id="grid-city" type="text" name="alamat" value="{{ $profile->alamat }}">
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-2">
                <div class="w-full  px-3 mb-6 md:mb-0">
                    <label class="block uppercase text-start tracking-wide text-gray-700 text-xs font-bold mb-2"
                        for="grid-city">
                        No Hp
                    </label>
                    <input
                        class="appearance-none block w-full  text-gray-700 border border-b-gray-400 border-t-0 border-x-0  py-3 px-4 leading-tight focus:outline-none focus:ring-0 focus:bg-white focus:border-gray-500"
                        id="grid-city" type="text" name="no_hp" value="{{ $profile->no_hp }}">
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-2">
                <div class="w-full  px-3 mb-6 md:mb-0 mt-4">
                    <label class="block uppercase text-start tracking-wide text-gray-700 text-xs font-bold mb-2"
                        for="grid-city">
                        Foto Profile
                    </label>
                    <input
                        class="appearance-none block w-full  text-gray-700 border border-b-gray-400 border-t-0 border-x-0  py-3 px-4 leading-tight focus:outline-none focus:ring-0 focus:bg-white focus:border-gray-500"
                        id="grid-city" type="file" type="file" name="foto_profil" value="{{ isset($profile->foto_profil) ? $profile->foto_profil : "" }}">
                </div>
            </div>
            <input type="submit" name="submit" id="" value="Kirim"
                class="bg-gray-400 border-2 px-4 py-2 mt-4 md:px-10 rounded-md">
        </form>
    </div>
    <div
        class="w-[90%] bg-white md:w-[70%] h-96 absolute mt-1 z-20 top-[23%] left-1/2 right-1/2 translate-x-[-50%] rounded-md backdrop-blur-sm opacity-40">
    </div>
@endsection

@section('js')
@endsection
