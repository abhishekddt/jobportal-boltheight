<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "state_id",
        "state_code",
        "country_id",
        "country_code",
        "latitude",
        "longitude",
        "flag",
        "wikiDataId"
    ];
}
