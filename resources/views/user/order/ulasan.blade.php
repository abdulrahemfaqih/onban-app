@extends('layouts.user-layout')
@section('content')
    <div class="form-coment-container">
        <div class="form-coment">
            <div class="heading">
                <h2>Form Review</h2>
            </div>
            <div class="form-container">
                <form action="#" style="position: sticky; top: 0">
                    <div class="rating">
                        <input type="number" name="rating" hidden />
                        <i class="bx bx-star star" style="--i: 0"></i>
                        <i class="bx bx-star star" style="--i: 1"></i>
                        <i class="bx bx-star star" style="--i: 2"></i>
                        <i class="bx bx-star star" style="--i: 3"></i>
                        <i class="bx bx-star star" style="--i: 4"></i>
                    </div>
                    <div>total bintang <span id="bintang">0</span> :</div>
                    <textarea name="review" id="" cols="30" rows="5" placeholder="Masukkan ulasan anda"></textarea>
                    <div class="btn-group">
                        <button type="submit" class="btn submit">
                            Kirim
                        </button>
                        <button type="reset" class="btn cancel">
                            Cancel
                        </button>
                    </div>
                </form>
            </div>
            <div class="notification-container" align="center">
                <div class="notification hidden">
                    Ulasan Anda telah disimpan.
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

        const countBintang = document.getElementById("bintang");

        allStar.forEach((item, idx) => {
            item.addEventListener("click", function() {
                let click = 0;
                ratingValue.value = idx + 1;
                countBintang.innerHTML = idx + 1;

                allStar.forEach((i) => {
                    i.classList.replace("bxs-star", "bx-star");
                    i.classList.remove("active");
                });
                for (let i = 0; i < allStar.length; i++) {
                    if (i <= idx) {
                        allStar[i].classList.replace("bx-star", "bxs-star");
                        allStar[i].classList.add("active");
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
                item.classList.replace("bxs-star", "bx-star");
            });
        });
    </script>
@endsection
