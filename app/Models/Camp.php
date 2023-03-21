<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Camp extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ["title", "slug", "tagline", "price", "description"];

    public function getIsRegisteredAttribute()
    {
        // return $this->users()->where("user_id", auth()->id())->exists();
        // check jika user tidak login maka return false
        if (!Auth::check()) {
            return false;
        }
        // check jika user sudah login maka return true

        return checkout::whereCampId($this->id)
            ->whereUserId(auth()->id())
            ->exists();
    }

    // public function getRouteKeyName()
    // {
    //     return "slug";
    // }

    public function benefits()
    {
        return $this->hasMany(CampBenefit::class);
    }

    // public function checkouts()
    // {
    //     return $this->hasMany(Checkout::class);
    // }
}
