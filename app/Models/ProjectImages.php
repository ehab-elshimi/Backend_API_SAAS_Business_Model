<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ProjectImages extends Model
{
    use HasFactory;
    protected $fillable = ['project_id','image'];

    public function project():HasOne
    {
        return $this->belongsTo(Project::class);
    }
}