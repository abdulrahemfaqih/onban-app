<aside class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl">
    <div class="p-6">
        <img class="h-20" src="{{ asset('assets/images/onban-white.png') }}" alt="">
        {{-- <button class="w-full bg-white cta-btn font-semibold py-2 mt-5 rounded-br-lg rounded-bl-lg rounded-tr-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
            <i class="fas fa-plus mr-3"></i> New Report
        </button> --}}
    </div>
    <nav class="text-white text-base font-semibold pt-3">
        <a href="{{ route('admin-dashboard') }}" class="flex items-center {{ Request::is('admin/dashboard') ? 'active-nav-link' : '' }}  text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
            <i class="fas fa-tachometer-alt mr-3"></i>
            Dashboard
        </a>
        <a href="{{ route('admin-users') }}" class="flex items-center  {{ Request::is('admin/users') ? 'active-nav-link' : ''  }} text-white py-4 pl-6 nav-item">
            <i class="fas fa-sticky-note mr-3"></i>
            Customer
        </a>
        <a href="{{ route('admin-workers') }}" class="flex items-center {{ Request::is('admin/workers*') ? 'active-nav-link' : '' }} text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
            <i class="fas fa-table mr-3"></i>
            Worker
        </a>
        <a href="{{ route('vouchers.index') }}" class="flex items-center {{ Request::is('admin/vouchers*') ? 'active-nav-link' : '' }} text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
            <i class="fas fa-align-left mr-3"></i>
            Voucher
        </a>
        {{-- <a href="{{ route('metode-pembayaran.index') }}" class="flex items-center {{ Request::is('admin/metode_pembayaran*') ? 'active-nav-link' : '' }} text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
            <i class="fas fa-align-left mr-3"></i>
            Metode Pembayaran
        </a> --}}
        <a href="{{ route('tipe-layanan.index') }}" class="flex items-center {{ Request::is('admin/tipe-layanan*') ? 'active-nav-link' : '' }} text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
            <i class="fas fa-align-left mr-3"></i>
            Tipe Layanan
        </a>
    </nav>
</aside>
