<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StatusPenerimaanWorker;
use Illuminate\Http\Request;


class StatusTerimaWorkerController extends Controller
{
    public function updateStatus(Request $request, $id)
    {
        $status_penerimaan = StatusPenerimaanWorker::findOrFail($id);
        $status_penerimaan->status_penerimaan = $request->status_penerimaan;
        $status_penerimaan->keterangan = $request->keterangan;
        $status_penerimaan->save();

        return redirect()->back()->with('success', 'Status penerimaan berhasil diperbarui.');
    }
}
