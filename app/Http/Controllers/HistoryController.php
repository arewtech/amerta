<?php

namespace App\Http\Controllers;

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
}
