<?php

namespace App\Http\Resources\Template;

use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;


class SkillsResource extends ResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        return [
            'id' => $this->id,
            'attributes' => [
                "type" => $this->type,
                "skill" => Skill::where('type', '=', $this->type)->collect(),
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
            ]
        ];
    }
}