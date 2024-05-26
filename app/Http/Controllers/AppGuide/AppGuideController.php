<?php

namespace App\Http\Controllers\AppGuide;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AppGuideController extends Controller
{
    public function showuser()
    {
        return view('appguide.user.index');
    }

    public function showworker()
    {
        return view('appguide.worker.index');
    }
}
