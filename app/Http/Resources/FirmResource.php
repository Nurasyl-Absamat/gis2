<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FirmResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {


        // foreach( as $category){
        // $categories[$category->title]= $category->id;
        // }

        // foreach( as $phone){
        //     $phones[$phone->phone_num] =$phone->id;
        // }

        return [
            'id' => $this->id,
            'title' => $this->title,
            'building' => $this->building_id,
            'categories' => CategoryResource::collection($this->whenLoaded('categories')),
            'phones' => PhoneResource::collection($this->whenLoaded('phones'))
        ];
    }
}
