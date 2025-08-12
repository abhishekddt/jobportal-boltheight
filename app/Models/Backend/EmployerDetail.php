<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployerDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "ceo_name",
        "industry",
        "ownership_type",
        "company_size",
        "established_year",
        "location",
        "second_office_location",
        "employer_detail",
        "website",
        "facebook_url",
        "linkedin_url",
        "status"
    ];
}
