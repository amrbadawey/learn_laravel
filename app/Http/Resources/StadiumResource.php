<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StadiumResource extends JsonResource
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
            'name' => $this->name,
            'club' => new ClubResource($this->whenLoaded('club')),
            'sport_type' => new SportTypeResource($this->whenLoaded('sportType')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
