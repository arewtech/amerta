<?php

namespace App\Http\Controllers;

use App\Models\Camp;
use App\Models\Checkout;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $camps = Camp::with("benefits")->get();
        return view("pages.index", compact("camps"));
    }
}
