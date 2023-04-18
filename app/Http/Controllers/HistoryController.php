<?php

namespace App\Http\Controllers;

use App\Models\Camp;
use App\Models\Checkout;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index()
    {
        $camps = Checkout::with("camp")
            ->where("user_id", auth()->id())
            ->whereStatus("finished")
            ->latest()
            ->get();
        return view("pages.histories.index", compact("camps"));
    }

    public function show(Camp $camp)
    {
        // bisa pake cara bawah klw di route nya pake $lug bukan pake camp:slug
        // $camp = Camp::where("slug", $slug)->first();
        $user = Checkout::with("camp", "user")
            ->where("user_id", auth()->user()->id)
            ->where("camp_id", $camp->id)
            ->whereStatus("finished")
            ->first();
        // return $user;
        return view("pages.histories.show", compact("user"));
    }
}
