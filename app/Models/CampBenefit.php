<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CampBenefit extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ["camp_id", "title"];

    public function camp()
    {
        return $this->belongsTo(Camp::class);
    }
}
