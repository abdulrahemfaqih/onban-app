<footer class="sticky bottom-0">
    <div class="max-w-screen mx-7 m-5 text-center bg-primary rounded-lg shadow">
        <div class="flex justify-between items-center text-white text-sm">
            <a href="{{ route('worker-home') }}" class="hover:bg-primary-dark p-3 pl-5 rounded-lg {{ request()->routeIs('worker-home') ? 'font-bold text-orange-900' : '' }}">
                <i class="fi fi-rr-user"></i>
                <p>Akun</p>
            </a>
            <a href="{{ route('worker-pendapatan') }}" class="hover:bg-primary-dark p-3 rounded-lg {{ request()->routeIs('worker-pendapatan') ? 'font-bold text-orange-900' : '' }}">
                <i class="fi fi-rr-chart-histogram"></i>
                <p>Pendapatan</p>
            </a>
            <a href="{{ route('worker-ulasan') }}" class="hover:bg-primary-dark p-3 rounded-lg {{ request()->routeIs('worker-ulasan') ? 'font-bold text-orange-900' : '' }}">
                <i class="fi fi-rr-comment-alt text-lg"></i>
                <p>Ulasan</p>
            </a>
            <a href="{{ route('logout') }}" class="hover:bg-primary-dark p-3 pr-5 rounded-lg ">
                <i class="fi fi-rr-exit"></i>
                <p>Logout</p>
            </a>
        </div>
    </div>
</footer>
