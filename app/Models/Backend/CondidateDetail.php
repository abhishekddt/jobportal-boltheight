<?php

namespace App\Models\Backend;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CandidateJobPosition;

class CondidateDetail extends Model
{
    use HasFactory;

    protected $table = 'condidate_details';

    protected $fillable = [
        "user_id",
        "father_name",
        "date_of_birth",
        "career_break",
        "gender",
        "skills",
        "language",
        "permanent_address",
        "hometown",
        "pincode",
        "marital_status",
        "nationality",
        "national_id_card",
        "experience",
        "experience_month",
        "career_level",
        "functional_area",
        "current_salary",
        "expected_salary",
        "salary_currency",
        "facebook_url",
        "linkedin_url",
        "availability",
        "available_at",
        "address",
        "field",
        "is_experienced",
        "is_current_employment",
        "employment_type",
        "company_name",
        "job_title",
        "joining_date",
        "notice_period",
        "job_profile",
        "profile_summary",
        "candidate_resume",
        "profile_image",
    ];

    public $casts = [
        "skills" => 'array',
        "language" => 'array'

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function jobPosition()
    {
        return $this->hasOne(CandidateJobPosition::class, 'candidate_user_id', 'id');
    }

}