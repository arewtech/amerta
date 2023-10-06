<?php

namespace App\Http\Controllers;

use App\Models\Camp;
use App\Models\Checkout;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $users = User::query()
            ->where("id", "!=", auth()->user()->id)
            ->whereIsAdmin("users")
            ->when($request->q, function ($users) use ($request) {
                $users->where("name", "like", "%{$request->q}%");
            })
            ->latest()
            ->get();
        return view("dashboard.users.index", compact("users"));
    }

    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|string|max:255",
            "username" => "required|string|max:255|unique:users",
            "email" => "required|string|email|max:255|unique:users",
            "password" => "required|string|min:8",
        ]);

        $data = $request->except(["_token"]);
        $data["password"] = bcrypt($request->password);
        User::create($data);
        sweetalert()->addSuccess("Berhasil menambahkan data user");
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user, Checkout $checkout)
    {
        // return view("pages.user.show", compact("user"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view("dashboard.users.edit", compact("user"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            "name" => "required|string|max:255",
            "username" =>
                "required|string|max:255|unique:users,username," . $user->id,
            "email" =>
                "required|string|email|max:255|unique:users,email," . $user->id,
            "password" => "nullable|string|min:8",
            "status" => "required|string|in:active,inactive",
        ]);

        $data = $request->except(["_token", "_method"]);
        if ($request->password) {
            $data["password"] = bcrypt($request->password);
        } else {
            unset($data["password"]);
        }
        $user->update($data);
        sweetalert()->addSuccess("Berhasil mengubah data user");
        return redirect()->route("users.index");
    }

    public function destroy(User $user)
    {
        $user->delete();
        sweetalert()->addSuccess("Berhasil menghapus data user");
        return back();
    }
}
