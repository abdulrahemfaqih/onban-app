@extends('layouts.user-layout')
@section('content')
    <a href="{{ route('home') }}">
        < </a>

            <div class="p-4 bg-white-300 rounded-lg shadow-lg">
                <h1 class="font-semibold text-center mb-3">Ulasan anda</h1>
                <div class="h-[41rem] overflow-y-auto">
                    <div class="max-w-full p-5 bg-orange-100 rounded-lg mb-3">
                        <div class="flex flex-wrap">
                            <img class="w-[27px] h-[27px] rounded-full mr-3"
                                src="{{ asset('assets/images/alvan-nee-ZCHj_2lJP00-unsplash.jpg') }}" alt="">
                            <div class="items-center mb-2">
                                <h4 class="text-sm -mb-0.5">Suyitno</h4>
                                <h5 class="text-[8px]">4.8</h5>
                            </div>
                            <p>Mantap, pengerjaan cepat, datang ke lokasi juga cepat 👋😊 </p>
                        </div>
                    </div>
                    <div class="max-w-full p-5 bg-orange-100 rounded-lg mb-3">
                        <div class="flex flex-wrap">
                            <img class="w-[27px] h-[27px] rounded-full mr-3"
                                src="{{ asset('assets/images/alvan-nee-ZCHj_2lJP00-unsplash.jpg') }}" alt="">
                            <div class="items-center mb-2">
                                <h4 class="text-sm -mb-0.5">Arif</h4>
                                <h5 class="text-[8px]">4.3</h5>
                            </div>
                            <p>Mantap tambal ban terbaik 👌</p>
                        </div>
                    </div>
                    <div class="max-w-full p-5 bg-orange-100 rounded-lg mb-3">
                        <div class="flex flex-wrap">
                            <img class="w-[27px] h-[27px] rounded-full mr-3"
                                src="{{ asset('assets/images/alvan-nee-ZCHj_2lJP00-unsplash.jpg') }}" alt="">
                            <div class="items-center mb-2">
                                <h4 class="text-sm -mb-0.5">Bagas</h4>
                                <h5 class="text-[8px]">4.5</h5>
                            </div>
                            <p>Aplikasi yang mempermudah disaat keadaan sulit, good job</p>
                        </div>
                    </div>
                    <div class="max-w-full p-5 bg-orange-100 rounded-lg mb-3">
                        <div class="flex flex-wrap">
                            <img class="w-[27px] h-[27px] rounded-full mr-3"
                                src="{{ asset('assets/images/alvan-nee-ZCHj_2lJP00-unsplash.jpg') }}" alt="">
                            <div class="items-center mb-2">
                                <h4 class="text-sm -mb-0.5">Fikri RU</h4>
                                <h5 class="text-[8px]">4.4</h5>
                            </div>
                            <p>мне очень помог, когда я попал в беду посреди дороги</p>
                        </div>
                    </div>
                    <div class="max-w-full p-5 bg-orange-100 rounded-lg mb-3">
                        <div class="flex flex-wrap">
                            <img class="w-[27px] h-[27px] rounded-full mr-3"
                                src="{{ asset('assets/images/alvan-nee-ZCHj_2lJP00-unsplash.jpg') }}" alt="">
                            <div class="items-center mb-2">
                                <h4 class="text-sm -mb-0.5">Ahmad RU</h4>
                                <h5 class="text-[8px]">4.4</h5>
                            </div>
                            <p>мне очень помог, когда я попал в беду посреди дороги</p>
                        </div>
                    </div>
                    <div class="max-w-full p-5 bg-orange-100 rounded-lg mb-3">
                        <div class="flex flex-wrap">
                            <img class="w-[27px] h-[27px] rounded-full mr-3"
                                src="{{ asset('assets/images/alvan-nee-ZCHj_2lJP00-unsplash.jpg') }}" alt="">
                            <div class="items-center mb-2">
                                <h4 class="text-sm -mb-0.5">Andrey RU</h4>
                                <h5 class="text-[8px]">4.4</h5>
                            </div>
                            <p>мне очень помог, когда я попал в беду посреди дороги</p>
                        </div>
                    </div>
                    <div class="max-w-full p-5 bg-orange-100 rounded-lg mb-3">
                        <div class="flex flex-wrap">
                            <img class="w-[27px] h-[27px] rounded-full mr-3"
                                src="{{ asset('assets/images/alvan-nee-ZCHj_2lJP00-unsplash.jpg') }}" alt="">
                            <div class="items-center mb-2">
                                <h4 class="text-sm -mb-0.5">Makurcov RU</h4>
                                <h5 class="text-[8px]">4.4</h5>
                            </div>
                            <p>мне очень помог, когда я попал в беду посреди дороги</p>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
