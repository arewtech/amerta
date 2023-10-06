<?php

use App\Http\Controllers\CampBenefitController;
use App\Http\Controllers\CampController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PreviewController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\EnsureTokenIsValid;
use App\Models\Checkout;
use Illuminate\Support\Facades\Route;

Route::get("/", [HomeController::class, "index"])
    ->name("home")
    ->middleware(["auth"]);

Route::controller(CheckoutController::class)
    ->middleware(["auth", "verified"])
    ->group(function () {
        Route::get("/checkout/q/{camp:slug}/checkout-success", "success")->name(
            "checkout.success"
        );
        Route::get("/checkout/{camp:slug}", "create")->name("checkout.create");
        Route::post("/checkout/{camp}", "store")->name("checkout.store");
    });

Route::prefix("dashboard")
    ->middleware(["auth", "verified", EnsureTokenIsValid::class])
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
        Route::resource(
            "/camps/{camp}/camp-benefits",
            CampBenefitController::class
        );
        Route::resource("/discounts", DiscountController::class);
        Route::resource("/users", UserController::class);
    });

Route::middleware(["auth", "verified"])->group(function () {
    Route::get("dashboard/user/histories", [
        HistoryController::class,
        "index",
    ])->name("histories");
    Route::get("dashboard/user/histories/{camp:slug}", [
        HistoryController::class,
        "show",
    ])->name("histories.show");
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
