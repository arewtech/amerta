<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Discount extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ["name", "code", "percentage", "description"];

    public function scopeSearch($query, $search)
    {
        return $query->where("name", "like", "%$search%");
    }
}
