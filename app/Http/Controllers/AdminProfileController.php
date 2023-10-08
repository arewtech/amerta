<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminProfileController extends Controller
{
    public function create()
    {
        return view("dashboard.profile.create");
    }

    public function update(Request $request)
    {
        $request->validate([
            "name" => ["required", "string", "max:255"],
            "username" => [
                "required",
                "alpha_num",
                "string",
                "max:255",
                "unique:users,username," . auth()->id(),
            ],
            "password" => ["nullable", "string", "min:8"],
            "email" => [
                "required",
                "string",
                "email",
                "max:255",
                "unique:users,email," . auth()->id(),
            ],
        ]);

        $user = $request->except(["_token", "_method"]);
        if ($request->password) {
            $user["password"] = bcrypt($request->password);
        } else {
            unset($user["password"]);
        }
        auth()
            ->user()
            ->update($user);
        sweetalert()->addSuccess("Profile berhasil diupdate");
        return back();
    }
}
