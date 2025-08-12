<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Backend\CondidateDetail;
use App\Models\CandidateEducation;
use App\Models\EmploymentDetail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use SoftDeletes;
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'profile',
        'profile_original_name',
        'user_role_id',
        'status',
        'first_name',
        'last_name',
        'country',
        'state',
        'city',
        'gender',
        'field',
        'is_experienced',
        'created_by'
    ];

    protected $dates = ['deleted_at'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getCondidateDetail()
    {
        return $this->hasOne(CondidateDetail::class, 'user_id');
    }

    public function getCreatedBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function getAmendedBy()
    {
        return $this->belongsTo(User::class, 'amended_by');
    }

    // public function candidateDetail()
    // {
    //     return $this->hasOne(CondidateDetail::class, 'user_id');
    // }

    public function educations()
    {
        return $this->hasMany(CandidateEducation::class);
    }


    public function employments()
    {
        return $this->hasMany(EmploymentDetail::class);
    }
}
