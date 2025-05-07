<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ResidentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'first_name' => $this->firstname,
            'last_name' => $this->lastname,
            'address' => $this->address,
            'city' => new CityResource($this->whenLoaded('city')),
            'city_area' => new CityAreaResource($this->whenLoaded('cityArea')),
        ];
    }
}
