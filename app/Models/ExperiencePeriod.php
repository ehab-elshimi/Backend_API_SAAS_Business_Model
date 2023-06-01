<?php

namespace App\Models;

use App\Traits\UserIdFilterTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ExperiencePeriod extends Model
{
    use HasFactory;

    protected $fillable = ['job_title','from_date','to_date','job_distance_type','job_time_type','desc','company_id'];

    public function comany():HasOne
    {
        return $this->belongsTo(Company::class);
    }
}
