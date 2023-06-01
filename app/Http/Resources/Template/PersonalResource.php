<?php

namespace App\Http\Resources\Template;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PersonalResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => (string) $this->developer_id,
            'attributes' => [
                'first_name' => (string)$this->first_name,
                'last_name' => (string)$this->last_name,
                'formal_name' => (string)$this->formal_name,
                'email' => (string)$this->email,
                'phones' =>PhonesResource::collection($this->phones),
                'social_media' =>SocialMediaResource::collection($this->social_media),
                'address' => (string)$this->address,
                'location_url' => $this->location_url,
                'cv_link_drive' => $this->cv_link_drive,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
            ]
        ];
    }
}
