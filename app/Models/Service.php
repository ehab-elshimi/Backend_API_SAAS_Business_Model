<?php

namespace App\Models;

use App\Traits\UserIdFilterTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Service extends Model
{
    use HasFactory;
    public function whereUserId($user_id)
    {
        return User::find($user_id);
    }
    protected $fillable =['icon','title','description','developer_id'];

    public function developer():HasOne
    {
        return $this->belongsTo(Developer::class);
    }
}
