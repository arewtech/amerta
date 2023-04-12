<?php

namespace App\Http\Controllers;

use App\Models\Camp;
use App\Models\Checkout;
use COM;
use Illuminate\Http\Request;

class PreviewController extends Controller
{
    public function index(Request $request)
    {
        if ($request->q) {
            $user = Checkout::with("camp")
                ->whereHas("camp", function ($query) use ($request) {
                    $query->where("title", "LIKE", "%$request->q%");
                })
                ->orderBy("created_at", "DESC")
                ->get();
            // return $camp;
        } else {
            $user = Checkout::with("camp", "user", "discount")
                ->where("user_id", auth()->user()->id)
                ->orderBy("created_at", "DESC")
                ->get();
        }
        // return $user;
        return view("pages.user.index", compact("user"));
    }

    public function show(Camp $camp)
    {
        // bisa pake cara bawah klw di route nya pake $lug bukan pake camp:slug
        // $camp = Camp::where("slug", $slug)->first();
        $user = Checkout::with("camp", "user")
            ->where("user_id", auth()->user()->id)
            ->where("camp_id", $camp->id)
            ->first();
        // return $user;
        return view("pages.user.show", compact("user"));
    }
}
