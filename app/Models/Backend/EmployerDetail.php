<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class EmployerDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "ceo_name",
        "company_name",
        "industry_id",
        "functional_area_id",
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

    public function industry()
    {
        return $this->belongsTo(Industry::class, 'industry_id');
    }

    public function funcationalArea(){
        return $this->belongsTo(FuncationalArea::class, 'functional_area_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, );
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

}
