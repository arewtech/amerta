<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $discounts = Discount::orderBy("created_at", "DESC")->paginate(
            setting("app_pagination") ?? 10
        );
        return view("dashboard.discounts.index", compact("discounts"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => ["required", "string"],
            "code" => ["required", "string", "unique:discounts"],
            "percentage" => ["required", "integer", "min:1", "max:100"],
            "description" => ["nullable", "string"],
        ]);
        Discount::create($request->all());
        sweetalert()->addSuccess("Berhasil menambahkan data discount");
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Discount $discount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Discount $discount)
    {
        // return $discount;
        return view("dashboard.discounts.edit", compact("discount"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Discount $discount)
    {
        $request->validate([
            "name" => ["required", "string"],
            "code" => [
                "required",
                "string",
                "unique:discounts,code," . $discount->id,
            ],
            "percentage" => ["required", "integer", "min:1", "max:100"],
            "description" => ["nullable", "string"],
        ]);
        $discount->update($request->all());
        sweetalert()->addSuccess("Berhasil mengubah data discount");
        return redirect()->route("discounts.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Discount $discount)
    {
        $discount->delete();
        sweetalert()->addSuccess("Berhasil menghapus data discount");
        return back();
    }
}
