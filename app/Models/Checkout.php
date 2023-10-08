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
        "discount_id",
        "card_number",
        "expired",
        "cvc",
        "is_paid",
        "discount_percentage",
        "total",
    ];

    // protected $with = ["camp", "user"];
    protected $casts = [
        "expired" => "date",
    ];

    public function scopeFilter($query, $filters)
    {
        return $query
            ->when(isset($filters["paid"]), function ($query) use ($filters) {
                $query->where("is_paid", $filters["paid"]);
            })
            ->when(isset($filters["q"]), function ($query) use ($filters) {
                $query
                    ->whereHas("camp", function ($query) use ($filters) {
                        $query->where(
                            "title",
                            "like",
                            "%" . $filters["q"] . "%"
                        );
                    })
                    ->orWhereHas("user", function ($query) use ($filters) {
                        $query->where(
                            "name",
                            "like",
                            "%" . $filters["q"] . "%"
                        );
                    });
            });
    }

    // public function scopeSearch($query, $search)
    // {
    //     return $query->whereHas("camp", function ($query) use ($search) {
    //         $query->where("title", "LIKE", "%" . $search->q . "%");
    //     });
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

    public function discount()
    {
        return $this->belongsTo(Discount::class);
    }
}
