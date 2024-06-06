<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\SessionControllerAdmin;
use App\Http\Controllers\Admin\VoucherController;
use App\Http\Controllers\User\UserChatController;
use App\Http\Controllers\User\UserLoginController;

use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\User\UserProfileController;
use App\Http\Controllers\User\UserVoucherController;
use App\Http\Controllers\Admin\TipeLayananController;
use App\Http\Controllers\User\UserRegisterController;
use App\Http\Controllers\Worker\WorkerHomeController;

use App\Http\Controllers\Worker\WorkerLoginController;
use App\Http\Controllers\Worker\WorkerOrderController;
use App\Http\Controllers\Admin\AdminRegisterController;
use App\Http\Controllers\Admin\UserDashboardController;
use App\Http\Controllers\Worker\WorkerUlasanController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Worker\WorkerUpdateStatusOrder;
use App\Http\Controllers\Admin\WorkerDashboardController;
use App\Http\Controllers\User\Order\FindWorkerController;
use App\Http\Controllers\Worker\WorkerRegisterController;
use App\Http\Controllers\Admin\MetodePembayaranController;
use App\Http\Controllers\Admin\OrderDashboardController;
use App\Http\Controllers\User\Order\PaymentInfoController;
use App\Http\Controllers\Worker\WorkerPendapatanController;
use App\Http\Controllers\Admin\StatusTerimaWorkerController;
use App\Http\Controllers\AppGuide\AppGuideController;
use App\Http\Controllers\User\Order\ChooseVehicleController;
use App\Http\Controllers\User\Order\CancelUserOrderController;
use App\Http\Controllers\User\Order\CreateUserOrderController;
use App\Http\Controllers\User\Order\KonfirmasiOrderController;
use App\Http\Controllers\User\Order\UpdateStatusOrderController;
use App\Http\Controllers\User\Order\UlasanController;
use App\Http\Controllers\User\UserOrderHistoryController;

// Route Session untuk ngecek user pertama kali masuk
Route::get('/', SessionController::class);

// Route Login Customer
Route::prefix('login')->group(function () {
    // Route Login
    Route::get('/', [UserLoginController::class, 'index'])->name('login')->middleware('guest');
    Route::post('/', [UserLoginController::class, 'authenticate']);
});


// Route Register Customer
Route::prefix('register')->group(function () {
    // Route Register
    Route::get('/', [UserRegisterController::class, 'index'])->name('register')->middleware('guest');
    Route::post('/', [UserRegisterController::class, 'store']);
});

// Route Customer
Route::middleware(['auth', 'is_customer'])->group(function () {
    Route::get("/home", HomeController::class)->name('home');
    // Route rofile
    Route::get("/user/profile", [UserProfileController::class, "index"])->name('profile');
    Route::post("/user/profile", [UserProfileController::class, "updateProfile"])->name('udpate-profile');
    // Route Order History
    Route::get("/user/orderHistory", [UserOrderHistoryController::class, "index"])->name('orderHistory');
    // Route Order
    Route::get("/order/{id_order}/cancel", [CancelUserOrderController::class, "cancelOrder"])->name('cancel-order');
    Route::get("/user/order/ulasan", [UlasanController::class, "index"])->name('ulasan');

    Route::get("/order/create-order", [CreateUserOrderController::class, "createOrder"])->name("create-order");
    Route::get("/order/{id_order}/order-choose-vehicle", [ChooseVehicleController::class, "chooseVehicle"])->name('order-choose-vehicle');
    Route::get("/order/{id_order}/update-type/{id_tipe_layanan}", [ChooseVehicleController::class, "updateTypeLayananOrder"])->name("update-type");
    Route::get("/order/{id_order}/konfirmasi_order", [KonfirmasiOrderController::class, "konfirmasiOrder"])->name('konfirmasi-order');
    Route::post("/order/update-location", [UpdateStatusOrderController::class, "updateStatusAndPosition"])->name('update-location');

    Route::get("/order/{id_order}/find-worker", FindWorkerController::class)->name('worker-find');
    


    Route::get("/user/vouchers", [UserVoucherController::class, "index"])->name('voucher');
    Route::get("/user/userChat", [UserChatController::class, "index"])->name('userChat');
    Route::get("/order/{id_order}/payment-info", [PaymentInfoController::class, "index"])->name('payment-info');
});

