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
        <a href="{{ route('home') }}" class="font-semibold text-xs text-slate-400 mb-3">
            < Kembali</a>
                <div class="flex flex-wrap lg:justify-center mt-3`">
                    {{-- Sidebar kiri --}}
                    <div class="w-full justify-start max-w-[250px] mb-6 lg:mb-8">
                        <h3 class="font-semibold text-cyan-500 text-sm hover:text-cyan-700 mb-1 lg:mb-2"><a
                                href="{{ route('user-help') }}">Pengguna</a>
                        </h3>
                        <h3 class="font-semibold text-cyan-500 text-sm hover:text-cyan-700"><a
                                href="{{ route('worker-help') }}">Pekerja</a></h3>
                    </div>
                    {{-- Menu Kanan --}}
                    <div class="w-full max-w-full lg:max-w-[350px]">
                        <h3 class="font-semibold text-cyan-500 md:text-lg hover:text-cyan-700  mb-2 lg:mb-2 cursor-pointer"
                            id="panduan-pembuatan-akun">
                            Panduan
                            pembuatan akun</h3>
                        <h3 class="font-semibold text-cyan-500 md:text-lg hover:text-cyan-700  mb-2 lg:mb-2 cursor-pointer"
                            id="user-panduan-pemesanan">
                            Panduan
                            Pemesanan</h3>
                        <h3 class="font-semibold text-cyan-500 md:text-lg hover:text-cyan-700  mb-2 lg:mb-2 cursor-pointer"
                            id="cara-batal-pesanan">
                            Bagaimana cara
                            membatalkan pesanan</h3>
                        <h3 class="font-semibold text-cyan-500 md:text-lg hover:text-cyan-700  mb-2 lg:mb-2 cursor-pointer"
                            id="cara-mengubah-informasi">
                            Bagaimana
                            cara mengubah informasi akun saya?</h3>
                        <h3 class="font-semibold text-cyan-500 md:text-lg hover:text-cyan-700 mb-2 lg:mb-2 cursor-pointer"
                            id="menemukan-voucher">
                            Dimana saya bisa
                            menemukan
                            voucher?</h3>
                        <h3 class="font-semibold text-cyan-500 md:text-lg hover:text-cyan-700 mb-2 lg:mb-2 cursor-pointer"
                            id="cara-membayar">
                            Bagaimana cara melakukan pembayaran?
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
        // Panduan pembuatan akun
        document.getElementById('panduan-pembuatan-akun').addEventListener('click', function(event) {
            event.preventDefault();
            Swal.fire({
                title: 'Panduan Pembuatan Akun',
                html: `<div class="flex flex-col text-left space-y-2"> 
                <p>1. Masuk ke aplikasi.</p>
                <p>2. Klik Register.</p>
                <p>3. Isi keseluruhan form sesuai dengan keterangan.</p>
                <p>4. Jika data sudah benar maka klik "Sign in", Maka Anda berhasil mendaftar.</p>
                <p>5. Lalu Anda akan dialihkan ke menu login, Masukkan email dan password sesuai data yang sudah didaftarkan sebelumnya.</p>
           </div>`,
            });
        });

        // Panduan pemesanan
        document.getElementById('user-panduan-pemesanan').addEventListener('click', function(event) {
            event.preventDefault();
            Swal.fire({
                title: 'Panduan Pemesanan',
                html: `<div class="flex flex-col text-left space-y-2"> 
                <p>1. Pastikan Anda sudah login menggunakan akun yang sudah dibuat, dan berada di home.</p>
                <p>2. Pastikan Anda sudah mengaktifkan fitur GPS.</p>
                <p>3. Klik "Pesan Sekarang".</p>
                <p>4. Pilih kendaraan Anda.</p>
                <p>5. Lalu Konfirmasi Pesanan Anda, terdapat informasi order (kendaraan, harga, tarif per km).</p>
                <p>6. Anda berhasil melakukan pemesanan.</p>
           </div>`,
            });
        });

        // Bagaimana cara membatalkan pesanan?
        document.getElementById('cara-batal-pesanan').addEventListener('click', function(event) {
            event.preventDefault();
            Swal.fire({
                title: 'Bagaimana cara membatalkan pesanan?',
                html: `<div class="flex flex-col text-left space-y-2"> 
                <p>Sebelum Anda membatalkan pesanan, Sebaiknya konfirmasi terlebih dahulu ke mitra pekerja kami, Setelah melakukan konfirmasi Anda bisa membatalkan pesanan. Cukup tekan tombol Batalkan dari halaman pemesanan, lalu <span class='font-bold'>"Ya, Batalkan."</span></p>
           </div>`,
            });
        });

        // Bagaimna  cara mengubah informasi akun saya
        document.getElementById('cara-mengubah-informasi').addEventListener('click', function(event) {
            event.preventDefault();
            Swal.fire({
                title: 'Bagaimna cara mengubah informasi?',
                html: `<div class="flex flex-col text-left space-y-2"> 
                <p>Anda dapat pergi ke menu profile, kemudian Anda klik edit, dan ubah informasi yang Anda perlukan.</p>
           </div>`,
            });
        });

        // Dimana saya bisa menemukan voicher?
        document.getElementById('menemukan-voucher').addEventListener('click', function(event) {
            event.preventDefault();
            Swal.fire({
                title: 'Dimana saya bisa menemukan voucher?',
                html: `<div class="flex flex-col text-left space-y-2"> 
                <p>Anda dapat menemukan voucher yang Anda miliki didalam halaman utama ONBAN > Promo.</p>
           </div>`,
            });
        });

        // Cara membayar
        document.getElementById('cara-membayar').addEventListener('click', function(event) {
            event.preventDefault();
            Swal.fire({
                title: 'Bagaimana cara melakukan pembayaran',
                html: `<div class="flex flex-col text-left space-y-2"> 
                <p>Anda harus mengecek terlebih dahulu tagihan anda berapa nominalnya, dengan mengecek di halaman maps > pilih detail pesanan. </p><p>Lalu Bagaimana ?... Anda langsung saja membayarkan sejumlah dengan nominal yang tertera di aplikasi kepada mitra pekerja kami.</p>
           </div>`,
            });
        });
    </script>
@endsection
