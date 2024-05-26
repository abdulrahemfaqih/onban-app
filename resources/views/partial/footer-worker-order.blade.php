<footer class="sticky bottom-0">
    <div class="max-w-screen mx-7 m-5 text-center bg-secondary rounded-lg shadow">
        <div class="flex justify-between items-center text-white text-sm h-[4rem] px-4 space-x-3">
            <a href="" class="text-sm font-bold text-secondary bg-white hover:bg-gray-400 p-3 rounded-lg w-[50%]">
                <p>Chat Customer</p>
            </a>
            <a href="{{ route('worker-order-selesai', ['id_order' => $order->id_order]) }}" class="border border-white text-base font-bold hover:bg-gray-900 p-3 rounded-lg w-[50%]">
                <p>Selesai</p>
            </a>
        </div>
    </div>
</footer>
