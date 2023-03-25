<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::whereIsAdmin("users")
            ->latest()
            ->get();
        // return $users;
        return view("dashboard.users.index", compact("users"));
    }
}
