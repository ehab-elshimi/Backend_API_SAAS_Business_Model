<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectTechnologies extends Model
{
    use HasFactory;
    protected $fillable = ['project_id','technology_id'];
}
