<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class UserDashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index()
    {
        $semuaCustomer = DB::table('customer')->paginate(7);
        return view('dashboard.user.index', [
            "title" => "Dashboard User",
            "semuaCustomer" => $semuaCustomer
        ]);
    }
    public function show(string $id_customer, Request $request)
    {
        $customer = Customer::find($id_customer);
        $selectedYear = $request->input('year', Carbon::now()->year);

        $orders = DB::table('order')
            ->select(DB::raw('COUNT(*) as count'), DB::raw('MONTH(created_at) as month'))
            ->where('customer_id', $id_customer)
            ->whereYear('created_at', $selectedYear)
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->get()
            ->pluck('count', 'month')
            ->toArray();

        $months = [];
        for ($i = 1; $i <= 12; $i++) {
            $months[$i] = $orders[$i] ?? 0;
        }
        $years = DB::table('order')
            ->select(DB::raw('DISTINCT YEAR(created_at) as year'))
            ->where('customer_id', $id_customer)
            ->orderBy('year', 'desc')
            ->pluck('year')
            ->toArray();


        return view('dashboard.user.show', [
            "title" => "Detail User",
            "customer" => $customer,
            "years" => $years,
            "orders" => $months,
            "selectedYear" => $selectedYear,
            "orderCount" => $customer->order->count(),
        ]);
    }
}
