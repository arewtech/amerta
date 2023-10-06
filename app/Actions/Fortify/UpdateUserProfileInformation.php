<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;
use Termwind\Components\Dd;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  array<string, string>  $input
     */
    public function update(User $user, array $input): void
    {
        Validator::make($input, [
            "name" => ["required", "string", "max:255"],
            "username" => [
                "required",
                "string",
                "max:255",
                Rule::unique("users")->ignore($user->id),
            ],
            "email" => [
                "required",
                "string",
                "email",
                "max:255",
                Rule::unique("users")->ignore($user->id),
            ],
            "occupation" => ["string", "max:255", "nullable"],
            "bio" => ["string", "max:255", "nullable"],
            "avatar" => "image|mimes:jpeg,png,jpg,gif,svg|max:2048|nullable",
        ])->validateWithBag("updateProfileInformation");

        if (
            $input["email"] !== $user->email &&
            $user instanceof MustVerifyEmail
        ) {
            $this->updateVerifiedUser($user, $input);
        } else {
            if (request()->hasFile("avatar")) {
                Storage::delete("public/" . $user->avatar);
                $input["avatar"] = request()
                    ->file("avatar")
                    ->store("images", "public");
            }

            $user
                ->forceFill([
                    "name" => $input["name"],
                    "username" => $input["username"],
                    "email" => $input["email"],
                    "occupation" => $input["occupation"] ?? $user->occupation,
                    "bio" => $input["bio"],
                    "avatar" => $input["avatar"] ?? $user->avatar,
                    // bisa juga seperti ini:
                    // "avatar" => !empty($input["avatar"])
                    //     ? $input["avatar"]
                    //     : $user->avatar,
                ])
                ->save();
            // dd($input);
        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  array<string, string>  $input
     */
    protected function updateVerifiedUser(User $user, array $input): void
    {
        if (request()->hasFile("avatar")) {
            Storage::delete("public/" . $user->avatar);
            $input["avatar"] = request()
                ->file("avatar")
                ->store("images", "public");
        }
        $user
            ->forceFill([
                "name" => $input["name"],
                "username" => $input["username"],
                "email" => $input["email"],
                "email_verified_at" => null,
                "occupation" => $input["occupation"] ?? $user->occupation,
                "bio" => $input["bio"],
                "avatar" => $input["avatar"] ?? $user->avatar,
            ])
            ->save();
        $user->sendEmailVerificationNotification();
    }
}
