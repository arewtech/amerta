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
        $checkouts = Checkout::with("camp", "user")
            ->orderBy("id", "DESC")
            ->get();
        return view("dashboard.checkouts.index", compact("checkouts"));
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
            return redirect()
                ->route("user.index")
                ->with("success", "kamu sudah terdaftar di $camp->title ini!");
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
        // $expiredDateValidation = date("Y-m", strtotime("+1 month"));
        $expiredDateValidation = date("Y-m", time());
        $request->validate([
            "name" => "required|min:3|max:255|string",
            "email" =>
                "required|email|unique:users,email," . auth()->user()->id,
            // email:rfc,dns = validasi email dengan rfc dan dns
            "occupation" => "required|string",
            "card_number" => "required|numeric|digits_between:8,16",
            "expired" => "required|date|date_format:Y-m|after_or_equal:$expiredDateValidation",
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
        // return $checkout;
        $checkout = Checkout::with("camp", "user")->findOrFail($checkout->id);
        return view("dashboard.checkouts.show", compact("checkout"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Checkout $checkout)
    {
        $checkout = Checkout::with("camp", "user")->findOrFail($checkout->id);
        return view("dashboard.checkouts.edit", compact("checkout"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Checkout $checkout)
    {
        $request->validate([
            "is_paid" => "boolean|nullable",
        ]);
        if ($checkout->is_paid) {
            $checkout->is_paid = false;
        } else {
            $checkout->is_paid = true;
        }
        $checkout->save();
        return redirect()->route("checkouts.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Checkout $checkout)
    {
        // return $checkout;
        $checkout->delete();
        return redirect()->route("checkouts.index");
    }
}
