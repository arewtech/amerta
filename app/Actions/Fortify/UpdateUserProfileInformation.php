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
                    "email" => $input["email"],
                    "occupation" => $input["occupation"] ?? null,
                    "bio" => $input["bio"] ?? null,
                    "avatar" => $input["avatar"] ?? null,
                ])
                ->save();
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
                "email" => $input["email"],
                "email_verified_at" => null,
                "occupation" => $input["occupation"] ?? null,
                "bio" => $input["bio"] ?? null,
                "avatar" => $input["avatar"] ?? null,
            ])
            ->save();
        $user->sendEmailVerificationNotification();
    }
}
