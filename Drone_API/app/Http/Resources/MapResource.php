<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MapResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id"=>$this->id,
            "image_name"=>$this->image_name,
            "height"=>$this->height,
            "width"=>$this->width,
            "farm"=>new FarmResource($this->farm),
            "drone"=>new DroneResource($this->drone),
        ];
    }
}
