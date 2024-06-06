@extends('layouts.user-layout')
@section('content')
    <div class="flex w-full  justify-center">
        <div class="form-coment-container border-4 border-primary w-[90%] text-center rounded-md p-3 text-secondary">
            <div class="form-coment">
                <div class="heading mb-4 font-bold">
                    <h2>Form Review</h2>
                </div>
                <div class="form-container ">
                    <form action="#" style="position: sticky; top: 0" class="flex flex-col gap-4 justify-center">
                        <div class="flex text-sm gap-2 justify-center">
                            <div>Worker : Andi Jau</div>
                            <div>kendaraan : mobil</div>
                        </div>
                        <div class="flex flex-col gap-4">
                            <div class="rating">
                                <input type="number" name="rating" hidden />
                                <i class="bx bx-star star" style="--i: 0"></i>
                                <i class="bx bx-star star" style="--i: 1"></i>
                                <i class="bx bx-star star" style="--i: 2"></i>
                                <i class="bx bx-star star" style="--i: 3"></i>
                                <i class="bx bx-star star" style="--i: 4"></i>
                            </div>
                            {{-- <div>total bintang <span id="bintang">0</span> :</div> --}}
                            <textarea name="review" id="" cols="30" rows="5" placeholder="Masukkan ulasan anda"></textarea>
                            <div class="btn-group">
                            </div>
                        </div>
                        <button type="submit" class=" bg-primary rounded-md border-2 border-primary hover:bg-orange-200">
                            Kirim
                        </button>
                        <a href="{{route('home')}}" class="btn cancel border-primary border-2 rounded-md">
                            Cancel
                        </a>
                    </form>
                </div>
                <div class="notification-container" align="center">
                    <div class="notification hidden">
                        Ulasan Anda telah disimpan.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        const form = document.querySelector("form");
        const allStar = document.querySelectorAll(".rating .star");
        const ratingValue = document.querySelector(".rating input");
        const cancelBtn = document.querySelector(".btn.cancel");

        // const countBintang = document.getElementById("bintang");

        allStar.forEach((item, idx) => {
            item.addEventListener("click", function() {
                let click = 0;
                ratingValue.value = idx + 1;
                // countBintang.innerHTML = idx + 1;

                allStar.forEach((i) => {
                    i.classList.replace("bxs-star", "bx-star");
                    i.classList.remove("active");
                });
                for (let i = 0; i < allStar.length; i++) {
                    if (i <= idx) {
                        allStar[i].classList.replace("bx-star", "bxs-star");
                        allStar[i].classList.add("active");
                        allStar[i].classList.add("text-yellow-300");
                    } else {
                        allStar[i].style.setProperty("--i", click);
                        click++;
                    }
                }
            });
        });

        cancelBtn.addEventListener("click", function() {
            // Reset nilai input
            ratingValue.value = "";

            // Reset tampilan bintang
            allStar.forEach((item) => {
                item.classList.remove("active");
                item.classList.remove("text-yellow-300");
                item.classList.replace("bxs-star", "bx-star");
            });
        });
    </script>
@endsection
