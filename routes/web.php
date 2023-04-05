<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CampBenefitController;
use App\Http\Controllers\CampController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PreviewController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\EnsureTokenIsValid;
use App\Models\Camp;
use App\Models\Checkout;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get("/", [HomeController::class, "index"])->name("home");

Route::controller(CheckoutController::class)
    ->middleware("auth")
    ->group(function () {
        Route::get("/checkout/q/{camp:slug}/checkout-success", "success")->name(
            "checkout.success"
        );
        Route::get("/checkout/{camp:slug}", "create")->name("checkout.create");
        Route::post("/checkout/{camp}", "store")->name("checkout.store");
    });

Route::prefix("dashboard")
    ->middleware(["auth", EnsureTokenIsValid::class])
    ->group(function () {
        Route::get("/", [DashboardController::class, "index"])->name(
            "dashboard"
        );
        Route::get("/checkouts/search", [
            CheckoutController::class,
            "searchCheckout",
        ])->name("checkouts.search");
        Route::resource("/camps", CampController::class);
        Route::resource("/checkouts", CheckoutController::class);
        Route::resource("/camp-benefits", CampBenefitController::class);
        Route::resource("/discounts", DiscountController::class);
        Route::get("/users", [AdminController::class, "index"])->name("admin");
    });

Route::middleware("auth")->group(function () {
    // route search
    // Route::get("/search", function () {
    //     $search = request()->query("search");
    //     $camps = Camp::search($search)->get();
    //     return view("pages.search", compact("camps"));
    // })->name("search");
    Route::get("/dashboard/user/search", [
        UserController::class,
        "search",
    ])->name("search");
    Route::get("dashboard/user", [PreviewController::class, "index"])->name(
        "preview"
    );
    Route::get("dashboard/user/{camp:slug}", [
        PreviewController::class,
        "show",
    ])->name("preview.show");
    Route::get("/profile-information", function () {
        $camp = Checkout::with("camp")
            ->where("user_id", auth()->id())
            ->whereStatus("finished")
            ->latest()
            ->get();
        // return $camp;
        return view("pages.profile.index", compact("camp"));
    })->name("update-profile");
});
