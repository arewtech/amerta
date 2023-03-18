<?php

use App\Http\Controllers\CampBenefitController;
use App\Http\Controllers\CampController;
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

Route::get("/", function () {
    return view("pages.index");
});

Route::resource("dashboard/camps", CampController::class);
Route::resource("dashboard/camp-benefits", CampBenefitController::class);

Route::get("/dashboard", function () {
    return view("dashboard.index");
})->name("dashboard");
