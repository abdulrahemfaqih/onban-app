@extends('layouts.user-layout')
@php
    $title = 'Help';
@endphp
@section('content')
    <div class="flex flex-wrap">
        <div class="w-full px-4">
            <div class="max-w-xl mx-auto text-center mb-16 mt-7">
                <h2 class="font-bold text-dark text-3xl mb-4 text-primary">Anda memerlukan bantuan?</h2>
                <p class="font-medium text-md text-secondary">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus
                    doloribus molestias, ipsum omnis ad vitae!
                </p>
            </div>
        </div>
    </div>
    <div class="w-full px-4">
        <a href="{{ route('home') }}" class="font-semibold text-xs text-slate-400">
            < Kembali</a>
                <div class="flex flex-wrap lg:justify-center mt-3">
                    {{-- Sidebar kiri --}}
                    <div class="w-full max-w-[250px] mb-6 lg:mb-8 justify-start">
                        <h3 class="font-semibold text-cyan-500 text-sm hover:text-cyan-700 mb-1 lg:mb-2"><a
                                href="{{ route('user-help') }}">Pengguna</a>
                        </h3>
                        <h3 class="font-semibold text-cyan-500 text-sm hover:text-cyan-700"><a
                                href="{{ route('worker-help') }}">Pekerja</a></h3>
                    </div>
                    <hr class="text-dark">
                    {{-- Menu Kanan --}}
                    <div class="w-full max-w-full lg:max-w-[320px]">
                        <h3 class="font-semibold text-cyan-500 md:text-lg hover:text-cyan-700 mb-2 lg:mb-2 cursor-pointer"
                            id="panduan-pembuatan-akun-worker">Panduan
                            Pembuatan Akun
                            Pekerja
                        </h3>
                        <h3 class="font-semibold text-cyan-500 md:text-lg hover:text-cyan-700 mb-2 lg:mb-2"
                            id="panduan-menerima-orderan">Panduan
                            menerima orderan
                        </h3>
                        <h3 class="font-semibold text-cyan-500 md:text-lg hover:text-cyan-700 mb-2 lg:mb-2"
                            id="cara-melihat-riwayat-pendapatan">Bagaimana
                            cara melihat
                            riwayat
                            pendapatan saya
                        </h3>
                    </div>
                    {{-- Baris paling kanan --}}
                    {{-- <div class="w-full max-w-full lg:max-w-[320px] lg:ml-16">
                
            </div> --}}
                </div>
    </div>
@endsection
@section('js')
    <script>
        // Panduan Pembuatan Akun Pekerja
        document.getElementById('panduan-pembuatan-akun-worker').addEventListener('click', function(event) {
            event.preventDefault();
            Swal.fire({
                title: 'Panduan Pembuatan Akun Pekerja',
                html: `<div class="flex flex-col text-left space-y-2"> 
                <p>1. Masuk ke aplikasi.</p>
                <p>2. Klik Login pekerja.</p>
                <p>3. Klik Register.</p>
                <p>4. Isi keseluruhan form sesuai dengan keterangan dan cantumkan foto KTP.</p>
                <p>5. Jika data sudah benar maka klik "Sign in", Maka Anda berhasil mendaftar.</p>
                <p>6. Kemudian verifikasi email anda.</p>
                <p>7. Lalu Anda akan dialihkan ke menu login, Masukan email dan password sesuai data yang sudah didaftarkan sebelumnya.</p>
           </div>`,
            });
        });

        document.getElementById('panduan-menerima-orderan').addEventListener('click', function(event) {
            event.preventDefault();
            Swal.fire({
                title: 'Panduan Pembuatan Akun Pekerja',
                html: `<div class="flex flex-col text-left space-y-2"> 
                <p>1. Aktifkan GPS anda.</p>
                <p>2. Aktifkan "terima orderan" pada halaman home pekerja.</p>
                <p>3. Lalu tunggu sistem untuk memunculkan sebuah pesan orderan dan anda dapat menerima orderan tersebut.</p>
           </div>`,
            });
        });

        document.getElementById('cara-melihat-riwayat-pendapatan').addEventListener('click', function(event) {
            event.preventDefault();
            Swal.fire({
                title: 'Bagaimana cara melihat riwayat pendapatan saya',
                html: `<div class="flex flex-col text-left space-y-2"> 
                <p>Ikuti langkah-langkah mudah berikut untuk melihat riwayat pendapatan ONBAN Anda:</p>
                <p>1. Tekan ikon ‘Pendapatan’ di bagian bawah halaman depan aplikasi ONBAN Anda.</p>
                <p>2. Tekan detail pendapatan untuk melihat grafik detail pendapatan Anda.</p>
                <p>3. Tekan salah satu transaksi untuk detail lebih lanjut.</p>
           </div>`,
            });
        });
    </script>
@endsection
