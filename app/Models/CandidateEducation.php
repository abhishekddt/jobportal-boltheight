<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Backend\User\UserBackend;

class CandidateEducation extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "candidate_educations";

    protected $fillable = [
        'user_id',
        'course',
        'university',
        'course_type',
        'start_year',
        'end_year',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}