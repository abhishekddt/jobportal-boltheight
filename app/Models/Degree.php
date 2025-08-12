<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Degree extends Model
{
  protected $table = 'degree';
  use HasFactory;
  use SoftDeletes;

  protected $fillable = ['name', 'description', 'status'];
}
