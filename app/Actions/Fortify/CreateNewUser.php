<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            "name" => ["required", "string", "max:255"],
            "email" => [
                "required",
                "string",
                "email",
                "max:255",
                Rule::unique(User::class),
            ],
            "password" => $this->passwordRules(),
            "avatar" => ["image"],
        ])->validate();

        // create storage image
        // if ($image = $input["avatar"]) {
        //     $image_name = time() . "." . $image->extension();
        //     $image->move(public_path("storage"), $image_name);
        // }

        return User::create([
            "name" => $input["name"],
            "email" => $input["email"],
            "password" => Hash::make($input["password"]),
            "avatar" => $input["avatar"],
        ]);
    }
}
