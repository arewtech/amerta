<?php

namespace App\Http\Controllers;

use App\Models\Camp;
use App\Models\CampBenefit;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Termwind\Components\Dd;

class CampBenefitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Camp $camp)
    {
        $benefits = CampBenefit::with("camp")
            ->whereCampId($camp->id)
            ->get();
        return view(
            "dashboard.camp-benefits.index",
            compact(["benefits", "camp"])
        );
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
    public function store(Request $request, Camp $camp)
    {
        $data = $request->validate([
            "name" => ["required", "string"],
        ]);
        $data["camp_id"] = $camp->id;
        CampBenefit::create($data);
        sweetalert()->addSuccess("Berhasil menambahkan data camp benefit");
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(CampBenefit $campBenefit)
    {
        $camps = Camp::all();
        $campBenefit = Camp::with("benefits")
            ->where("id", $campBenefit->id)
            ->first();
        // return $campBenefit;
        return view(
            "dashboard.camp-benefits.show",
            compact("campBenefit", "camps")
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CampBenefit $campBenefit)
    {
        // return $campBenefit;
        $benefits = Camp::all();
        return view(
            "dashboard.camp-benefits.edit",
            compact("campBenefit", "benefits")
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CampBenefit $campBenefit)
    {
        // return $campBenefit;
        $request->validate([
            "camp_id" => ["required", "exists:camps,id", "integer"],
            "name" => ["required", "string"],
        ]);
        $data = $request->all();
        $data["camp_id"] = $request->camp_id;
        $campBenefit->update($data);
        sweetalert()->addSuccess("Berhasil mengubah data camp benefit");
        // return $campBenefit;
        return redirect()->route("camp-benefits.show", $request->camp_id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Camp $camp, CampBenefit $campBenefit)
    {
        $campBenefit->delete();
        sweetalert()->addSuccess("Berhasil menghapus data camp benefit");
        return back();
    }
}
