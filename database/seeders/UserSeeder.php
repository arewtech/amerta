<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // create two users seeder
        $users = [
            [
                "name" => "Admin",
                "username" => "admin",
                "email" => "admin@gmail.com",
                "email_verified_at" => now(),
                "password" => bcrypt("password"),
                "is_admin" => "admin",
                "remember_token" => Str::random(10),
            ],
            [
                "name" => "Kim Maman",
                "username" => "maman",
                "email" => "maman@gmail.com",
                "email_verified_at" => now(),
                "password" => bcrypt("password"),
                "is_admin" => "users",
                "remember_token" => Str::random(10),
            ],
            [
                "name" => "John Doe",
                "username" => "johndoe",
                "email" => "john@gmail.com",
                "email_verified_at" => now(),
                "password" => bcrypt("password"),
                "is_admin" => "users",
                "remember_token" => Str::random(10),
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
