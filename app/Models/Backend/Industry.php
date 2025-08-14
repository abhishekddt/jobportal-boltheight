<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Industry extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $fillable = ['name'];
    protected $dates = ['deleted_at'];


    public function employerDetails()
    {
        return $this->hasMany(EmployerDetail::class, 'industry_id');
    }


}