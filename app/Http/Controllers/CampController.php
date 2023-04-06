<?php

namespace App\Http\Controllers;

use App\Models\Camp;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CampController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $camps = Camp::with("benefits")
            ->orderBy("created_at", "DESC")
            ->get();
        // return $camps;
        return view("dashboard.camps.index", compact("camps"));
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
        $data = $request->all();
        Camp::create($data);
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Camp $camp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Camp $camp)
    {
        return view("dashboard.camps.edit", compact("camp"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Camp $camp)
    {
        $data = $request->all();
        $data["slug"] = null;
        $camp->update($data);
        return redirect()->route("camps.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Camp $camp)
    {
        $camp->delete();
        return back();
    }
}
