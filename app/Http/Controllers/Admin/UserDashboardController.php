<?php

namespace App\Http\Controllers\Admin;

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

    public function show(string $id_customer)
    {
        $customer = Customer::find($id_customer);
        return view('dashboard.user.show', [
            "title" => "Detail User",
            "customer" => $customer
        ]);
    }
}
