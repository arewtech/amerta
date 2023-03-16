<?php

namespace App\Http\Controllers;

use App\Models\CampBenefit;
use Illuminate\Http\Request;

class CampBenefitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $benefits = CampBenefit::with("camp")->get();
        // return $benefits;
        return view("dashboard.camp-benefits.index", compact("benefits"));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CampBenefit $campBenefit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CampBenefit $campBenefit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CampBenefit $campBenefit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CampBenefit $campBenefit)
    {
        //
    }
}
