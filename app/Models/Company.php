<?php

namespace App\Models;

use App\Traits\UserIdFilterTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Company extends Model
{
    use HasFactory;
    protected $fillable = ['logo','name', 'link','location','period_type','developer_id'];

    public function developer():HasOne
    {
        return $this->belongsTo(Developer::class);
    }
    public function experience_periods():BelongsTo //one to many
    {
        return $this->hasMany(ExperiencePeriod::class);
    }
}