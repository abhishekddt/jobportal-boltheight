<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ITSkill extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = "itskills";

    protected $fillable = [
        'user_id',
        'skill',
        'software_version',
        'last_used_software_year',
        'software_experience_year',
        'software_experience_month',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
