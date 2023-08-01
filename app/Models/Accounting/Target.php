<?php

namespace App\Models\Accounting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Target extends Model
{
    use HasFactory;

    protected $fillable = [
        "entity_name",
        "targert_measure",
        "target_value",
        "deadline",
        "assigned_to",
    ];
}
