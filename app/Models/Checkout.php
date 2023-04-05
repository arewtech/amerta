<?php

namespace App\Models;

use GuzzleHttp\Promise\Is;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class Checkout extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Searchable;

    protected $fillable = [
        "camp_id",
        "user_id",
        "card_number",
        "expired",
        "cvc",
        "is_paid",
        "discount_id",
        "discount_percentage",
        "total",
    ];

    protected $with = ["camp", "user"];
    // public function searchableAs()
    // {
    //     return "users_index";
    // }

    // public function toSearchableArray()
    // {
    //     return [
    //         "cvc" => $this->cvc,
    //     ];
    // }

    // protected function makeAllSearchableUsing(Builder $query)
    // {
    //     return $query->with("camp", "user");
    // }

    // search scout with relation
    // public function toSearchableArray()
    // {
    //     $array = $this->toArray();
    //     $array["title"] = $this->camp->title;
    //     $array["user"] = $this->user->name;
    //     return $array;
    // }

    public function setExpiredAttribute($value)
    {
        $this->attributes["expired"] = date("Y-m-t", strtotime($value));
    }

    public function camp()
    {
        return $this->belongsTo(Camp::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
