<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "country_id",
        "country_code",
        "fips_code",
        "iso2",
        "latitude",
        "longitude",
        "flag",
        "wikiDataId",
    ];

    public function getCountry()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function cities()
    {
        return $this->hasMany(City::class);
    }
}
