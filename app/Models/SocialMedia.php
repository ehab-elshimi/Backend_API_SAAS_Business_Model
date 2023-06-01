<?php

namespace App\Models;

use App\Traits\UserIdFilterTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class SocialMedia extends Model
{
    use HasFactory;

    protected $fillable=['icon', 'link','developer_id'];

    public function developer():HasOne
    {
        return $this->belongsTo(Developer::class);
    }
}
