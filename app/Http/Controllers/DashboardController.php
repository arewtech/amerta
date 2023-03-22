<?php

namespace App\Http\Controllers;

use App\Models\Camp;
use App\Models\Checkout;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view("dashboard.index", [
            "camps" => Camp::count(),
            "checkouts" => Checkout::count(),
            "checkout_success" => Checkout::where("is_paid", true)->count(),
            "checkout_pending" => Checkout::where("is_paid", false)->count(),
        ]);
    }
}