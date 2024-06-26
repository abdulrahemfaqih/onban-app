<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class LandingPageController extends Controller
{
    public function index()
    {
        return view('login.landingPage', [
            "title" => "Landing-page"
        ]);
    }
}
