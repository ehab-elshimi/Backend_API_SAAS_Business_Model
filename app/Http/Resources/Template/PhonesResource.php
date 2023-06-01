<?php

namespace App\Http\Resources\Template;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PhonesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => (string) $this->id,
            'attributes' => [
                "number" => (string)$this->phone,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
            ]
        ];
    }
}