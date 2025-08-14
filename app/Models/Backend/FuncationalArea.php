<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FuncationalArea extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['industry_id', 'name'];

    protected $casts = [
        'deleted_at' => 'datetime',
    ];

    public function industry()
    {
        return $this->belongsTo(Industry::class, 'industry_id', 'id');
    }
}