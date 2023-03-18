<?php

namespace App\Http\Controllers;

use App\Models\Camp;
use App\Models\Checkout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Camp $camp)
    {
        // bisa langsung bind camp nya atau mau cari secara manual menggunakan where.
        // $checkoutCamp = Camp::where("slug", $slug)->firstOrFail();
        // return $checkout;
        // check apakah user sudah terdaftar di camp ini
        if ($camp->is_registered) {
            // kalau sudah maka redirect ke halaman dashboard payment
            return "kamu sudah terdaftar di $camp->title";
        }
        // kalau belum maka tampilkan halaman checkout / create
        return view("pages.checkout.create", compact("camp"));
    }

    public function success(Camp $camp)
    {
        // $camps = checkout::with("camp", "user")->get();
        // return $camps;
        return view("pages.checkout.checkout-success");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Camp $camp)
    {
        $expiredDateValidation = date("Y-m", time());
        $request->validate([
            // "camp_id" => ["required", "exists:camps,id"],
            // "user_id" => ["required", "exists:users,id"],
            "name" => "required|min:3|max:255|string",
            "email" =>
                "required|email|exists:users,email|unique:users,email," .
                Auth::id() .
                ",id",
            "card_number" => "required|numeric",
            "expired" => "required|date|date_format:Y-m|after_or_equal:'.$expiredDateValidation",
            "cvc" => "required|numeric|digits:3",
        ]);
        $camps = $request->all();
        $camps["camp_id"] = $camp->id;
        $camps["user_id"] = auth()->user()->id;
        $camps["is_paid"] = false;

        // update users
        $user = auth()->user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->occupation = $request->occupation;
        $user->save();
        Checkout::create($camps);
        // dd($camps);
        // return "success";
        return redirect()->route("checkout.success", $camp->slug);
    }

    /**
     * Display the specified resource.
     */
    public function show(Checkout $checkout)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Checkout $checkout)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Checkout $checkout)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Checkout $checkout)
    {
        //
    }
}