// Route Admin
Route::prefix('admin')->group(function () {
    Route::get("/", SessionControllerAdmin::class);
    Route::get('/login', [AdminLoginController::class, 'index'])->name('login-admin')->middleware('guest');
    Route::post('/login', [AdminLoginController::class, 'authenticate']);


    // cuman untuk nambahkan saja, nanti dihapus
    Route::get('/register', [AdminRegisterController::class, 'index'])->name('register-admin');
    Route::post('/register', [AdminRegisterController::class, 'store']);

    Route::middleware(['auth', 'is_admin'])->group(function () {
        Route::get('/dashboard', AdminDashboardController::class)->name('admin-dashboard');
        // dashboatd user
        Route::get('/users', [UserDashboardController::class, "index"])->name('admin-users');
        Route::get('/users/{id}/show', [UserDashboardController::class, "show"])->name('admin-users-show');
        // dashboard worker
        Route::get('/workers', [WorkerDashboardController::class, "index"])->name('admin-workers');
        Route::get('/workers/{id}/show', [WorkerDashboardController::class, "show"])->name('admin-workers-show');
        Route::get('/workers/{id}/delete', [WorkerDashboardController::class, "destroy"])->name('admin-workers-delete');
        Route::patch('/workers/{id}/update-status', [WorkerDashboardController::class, "updateStatus"])->name('admin-workers-update-status');
        // dashboard voucher
        Route::resource('/vouchers', VoucherController::class);
        // dashboard status penerimaan
        Route::put('{id}/update-status', [StatusTerimaWorkerController::class, 'updateStatus'])->name('updateStatusPenerimaan');
        // Dashboard metode pembayaran
        Route::resource('/metode-pembayaran', MetodePembayaranController::class);
        // Route Tipe Layanan
        Route::resource('/tipe-layanan', TipeLayananController::class);
        // Route Admin
        Route::get('/orders', [OrderDashboardController::class, 'index'])->name('admin-orders');
        Route::get('/orders/{id_order}', [OrderDashboardController::class, 'show'])->name('admin-orders-show');
    });
});

// Route Worker
Route::prefix('worker')->group(function () {
    // Register
    Route::get('/register', [WorkerRegisterController::class, 'index'])->name('register-worker')->middleware('guest');
    Route::post('/register', [WorkerRegisterController::class, 'store']);

    // Login
    Route::get('/login', [WorkerLoginController::class, 'index'])->name('login-worker')->middleware('guest');
    Route::post('/login', [WorkerLoginController::class, 'authenticate']);

    Route::middleware(['auth', 'is_worker'])->group(function () {
        Route::get("/home", WorkerHomeController::class)->name('worker-home');
        Route::get("/home/pendapatan", WorkerPendapatanController::class)->name('worker-pendapatan');
        Route::get("/home/ulasan", WorkerUlasanController::class)->name('worker-ulasan');
        Route::get("/order/{id_order}", [WorkerOrderController::class, 'ambilOrder'])->name('worker-order');
        Route::get("/order/{id_order}/pembayaran", [WorkerOrderController::class, 'konfirmasiPembayaran'])->name('worker-order-konfirmasi-pembayaran');
        Route::get("/order/{id_order}/selesai", [WorkerOrderController::class, 'finishedOrder'])->name('worker-order-selesai');
        Route::post("/status-terima-order", [WorkerUpdateStatusOrder::class, "updateStatus"])->name('status-terima-order');
    });

    // Route
});

// Route AppGuide
Route::prefix('/help')->group(function () {
    Route::get('/user', [AppGuideController::class, 'showuser'])->name('user-help');
    Route::get('/user/{category}', [AppGuideController::class, 'indexguidepanduan'])->name('panduan');

    Route::prefix('/worker')->group(function () {
        Route::get('/', [AppGuideController::class, 'showworker'])->name('worker-help');
    });
});

// Route Logout
Route::get('/logout', LogoutController::class)->name('logout');
