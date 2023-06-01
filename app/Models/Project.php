<?php

namespace App\Models;

use App\Traits\UserIdFilterTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['intro_image','title','source_code_link','desc','pdf_docs_url','is_displayed','developer_id'];

    public function project_images():BelongsTo
    {
        return $this->hasMany(ProjectImages::class);
    }
    public function technologies()
    {
        return $this->belongsToMany(Technologies::class, 'project_technologies');
    }
    public function skill_features()
    {
        return $this->belongsToMany(ProjectFeatures::class, 'project_features');
    }
    public function developer():HasOne
    {
        return $this->belongsTo(Developer::class);
    }
}
