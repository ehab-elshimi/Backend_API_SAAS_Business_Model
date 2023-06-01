<?php

namespace App\Models;

use App\Traits\UserIdFilterTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class EmailConfiguration extends Model
{
    use HasFactory;

    protected $fillable = ['driver','host','port','username','password','encryption','from_address','from_name','user_id'];

    public function User():HasOne
    {
        return $this->belongsTo(User::class);
    }
}
