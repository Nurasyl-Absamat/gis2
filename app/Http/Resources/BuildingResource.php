<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BuildingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return[
            'id' => $this->id,
            'address' => $this->address,
            'geoposition' => $this->lat . ", ". $this->lng,
            'firms' => FirmResource::collection($this->whenLoaded('firms'))
        ];
    }
}
