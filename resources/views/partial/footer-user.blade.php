<footer>
    <div class="flex justify-center flex-col gap-10 lg:gap-14 md:gap-40 h-full">
        <div class="w-full md:w-3/4 mt-4 bg-[#FF802A] h-16 flex justify-center mx-auto my-auto content-center rounded-lg drop-shadow-lg lg:w-2/5 sticky bottom-10"
            id='footbar'>
            <div class="flex w-full h-2/3 justify-center mx-auto content-center lg:gap-32 gap-14 my-auto">
                <div class="w-14 text-white h-full text-center flex flex-col justify-center">
                    <a href="{{ route('Voucher') }}">
                        <img class="w-[28px] h-[28px]" src="{{ asset('assets/images/voucher.svg') }}" alt="voucher">
                        <p class="text-sm">Voucher</p>
                    </a>
                </div>

                <div class="w-14 text-white h-full text-center flex flex-col justify-center">
                    <a href="{{ route('user-ulasan') }}">
                        <i class="fi fi-rr-comment-alt text-lg"></i>
                        <p class="text-sm">Ulasan</p>
                    </a>
                </div>

                <div class="w-auto text-white h-3/4 my-auto text-center flex flex-col justify-center">
                    <img src="{{ asset('assets/images/alvan-nee-ZCHj_2lJP00-unsplash.jpg') }}" alt=""
                        class="w-full h-full rounded-full">
                    <p class="text-sm">Akun</p>
                </div>

                <div class="w-14 text-white h-full text-center flex flex-col justify-center">
                    <a href="{{ route('logout') }}"
                        class="w-14 text-white h-full text-center flex flex-col justify-center">
                        <img class="w-3/4 h-3/4" src="{{ asset('assets/images/logout.svg') }}" alt="logout">
                        <p class="text-sm">Logout</p>
                    </a>
                </div>
            </div>
        </div>
    </div>

</footer>
