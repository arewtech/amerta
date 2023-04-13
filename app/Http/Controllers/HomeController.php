<?php

namespace App\Http\Controllers;

use App\Models\Camp;
use App\Models\Checkout;
use App\Models\Discount;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $discount = Discount::latest()->first();
        $camps = Camp::with("benefits")->get();
        // return $camps;
        return view("pages.index", compact("camps", "discount"));
    }
}
