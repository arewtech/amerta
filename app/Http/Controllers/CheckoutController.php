<?php

namespace App\Http\Controllers;

use App\Models\Camp;
use App\Models\Checkout;
use App\Models\Discount;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->has("q")) {
            $checkouts = Checkout::with("camp", "user", "discount")
                ->whereHas("camp", function ($query) use ($request) {
                    $query->where("title", "LIKE", "%" . $request->q . "%");
                    // ->orWhere("is_paid", "LIKE", "%" . $request->q . "%");
                })
                ->orderBy("id", "DESC")
                ->get();
            // return $checkouts;
        } else {
            $checkouts = Checkout::with("camp", "user", "discount")
                ->orderBy("id", "DESC")
                ->get();
        }
        return view("dashboard.checkouts.index", compact("checkouts"));
    }

    public function searchCheckout(Request $request)
    {
        $checkouts = Checkout::search($request->q)->get();
        return view("dashboard.checkouts.index", compact("checkouts"));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(Camp $camp)
    {
        $discount = Discount::latest()->first();

        if ($camp->is_inactive) {
            return redirect()
                ->route("home")
                ->with("error", "camp ini sudah tidak aktif!");
        }

        // return $discount;
        // bisa langsung bind camp nya atau mau cari secara manual menggunakan where.
        // $checkoutCamp = Camp::where("slug", $slug)->firstOrFail();
        // return $checkout;
        // check apakah user sudah terdaftar di camp ini
        if ($camp->is_registered) {
            // kalau sudah maka redirect ke halaman dashboard payment
            return redirect()
                ->route("preview")
                ->with("success", "kamu sudah terdaftar di $camp->title ini!");
        }

        // check apakah camp sudah selesai, jika sudah maka tidak bisa mendaftar
        if ($camp->is_finished) {
            // kalau sudah maka redirect ke halaman histories
            return redirect()
                ->route("histories")
                ->with(
                    "finished",
                    "kamu sudah menyelesaikan $camp->title ini, tidak bisa mendaftar lagi!"
                );
        }
        // kalau belum maka tampilkan halaman checkout / create
        return view("pages.checkout.create", compact("camp", "discount"));
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
        // return $request->all();
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
            // ketika ada discount maka akan di cek apakah discount tersebut ada di database
            // dan apakah discount tersebut sudah di hapus atau belum
            // jika sudah di hapus maka akan muncul pesan error
            // jika tidak maka akan di lanjutkan ke proses selanjutnya
            // dan jika tidak ada discount maka akan di lanjutkan ke proses selanjutnya
            "discount" =>
                "nullable|string|exists:discounts,code,deleted_at,NULL",
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

        // check apakah ada discount
        // jika ada maka akan di simpan ke database
        // dan jika tidak maka akan di lanjutkan ke proses selanjutnya
        if ($request->discount) {
            $discount = Discount::where("code", $request->discount)->first();
            // return $discount;
            $camps["discount_id"] = $discount->id;
            $camps["discount_percentage"] = $discount->percentage;
            // harga camp
            $price = $camp->price;
            // berapa persen yang akan di potong, contoh 10%
            $discountPercentage = $discount->percentage;
            // berapa yang akan di potong, contoh 10% dari 100000 = 10000, 10000 akan di potong dari 100000
            $discountPrice = ($price * $discountPercentage) / 100;
            // total yang harus di bayar
            $camps["total"] = $price - $discountPrice;
            // return $camps;
        }

        Checkout::create($camps);
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
        $checkout->update([
            "is_paid" => $request->is_paid ? true : false,
        ]);
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
