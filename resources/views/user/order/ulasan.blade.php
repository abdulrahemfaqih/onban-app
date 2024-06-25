@extends('layouts.user-layout')

@section('content')
    <div class="flex w-full justify-center">
        <div
            class="form-coment-container border-4 border-primary w-[90%] text-center rounded-md p-3 text-secondary md:w-2/3 lg:w-1/2">
            <div class="form-coment">
                <div class="heading mb-4 font-bold text-lg">
                    <h2>Form Review</h2>
                </div>
                <div class="form-container">
                    <form action="{{ route('ulasan-store', $order->id_order) }}" method="post"
                        class="flex flex-col gap-4 justify-center">
                        @csrf
                        <div class="flex flex-col text-sm gap-2 justify-center">
                            <div>Worker: {{ $order->worker->nama }}</div>
                            <div>Kendaraan: {{ $order->tipe_layanan->nama_tipe_layanan }}</div>
                        </div>
                        <div class="flex flex-col gap-4">
                            <div class="rating ">
                                <input type="hidden" name="rating" id="inputRating" />
                                <i class="bx bx-star star text-2xl " style="--i: 0"></i>
                                <i class="bx bx-star star text-2xl " style="--i: 1"></i>
                                <i class="bx bx-star star text-2xl " style="--i: 2"></i>
                                <i class="bx bx-star star text-2xl " style="--i: 3"></i>
                                <i class="bx bx-star star text-2xl " style="--i: 4"></i>
                            </div>
                            @error('rating')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                            <textarea name="ulasan" cols="30" rows="5" placeholder="Masukkan ulasan anda"></textarea>
                            @error('ulasan')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex flex-col gap-2 ">
                            <button type="submit"
                                class="bg-primary rounded-md border-2 border-primary hover:bg-orange-200">Kirim</button>
                            <a href="{{ route('orderHistory') }}"
                                class="btn cancel border-primary border-2 rounded-md ">Cancel</a>
                        </div>
                    </form>
                </div>
                <div class="notification-container">
                    <div class="notification hidden">Ulasan Anda telah disimpan.</div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        const allStar = document.querySelectorAll(".rating .star");
        const ratingValue = document.querySelector("#inputRating");

        allStar.forEach((item, idx) => {
            item.addEventListener("click", function() {
                ratingValue.value = idx + 1;

                allStar.forEach((i) => {
                    i.classList.replace("bxs-star", "bx-star");
                    i.classList.remove("active", "text-yellow-300");
                });

                for (let i = 0; i <= idx; i++) {
                    allStar[i].classList.replace("bx-star", "bxs-star");
                    allStar[i].classList.add("active", "text-yellow-300");
                }
            });
        });

        document.querySelector(".btn.cancel").addEventListener("click", function() {
            ratingValue.value = "";

            allStar.forEach((item) => {
                item.classList.remove("active", "text-yellow-300");
                item.classList.replace("bxs-star", "bx-star");
            });
        });
    </script>
@endsection
