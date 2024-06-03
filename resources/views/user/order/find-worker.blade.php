@extends('layouts.user-layout')
@section('content')
    <div class="w-full h-full py-20 flex flex-col flex-wrap ">

        <div class="w-[90%] absolute top-24 left-1/2  translate-x-[-50%] rounded-lg lg:w-2/3 md:w-3/4 ">
            <iframe class="border border-primary my-4 pt-3" width="100%" height="400"
        src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d7917.826116690897!2d{{ $order->longitude }}!3d{{ $order->latitude }}!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sid!2sid!4v1716094381407!5m2!1sid!2sid"
        allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

        <div class="w-full mx-auto h-56 bg-primary mt-56 rounded-md flex flex-col flex-wrap lg:w-2/3 md:w-3/4">
            <div class="w-full h-3/4  flex lg:px-32">
                <div class="w-20 rounded-full h-20">
                    <img class="w-3/4 h-3/4 mx-auto mt-2  border-gray-300 border-2 rounded-full"
                        src="{{ asset('assets/images/Pas Foto 3x4.jpg') }}" alt="">
                </div>
                <div class="text-white flex-wrap ">
                    <p class="font-bold pl-2 pt-2 ">Profile Worker</p>
                    <p class=" pl-2 pt-2 "> Nama: Leonardo Jontor bin Widodo</p>
                    <p class=" pl-2 pt-2 "> Usia : 20 th</p>
                    <p class=" pl-2 pt-2 "> Rating : 4.5/5</p>
                </div>
            </div>

            <div class="w-full flex justify-between py-2.5 lg:px-32 px-2 h-1/4 ">
                <div class="flex justify-center content-center h-1/2">
                    <a href="{{ route('home') }}" id="cancel-link"
                        class=" my-auto hover:text-gray-200 hover:border-gray-200 border-white border-2 mx-auto text-white p-1 rounded-md">Batalkan</a>
                </div>
                <div class="flex justify-center content-center h-1/2">
                    <a href="{{ route('userChat') }}"
                        class="my-auto hover:text-gray-200 hover:border-gray-200 border-white border-2 mx-auto text-white p-1 rounded-md">Chat
                        Worker</a>
                </div>
                <div class="flex justify-center content-center h-1/2">
                    <a href="{{ route('payment-info') }}"
                        class="my-auto hover:text-orange-400 hover:bg-gray-200 bg-white hover:border-orange-400 border-primary border-2 mx-auto text-primary p-1 rounded-md">Pembayaran</a>
                </div>
            </div>

        </div>
    </div>
@endsection
@section('js')
    <script>
        document.getElementById('cancel-link').addEventListener('click', function(event) {
            event.preventDefault();

            Swal.fire({
                title: 'Apakah anda yakin ingin membatalkan?',
                text: 'Mohon chat dahulu worker anda sebelum membatalkan.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'ya,Batalkan!',
                cancelButtonText: 'tidak,saya tetap lanjutkan'
            }).then((result) => {
                if (result.isConfirmed) {

                    window.location.href = event.target.href;
                }
            });
        });
    </script>
@endsection
