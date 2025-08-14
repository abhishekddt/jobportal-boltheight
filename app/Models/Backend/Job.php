<?php

namespace App\Models\backend;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
    use HasFactory, SoftDeletes;


    protected $fillable = [
        'company_id',
        'job_title',
        'job_type',
        'job_category',
        'job_skills',
        'gender',
        'languages',
        'job_expiry',
        'salary_from',
        'salary_to',
        'country_id',
        'state_id',
        'cities',
        'currency',
        'min_experience',
        'shift',
        'position',
        'jd',
        'hide_salary',
        'hide_company',
        'status',
        'created_by'
    ];

    protected $casts = [
        'job_skills' => 'array',
        'languages' => 'array',
        'cities' => 'array',
        'hide_salary' => 'boolean',
        'hide_company' => 'boolean',
        'job_expiry' => 'date',
    ];

    public function company()
    {
        return $this->belongsTo(EmployerDetail::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function cities()
    {
        return $this->hasMany(City::class, 'id', 'cities');
    }

    public function getCreatedBy()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
    public function languages()
    {
        return $this->belongsToMany(Language::class);
    }

}