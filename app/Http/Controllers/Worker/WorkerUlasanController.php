<?php

namespace App\Http\Controllers\Worker;

use App\Http\Controllers\Controller;
use App\Models\Ulasan;
use Illuminate\Http\Request;

class WorkerUlasanController extends Controller
{
    public function __invoke()
    {
        $id_worker = session('userData')->worker->id_worker;
        $ulasan_all = Ulasan::with(['customer'])->where('worker_id', $id_worker)->get();

        // Calculate the average rating
        $average_rating = $ulasan_all->avg('rating');

        return view('worker.ulasan', [
            "title" => "Ulasan",
            "ulasan" => $ulasan_all,
            "average_rating" => $average_rating,
            "role" => session('userData')->role,
            "worker" => session('userData')->worker
        ]);
    }
}
