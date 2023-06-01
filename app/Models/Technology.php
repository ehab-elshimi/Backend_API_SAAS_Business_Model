<?php

namespace App\Models;

use App\Traits\UserIdFilterTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    use HasFactory;

    protected $fillable = ['icon','technology'];

    public function projects()
    {
        return $this->belongsToMany(Project::class, 'project_technologies');
    }
}
