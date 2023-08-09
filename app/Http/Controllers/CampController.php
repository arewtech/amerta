<?php

namespace App\Http\Controllers;

use App\Models\Camp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CampController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $camps = Camp::orderBy("created_at", "DESC")->get();
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
        $request->merge([
            "price" => str_replace(".", "", $request->price),
        ]);

        $request->validate([
            "title" => "required|max:255",
            "tagline" => "required|max:255",
            "price" => "required|integer",
            "description" => "required",
            "image" => "nullable|image|mimes:jpg,jpeg,png,svg",
        ]);
        $data = $request->all();
        if ($request->file("image")) {
            $data["image"] = $request
                ->file("image")
                ->store("assets/camp", "public");
        }
        // return $data;
        Camp::create($data);
        sweetalert()->addSuccess("Berhasil menambahkan data camp");
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
        $request->merge([
            "price" => str_replace(".", "", $request->price),
        ]);

        $data = $request->all();
        $data["slug"] = null;
        if ($request->hasFile("image")) {
            Storage::delete("public/" . $camp->image);
            $data["image"] = $request
                ->file("image")
                ->store("assets/camp", "public");
        }
        // return $data;
        $camp->update($data);
        sweetalert()->addSuccess("Berhasil mengubah data camp");
        return redirect()->route("camps.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Camp $camp)
    {
        if ($camp->image) {
            Storage::delete("public/" . $camp->image);
        }
        $camp->delete();
        sweetalert()->addSuccess("Berhasil menghapus data camp");
        return back();
    }
}
