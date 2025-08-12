<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmploymentDetail extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "employment_details";

    protected $fillable = [
        'user_id',
        'experience',
        'experience_month',
        'company_name',
        'job_title',
        'joining_date',
        'current_salary',
        'notice_period',
        'job_profile',
        'is_current_employment',
        'employment_type',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
