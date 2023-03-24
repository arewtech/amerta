<?php

use App\Http\Controllers\CampBenefitController;
use App\Http\Controllers\CampController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\EnsureTokenIsValid;
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
        Route::resource("/camps", CampController::class);
        Route::resource("/checkouts", CheckoutController::class);
        Route::resource("/camp-benefits", CampBenefitController::class);
    });

Route::middleware("auth")->group(function () {
    Route::resource("dashboard/user", UserController::class);
});
