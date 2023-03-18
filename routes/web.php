<?php

use App\Http\Controllers\CampBenefitController;
use App\Http\Controllers\CampController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
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

Route::get("/checkout/q/{camp:slug}/checkout-success", [
    CheckoutController::class,
    "success",
])->name("checkout.success");
Route::get("/checkout/{camp:slug}", [
    CheckoutController::class,
    "create",
])->name("checkout.create");
Route::post("/checkout/{camp}", [CheckoutController::class, "store"])->name(
    "checkout.store"
);

Route::resource("dashboard/camps", CampController::class);
Route::resource("dashboard/camp-benefits", CampBenefitController::class);

Route::get("/dashboard", function () {
    return view("dashboard.index");
})->name("dashboard");
