<?php

namespace App\Models;

use App\Traits\UserIdFilterTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Developer extends Model
{
    use HasFactory;

    protected $fillable = ['first_name','last_name','formal_name','email','address','location_url','cv_link_drive','user_id'];

    public function User():HasOne
    {
        return $this->belongsTo(User::class);
    }
    public function phones():BelongsTo
    {
        return $this->hasMany(Phones::class);
    }
    public function features():BelongsTo
    {
        return $this->hasMany(Features::class);
    }
    public function social_media_icons():BelongsTo
    {
        return $this->hasMany(SocialMedia::class);
    }
    public function skills():BelongsTo
    {
        return $this->hasMany(Skills::class);
    }
}
