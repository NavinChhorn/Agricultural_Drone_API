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
            "map_id"=>$this->id,
            "image_name"=>$this->image_name,
            "height"=>$this->height,
            "width"=>$this->width,
            "farm_id"=>$this->farm->id,
            "farm_name"=>$this->farm->name,
            "drone_id"=>$this->drone->id,
        ];
    }
}
