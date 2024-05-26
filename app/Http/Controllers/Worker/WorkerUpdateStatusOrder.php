<?php

namespace App\Http\Controllers\Worker;

use App\Http\Controllers\Controller;
use App\Models\Worker;
use Illuminate\Http\Request;

class WorkerUpdateStatusOrder extends Controller
{
    public function updateStatus(Request $request)
    {
        $worker = Worker::findOrFail(session('userData')->worker->id_worker);
        $worker->status_menerima_order = $request->status;
        $worker->latitude = $request->latitude;
        $worker->longitude = $request->longitude;
        $worker->save();
        return response()->json(['message' => 'Status updated successfully'], 200);
        return redirect()->route('worker-pendapatan')->with('success', 'Status berhasil diperbarui.');
    }
}
