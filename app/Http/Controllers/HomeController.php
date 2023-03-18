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
        // return $camps;
        // $camps->map(function ($camp) {
        //     $camp->benefits = $camp->benefits->map(function ($benefit) {
        //         return $benefit->benefit;
        //     });
        //     return $camp;
        // });
        // dd($camps->slug);

        return view("pages.index", compact("camps"));
    }
}
