<?php

namespace App\Http\Controllers;

use App\Charts\EarningsChart;
use App\Models\Camp;
use App\Models\Checkout;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(EarningsChart $earningsChart)
    {
        $data["earningsChart"] = $earningsChart->build();
        // dd($data["earningsChart"]);
        $checkout = Checkout::query();
        return view(
            "dashboard.index",
            [
                "camps" => Camp::count(),
                "checkouts" => $checkout->count(),
                "checkout_success" => $checkout
                    ->where("is_paid", true)
                    ->count(),
                "checkout_pending" => $checkout
                    ->where("is_paid", false)
                    ->count(),
            ],
            $data
        );
    }
}
