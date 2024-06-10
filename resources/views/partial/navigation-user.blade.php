 <div class="mt-auto w-[95%] md:w-2/4 bg-[#FF802A] h-16  bottom-2 justify-center mx-auto my-auto content-center rounded-lg drop-shadow-lg lg:w-2/5 fixed translate-x-[-50%] left-1/2 right-1/2 mb-4 md:mb-8"
     id='footbar'>
     <div class="flex w-full h-2/3 justify-center mx-auto content-center gap-8 my-auto ml-4 lg:ml-6 ">
         <div class="w-[20%] text-white h-full text-center flex flex-col justify-center">
             <a href="{{ route('voucher') }}">
                 <img class="w-2/4 lg:w-1/3 mx-auto h-2/3" src="{{ asset('assets/images/voucher.svg') }}" alt="voucher">
                 <p class="text-sm">Voucher</p>
             </a>
         </div>
         <div class="w-16 text-white h-full my-auto text-center flex flex-col justify-center ">
             <a href="{{ route('profile') }}" class="flex flex-col w-full justify-center">
                <div class="overflow-hidden mx-auto rounded-full w-10 h-10">
                    <img src="{{ isset($customer->foto_profil) ? asset('storage/'. $customer->foto_profil) : asset('assets/images/alvan-nee-ZCHj_2lJP00-unsplash.jpg') }}" alt=""
                        class="object-cover mx-auto w-full h-full">
                </div>
              
                 <div>
                     <p class="text-sm">Akun</p>
                 </div>
             </a>
         </div>
         <div class="w-[20%] text-white h-full my-auto text-center flex flex-col justify-center mx-auto content-center">
             <a href="{{ route('orderHistory') }}" class="flex flex-col mx-auto justify-center ">
                 <div class="flex justify-center">
                     <img src="{{ asset('assets/images/histri-icon.svg') }}" alt="histori" class="w-8 ">
                 </div>
                 <div>
                     <p class="text-sm">Histori</p>
                 </div>
             </a>
         </div>
         <div class="w-[28%] text-white h-full text-center flex flex-col justify-center">
             <a href="{{ route('logout') }}" id="logout"
                 class="w-14 text-white h-full flex flex-col justify-center">
                 <img class="w-12 h-3/4" src="{{ asset('assets/images/logout.svg') }}" id="imgLogout"
                     alt="logout">
                 <p class="text-sm text-center">Logout</p>
             </a>
         </div>
     </div>
 </div>
